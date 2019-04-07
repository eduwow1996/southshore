<?php
    $short = array(
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'May',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Dec'
    );
    $inv_date = date("Y/m/d");
    $month = explode("/",$inv_date)[1];
    $year = explode("/",$inv_date)[0];
    $day = explode("/",$inv_date)[2];
    $t_month = explode("/",$details->tour_date)[0];
    $t_year = explode("/",$details->tour_date)[2];
    $t_day = explode("/",$details->tour_date)[1];
?>
<style>
    *{
        font-family: sans-serif;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    tr, td{
        padding: 5px;
    }
</style>
<div style="width:90%;margin:40px auto;position:relative;">
    <div style="width:100%;position:block;text-align:right;">
        <h1 style="font-size:32px;font-weight;color:gray;">INVOICE</h1>
    </div>
    <div style="width:100%;position:block;text-align:left;margin-top:-40px;">
        <img src="<?php echo base_url('static/ss-logo.png')?>" width="120"/>
    </div>
    <div style="width:100%;position:block;text-align:right;margin-top:-40px;">
        <div style="font-size:16px;margin-right:114px;font-weight:400;">Invoice #: <?php echo $details->id; ?></div>
        <div style="font-size:16px;margin-right:33px;font-weight:400;">Invoice Date: <?php echo $day;?> <?php echo $short[$month-1]; ?> <?php echo $year;?></div>
        <div style="font-size:16px;margin-right:33px;font-weight:400;">Due Date: <?php echo $t_day;?> <?php echo $short[$t_month-1]; ?> <?php echo $t_year;?></div></div>
    </div>
    <div style="width:100%;position:block;text-align:left;margin-top:-40px;">
        <h1 style="font-size:21px;font-weight;color:black;">South Shore Cebu Travel and Tours</h1>
        <?Php if($details->paid_amount - $payment_list->total_paid != 0): ?>
            <div style="position:absolute;margin-left:490px;;width:150px;height:50px;border:1px solid gray;padding:4px 15px;padding-top:6px;text-align:center;border-radius:3px;">
                <div>Amount due:</div>
                <div style="font-size:15px;font-weight:bold;">P<?php echo number_format($details->paid_amount,2); ?></div>
            </div>
        <?php endif; ?>
    </div>
    <div style="width:100%;position:block;text-align:left;">
        <div style="font-size:14px;">60, Gorordo Avenue</div>
        <div style="font-size:14px;">Camputhaw</div>
        <div style="font-size:14px;">Cebu City</div>
        <div style="font-size:14px;">6000 CEBU</div>
        <div style="font-size:14px;">Philippines</div>
    </div>
    <div style="width:100%;position:block;text-align:left;margin-top:15px;margin-bottom:15px;">
        <div style="font-size:14px;">Tax ID: 262915577</div>
    </div>
    <div style="width:100%;position:block;text-align:left;margin-bottom:20px;">
        <div style="font-size:14px;">Phone: +63 9776468620</div>
        <div style="font-size:14px;">Fax: Tel No: (032) 413 2942</div>
        <div style="font-size:14px;">southshoretour@gmail.com</div>
        <div style="font-size:14px;">affordablecebutours.com</div>
        <div style="font-size:14px;">www.southshoretours.ph/www.ceburentacartours.com</div>
    </div>
    <hr>
    <div style="width:100%;position:block;text-align:left;margin-top:20px;margin-bottom:20px;">
        <div>Bill To:</div>
        <div style="margin-top:20px;"><?php echo ucwords($details->lead_guest_name); ?></div>
        <div style="margin-top:20px;"><?php echo $details->email_address; ?></div>
        <div ><?php echo $details->phone_number; ?></div>
    </div>
    <table style="width:100%;font-size:13px;">
        <tr  style="border:1px solid gray">
            <td style="font-weight:bold;">Date</td>
            <td style="font-weight:bold;">Description</td>
            <td style="font-weight:bold;text-align:right;">Quantity</td>
            <td style="font-weight:bold;text-align:right;">Price</td>
            <td style="font-weight:bold;text-align:right;">Amount</td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo $details->package_name; ?></td>
            <td style="text-align:right;"><?php echo $details->number_of_people; ?></td>
            <td style="text-align:right;">P<?php echo number_format($details->paid_amount / $details->number_of_people,2); ?></td>
            <td style="text-align:right;">P<?php echo number_format($details->paid_amount,2); ?></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:right;">Sub Total</td>
            <td style="text-align:right;">P<?php echo number_format($details->paid_amount,2); ?></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:right;font-weight:bold;">Total</td>
            <td style="text-align:right;font-weight:bold;">P<?php echo number_format($details->paid_amount,2); ?></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:right;">Paid Amount</td>
            <td style="text-align:right;">P<?php echo number_format($payment_list->total_paid,2); ?></td>
        </tr>
        <?Php if($details->paid_amount - $payment_list->total_paid != 0): ?>
            <tr>
                <td colspan="4" style="text-align:right;">Balance</td>
                <td style="text-align:right;">P<?php echo number_format($details->paid_amount - $payment_list->total_paid,2); ?></td>
            </tr>
        <?php endif; ?>
    </table>
    <hr style="margin-top:20px;margin-bottom:20px;margin-top:30px;">
    <div style="width:100%;position:block;text-align:left;font-size:11px;">
        <div>Notes:</div>
        <div>
            <!-- <div style="margin-bottom:10px;">Please pay the minimum amount of Php 36,850 as 50% down payment to booked and secure your tour with us.</div> -->
            <?Php if($details->paid_amount - $payment_list->total_paid != 0): ?>
                <div style="margin-bottom:10px;">Remaining (PHP<?php echo $details->paid_amount - $payment_list->total_paid; ?>) Balance will be paid upon arrival or during the tour. Once we received your 'RESERVATION
                FEE' your tour is now secured then will keep in touch with you via email, SMS,Call, Viber or Whatsapp.</div>
            <?php endif; ?>
            <div>Pick up address: Mactan Int'l Airport Terminal 1 Flight 5J 551</div>
            <div>Arrival date/time: Aug 23, 2019 Friday@ 6:35 AM</div>
        </div>
    </div>
    <div style="width:100%;position:block;text-align:left;font-size:12px;page-break-before: always;">
        <div>Package: <?php echo $details->package_name; ?></div>
    <div>
    <div style="width:100%;position:block;text-align:left;font-size:12px;margin-top:20px;">
        <div style="font-weight:bold;">Inclusions:</div>
        <div><?php echo $details->package_inclusions; ?></div>
    <div>
    <div style="width:100%;position:block;text-align:left;font-size:12px;margin-top:20px;">
        <div style="font-weight:bold;">Complimentary:</div>
        <div><?php echo $details->package_complementary; ?></div>
    <div>
    <div style="width:100%;position:block;text-align:left;font-size:12px;margin-top:20px;">
        <div style="font-weight:bold;">ITINERARY:</div>
        <div><?php echo $details->package_intinerary; ?></div>
    <div>
    <div style="width:100%;position:block;text-align:left;font-size:12px;margin-top:20px;">
        <div>Served by:<?php echo $details->fullname; ?></div>        
    <div>
</div>
