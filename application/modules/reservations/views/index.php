<div class="box box-primary color-palette-box">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-book"></i> Reservations</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#createPackageModal"><i class="fa fa-plus"></i> Create Payment</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-stripe">
                        <thead>
                            <th>Guest Name</th>
                            <th>Paid Amount</th>
                            <th>Balance</th>
                            <th>Tour Date</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach($reservations as $key => $value): ?>
                                <tr>
                                    <td><?php echo $value['lead_guest_name']; ?></td>
                                    <td><?php echo $value['paid_amount']; ?></td>
                                    <td><?php echo ($value['payment_type'] == 1) ? $value['paid_amount'] : 0; ?></td>
                                    <td><?php echo $value['tour_date']; ?></td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#moreDetails">More Details</a>
                                        <a href="" class="btn btn-warning btn-sm">Completed</a>
                                        <?php if($value['payment_type'] == 1): ?>
                                            <a href="" class="btn btn-success btn-sm">Fully Paid</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="moreDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Reservation Details</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>
