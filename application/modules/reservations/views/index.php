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
                            <th>Transaction ID</th>
                            <th>Guest Name</th>
                            <th>Paid Amount</th>
                            <th>Date Paid</th>
                            <th>Balance</th>
                            <th>Tour Date</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach($reservations as $key => $value): ?>
                                <tr>
                                    <td><?php echo $value['transaction_id']; ?></td>
                                    <td><?php echo $value['lead_guest_name']; ?></td>
                                    <td>P<?php echo $value['total_paid']; ?></td>
                                    <td><?php echo $value['trans_date']; ?></td>
                                    <td>P<?php echo $value['balance']; ?></td>
                                    <td><?php echo $value['tour_date']; ?></td>
                                    <td>
                                        <a href="" class="btn btn-info btn-sm getReservationDetails" data-id="<?php echo $value['id']; ?>" data-toggle="modal" data-target="#moreDetails"><i class="fa fa-search"></i> More Details</a>
                                        <?php if($value['balance'] == 0): ?>
                                            <a href="" class="btn btn-warning btn-sm complete_transaction" data-id="<?php echo $value['id']; ?>"><i class="fa fa-check"></i> Completed</a>
                                        <?php endif; ?>
                                        <a href="" class="btn btn-default btn-sm"><i class="fa fa-ticket"></i> Invoice</a>
                                        <?php if($value['balance'] != 0): ?>
                                            <a href="" class="btn btn-primary btn-sm addPayment" data-id="<?php echo $value['id']; ?>" data-toggle="modal" data-target="#addPaymentModal"><i class="fa fa-plus"></i> Add Payment</a>
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
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <tr>
                                <td>Package:</td>
                                <td class="package_text_display"></td>
                            </tr>
                            <tr>
                                <td>Number of People:</td>
                                <td class="number_of_people_text_display"></td>
                            </tr>
                            <tr>
                                <td>Number of Filipino:</td>
                                <td class="number_of_filipino_text_display"></td>
                            </tr>
                            <tr>
                                <td>Pickup Address:</td>
                                <td class="pickup_address_text_display"></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td class="email_text_display"></td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td class="phone_number_text_display"></td>
                            </tr>
                            <tr>
                                <td>Special Request:</td>
                                <td class="special_request_text_display"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Payment Details</label>
                        <table class="table" id="payment_list">
                            <thead>
                                <th>Payment Amount</th>
                                <th>Date Paid</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addPaymentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="add_payment_form" action="<?php echo base_url('reservations/add_payment'); ?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Payment</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Transaction #<span class="trans_number"></span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Payment Amount</label>
                            <input type="text" class="form-control" name="payment_amount" placeholder="Payment Amount"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-success" ><i class="fa fa-plus"></i> Add Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>
