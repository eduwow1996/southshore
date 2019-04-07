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
            <form method="post" action="<?php echo base_url('report/get_report'); ?>">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Report Type</label>
                            <select class="form-control" name="report_type">
                                <option selected hidden>Select Report Type</option>
                                <option value="1">Date Range</option>
                                <option value="2">Monthly</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" id="date_range" style="display:none;">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Form Date</label>
                            <input type="text" class="form-control audit_date" name="from_date" placeholder="From Date" value="<?php echo $to_date;?>"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>To Date</label>
                            <input type="text" class="form-control audit_date" name="to_date" placeholder="To Date" value="<?php echo $current_date;?>"/>
                        </div>
                    </div>
                </div>
                <div class="row" id="monthly" style="display:none;">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Month</label>
                            <select class="form-control" name="report_month">
                                <option selected hidden>Select Month</option>
                                <?php for($i = 0; $i < 12; $i++): ?>
                                    <option value="<?php echo $long[$i]; ?>"><?php echo $long[$i]; ?></option>
                                <?php endfor;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Year</label>
                            <select class="form-control" name="report_year">
                                <option selected hidden>Select Year</option>
                                <?php for($i = date("Y"); $i > 2000; $i--): ?>
                                    <option <?php echo (date("Y") == $i) ? 'selected' : ''; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" id="generate_button" style="display:none;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Generate Report"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
