<div class="box box-primary color-palette-box">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-book"></i> Reservations</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#createPaymentModal"><i class="fa fa-plus"></i> Create Payment</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-stripe">
                        <thead>
                            <th>Transaction ID</th>
                            <th>Guest Name</th>
                            <th>Paid Amount</th>
                            <th>Date Paid</th>
                            <th>Balance</th>
                            <th>Payment Type</th>
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
                                    <td><?php echo ($value['payment_type'] == 1) ? 'Down Payment' : 'Full Payment'; ?></td>
                                    <td><?php echo $value['tour_date']; ?></td>
                                    <td>
                                        <a href="" class="btn btn-info btn-sm getReservationDetails" data-id="<?php echo $value['id']; ?>" data-toggle="modal" data-target="#moreDetails"><i class="fa fa-search"></i> More Details</a>
                                        <?php if($value['balance'] == 0): ?>
                                            <a href="" class="btn btn-warning btn-sm complete_transaction" data-id="<?php echo $value['id']; ?>"><i class="fa fa-check"></i> Completed</a>
                                        <?php endif; ?>
                                        <a href="<?php echo base_url('reservations/invoice/'.$value['id']); ?>" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-ticket"></i> Invoice</a>
                                        <a href="<?php echo base_url('reservations/downloadinvoice/'.$value['id']); ?>" class="btn btn-default btn-sm"><i class="fa fa-download"></i> Download Invoice</a>
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
<div class="modal fade" id="createPaymentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="create_new_payment_form" action="<?php echo base_url('reservations/create_new_payment'); ?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Payment</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Transaction ID</label>
                                <input type="text" class="form-control" name="transaction_id" placeholder="Transaction ID"  />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Package</label>
                            <div class="form-group">
                                <select class="form-control" name="package">
                                    <option selected hidden>Select Package</option>
                                    <?php foreach($packages as $key => $value): ?>
                                        <option value="<?php echo $value['package_id']; ?>"><?php echo $value['package_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Payment Amount</label>
                                <input type="text" class="form-control" name="payment_amount" placeholder="Payment Amount"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Paid Amount</label>
                                <input type="text" class="form-control" name="paid_amount" placeholder="Paid Amount"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Total Number of People</label>
                                <input type="text" class="form-control" name="total_number_of_people" placeholder="Total Number of People"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Payment Type</label>
                            <div class="form-group">
                                <select class="form-control" name="payment_type">
                                    <option selected hidden>Select Payment Type</option>
                                    <?php foreach($payment_type as $key => $value): ?>
                                        <option value="<?php echo $value['payment_type']; ?>"><?php echo $value['payment_type']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Payment</label>
                            <div class="form-group">
                                <select class="form-control" name="payment_description">
                                    <option selected hidden>Select Payment</option>
                                    <option value="1">Downpayment</option>
                                    <option value="2">Full Payment</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="First Name"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Hotel or Pick up address</label>
                                <input type="text" class="form-control" name="pickup_address" placeholder="Hotel or Pick up address"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tour Date</label>
                                <input type="text" class="form-control tour_date" name="tour_date" placeholder="Tour Date"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" placeholder="Phone Number"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Special Request</label>
                                <textarea class="form-control" name="special_request" rows="5" style="resize:none;"></textarea>
                            </div>
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
