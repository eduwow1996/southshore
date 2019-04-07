<?php
    $long = array(
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    );
?>
<div class="box box-primary color-palette-box">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-search"></i> Sales Report</h3>
    </div>
    <div class="box-body">
        <div class="form-group">
            <h3>Report For: <?php echo $month.' '.$year;?></h3>
            <table class="table">
                <thead>
                    <th>Transaction ID</th>
                    <th>Customer</th>
                    <th>Amount</th>
                    <th>Date</th>
                </thead>
                <tbody>
                    <?php $total = 0;?>
                    <?php foreach($report_daily as $key => $value): ?>
                        <?php $total += $value['amount_paid'];?>
                        <tr>
                            <td><?php echo $value['transaction_id']; ?></td>
                            <td><?php echo $value['lead_guest_name']; ?></td>
                            <td>PHP<?php echo number_format($value['amount_paid'],2); ?></td>
                            <td><?php echo $value['date_paid']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3" style="text-align:right;"><b>Total:</b></td>
                        <td style="text-align:right;">PHP<?php echo number_format($total,2); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
