<?php
@session_start();

function paypaldirect(){
    require 'payment-assets/classes/paypal.php';
    $_SESSION['formdata'] = $_POST;
    $paypal = new Paypal();
    $params = array(
  		'total' => $_SESSION['formdata']['Amount'],
  		'currency' => 'PHP',
  		'localecode' => 'PH',
  		'customeremail' => $_SESSION['formdata']['Email'],
		'itemname' => COMPANY_NAME.' - '.FORM_NAME,
		'itemamt' => $_SESSION['formdata']['Amount'],
		'itemqty' => 1,
        'recurring' => isset($_SESSION['formdata']['Recurring'])?$_SESSION['formdata']['Recurring']:false,
        'recurring_freq' => isset($_SESSION['formdata']['Recurring_Frequency'])?$_SESSION['formdata']['Recurring_Frequency']:'',
  	);

    $result = $paypal->SetExpressCheckout($params);
    if(is_array($result) AND !isset($result[0])){
      	if (strtoupper($result['ACK']) == 'SUCCESS'){
      		if(isset($result['TOKEN'])){
                $resultget = $paypal->GetExpressCheckoutDetails($result['TOKEN']);
      			$_SESSION['paypal_token'] = strval($resultget['TOKEN']);
                return (message('primary','<b><i class="fas fa-spinner fa-pulse"></i></b> Processing payment...',$resultget['TOKEN']));
      		} else {
                return (message('danger','<b><i class="fas fa-times-circle"></i></b> No token received from PayPal'));
            }
      	} else {
      		return (message('danger','<b><i class="fas fa-times-circle"></i></b> '.$result['L_LONGMESSAGE0']));
        }
    } else {
        return (message('danger','<b><i class="fas fa-times-circle"></i></b> No Response from PayPal'));
    }
}


function paypalreturn(){
    require 'payment-assets/classes/paypal.php';

    $paypal = new Paypal();

    $params = array(
  		'total' => $_SESSION['formdata']['Amount'],
  		'currency' => 'PHP',
  		'localecode' => 'PH',
  		'customeremail' => $_SESSION['formdata']['Email'],
		'itemname' => COMPANY_NAME.' - '.FORM_NAME,
		'itemamt' => $_SESSION['formdata']['Amount'],
		'itemqty' => 1,
        'recurring' => isset($_SESSION['formdata']['Recurring'])?$_SESSION['formdata']['Recurring']:false,
        'recurring_freq' => isset($_SESSION['formdata']['Recurring_Frequency'])?$_SESSION['formdata']['Recurring_Frequency']:'',
  	);

    $result_paypal_success = $paypal->DoExpressCheckoutPayment($params, $_SESSION['paypal_token'], $_POST['payerID']);
    if(is_array($result_paypal_success) AND !isset($result_paypal_success[0])){
  	    if(strtoupper($result_paypal_success['ACK']) == 'SUCCESS'){
            if(isset($_SESSION['formdata']['Recurring_Frequency']) && $_SESSION['formdata']['Recurring']){
                $result_paypal_recurr = $paypal->CreateRecurringPaymentsProfile($params, $_SESSION['paypal_token']);
                if(is_array($result_paypal_success) AND !isset($result_paypal_success[0])){
          	        if(strtoupper($result_paypal_success['ACK']) == 'SUCCESS'){
                        $trans = sendemail($_SESSION['formdata']);
                        return (message('success','<b>Success:</b> Payment successful. Recurring payment is now active.',$trans));
                    } else {
                        unset($_SESSION['formdata']['Recurring']);
                        unset($_SESSION['formdata']['Recurring_Frequency']);
                        $trans = sendemail($_SESSION['formdata']);
                        return (message('danger','<b>Warning:</b> Payment is successful but failed to set up recurring payments. '.$result_paypal_recurr['L_LONGMESSAGE0']));
                    }
                } else {
                    unset($_SESSION['formdata']['Recurring']);
                    unset($_SESSION['formdata']['Recurring_Frequency']);
                    $trans = sendemail($_SESSION['formdata']);
          	         return (message('danger','<b>Warning:</b> Payment is successful but failed to set up recurring payments. No Response from PayPal.'));
                }
            } else {
                $trans = sendemail($_SESSION['formdata']);
                return (message('success','<b>Success:</b> Payment successful.',$trans));
            }
  	    } else {
            return (message('danger','<b><i class="fas fa-times-circle"></i></b> '.$result_paypal_success['L_LONGMESSAGE0']));
  	    }
    } else {
  	    return (message('danger','<b><i class="fas fa-times-circle"></i></b> No Response from PayPal.'));
    }
}

function authorizepayment(){
    require 'payment-assets/classes/authorize.php';
    $authorize = new Authorize();
    $response = $authorize->makePayment();
    if($response[0] == 1){
        $trans = sendemail($_POST);
        return message('success','<b>Success: </b>'.$response[3],$trans);
    } else {
        return message('danger','<b>Error: </b>'.$response[3]);
        //$prompt_message = '<div id="error" style="margin-bottom: 15px;">'.$response[3].'</div>';
    }
}

function payeezypayment(){
    require 'payment-assets/classes/payeezy.php';
    $payeezy = new Payeezy();
    $response = $payeezy->makePayment();

    if($response['status'] == 201 ){
        if($response['result']->transaction_approved == '1') {
            $trans = sendemail($_POST);
            return message('success','<b>Success: </b> Transaction Successful.',$trans);
        } else {
            return message('danger','<b>Error: </b> '.$response['result']->bank_message);
        }
    } else {
        return message('danger','<b>Error: </b> Something is wrong with your provided information, please recheck.');
    }
}

function stripepayment(){
    require 'payment-assets/classes/stripe.php';
    $stripe = new Stripe();
    $response = $stripe->makePayment();
    if(isset($response)){
        if(isset($response->error)){
            return message('danger','<b>Error: </b> '.$response->error->message);
        }elseif($response->status != 'succeeded'){
            return message('danger','<b>Error: </b> '.$response->outcome->seller_message);
        }else{
            $trans = sendemail($_POST);
            return message('success','<b>Success: </b> '.$response->outcome->seller_message,$trans);
        }
    }else{
        return message('danger','<b>Error: </b> No Response from Stripe server.');
    }
}

function squarepayment(){
    require 'payment-assets/classes/square.php';
    $square = new Square();
    $response = $square->makePayment();
    if(isset($response)){
        if(isset($response->errors)){
            return message('danger','<b>Error: </b> '.$response->errors[0]->detail);
        }else{
            $trans = sendemail($_POST);
            return message('success','<b>Success: </b> Transaction successful',$trans);
        }
    }else{
        return message('danger','<b>Error: </b> No Response from Square server.');
    }
}

function message($status,$message,$link='',$validate = ''){
    return array(
        'status'=>$status,
        'response'=>$message,
        'link'=>$link,
        'validate'=>$validate
    );
}

function sendemail($data, $status = 'SUCCESS'){
    require 'Controller.php';
    $controller = new Controller();
    $initials = $data['First_Name'][0].$data['Last_Name'][0];
    $trans_date = ("Y/m/d");
    $transaction = strtoupper(uniqid($initials));
    $formname = FORM_NAME;
    $controller = new Controller();
    $package_id = explode(":",$data['Package_Id'])[0];
    $paid_amount = $data['Amount'];
    $number_of_people = $data['number_of_people'];
    $number_of_filipino = !empty($data['Number_Of_Filipinos']) ? $data['Number_Of_Filipinos'] : 0;
    $payment_type = $data['Payment_Type'];
    $lead_guest_name = $data['First_Name'].' '.$data['Last_Name'];
    $hotel_pickup = $data['Hotel_Pickup_Address'];
    $tour_date = $data['Tour_Date'];
    $email = $data['Email'];
    $phone = $data['Phone'];
    $special_request = $data['Special_Request'];
    $payment_gateway = $data['gateway'];
    $sql_query = "INSERT INTO tbl_reservation (id,transaction_id,trans_date,package_id,paid_amount,lead_guest_name,number_of_people,number_of_filipino,pickup_address,tour_date,email_address,phone_number,special_request,payment_type,payment_gateway,payment_status,status)
    VALUES ('','$transaction','$trans_date','$package_id','$paid_amount','$lead_guest_name','$number_of_people','$number_of_filipino','$hotel_pickup','$tour_date','$email','$phone','$special_request','$payment_type','$payment_gateway','0','0')";
    $controller->insertTransaction($sql_query);
    return $transaction;
}

 ?>
