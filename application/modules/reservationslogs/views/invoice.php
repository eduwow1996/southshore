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
        <div>Served by: <?php echo ucwords($details->fullname); ?></div>
        <div>REVIEW US/TAG US;</div>
        <div>Facebook: Affordable Cebu Tour Packages / South Shore Travel & Tours</div>
        <div>Websites: www.affordablecebutours.com/ www.southshoretours.ph / www.ceburentacartours.com</div>
        <div>Viber/Whatsapp: +639776468620</div>
    <div>
    <div style="width:100%;position:block;text-align:left;font-size:12px;margin-top:40px;">
        <div style="width:200px;border-bottom:1px solid black;"></div>
        <div>Authorized Representative</div>
    <div>
    <div style="width:100%;position:block;text-align:left;font-size:12px;margin-top:30px;">
        <div>Terms and Conditions</div>
    <div>
    <div style="width:100%;position:block;text-align:left;font-size:12px;margin-top:30px;">
        <div>No Sighting Policy</div>
    <div>
    <div style="width:100%;position:block;text-align:left;font-size:12px;margin-top:30px;">
        <div style="margin-bottom:10px;">South Shore Cebu Tours will try its best to serve its customers by giving enough time to spot Whale Sharks
            and other animals that our tourist destination/s may have. However, these animals are completely wild and
            are not trained to show itself to people. There is possibility that these animals may not be seen during the
            tour due to their unpredictable nature, inclement weather and other environmental factors that are beyond
            our control. If such happens, South Shore Cebu Tours is not obliged to refund transportation costs or tour fees.</div>
            <div>PAYMENT TERMS</div>
            <div>We require at least 50% down payment in order to officially reserve your booking. We accept various
            payment methods such as the following:</div>
            <div>1. Debit or Credit Card – Mastercard, Visa, JCB, Diners, AmEx and others (with 5% transfer fee)/div>
            <div>2. PayPal (subject for transfer fee)</div>
            <div>3. Bank deposit – Local banks such as BDO, BPI and others/div>
            <div style="margin-bottom:15px;">4. Wire Transfer – Western, Palawan, Cebuana, Mlhullier, MoneyGram</div>
            <div style="margin-bottom:45px;">When your payment has been made, please send a copy of the payment receipt to
                southshoretour@gmail.com and affordablecebutoursph@gmail.com. After receiving the down payment, We
                will email your travel voucher and receipt for the booking confirmation. The 50% balance can be paid on the
                day of the tour.</div>
                <div>BOOKING POLICY</div>
                <div style="margin-bottom:15px;">Please note that if a booking is made less than 3 days prior to tour date, full payment must be paid at once.
                We accommodate last minute bookings which should still be at least 1 day before tour date. Full payment is
                required upon pick-up. We follow a strictly No Show No Refund policy.</div>
                <div style="margin-bottom:15px;">CANCELLATION POLICY</div>
                <div>BAD WEATHER/TYPHOON: 90% is refundable of the total amount of the reservations and 10% admin is fee.
                CHANGE OF MIND/BACK OUT: NON REFUNDABLE
                NO SHOW. NO REFUND.</div>
                <div>*Prices may change without prior notice.</div>
    <div>
</div>
