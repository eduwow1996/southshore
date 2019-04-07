<div class="box box-primary color-palette-box">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-search"></i> Audit</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="form-group">
                <form method="post" action="<?php echo base_url('audit/search_date'); ?>">
                    <div class="col-md-3">
                        <input type="text" class="form-control audit_date" name="from_date" placeholder="From Date" value="<?php echo $to_date;?>"/>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control audit_date" name="to_date" placeholder="To Date" value="<?php echo $current_date;?>"/>
                    </div>
                    <div class="col-md-3">
                        <input type="submit" class="btn btn-sm btn-primary" value="Go"/>
                    </div>
                </form>
            </div>
            <div class="col-md-12 table-responsive">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Log</th>
                        <th>Date</th>
                    </thead>
                    <tbody>
                        <?php foreach($audit_logs as $key => $value): ?>
                            <tr>
                                <td><?php echo $value['audit_id']; ?></td>
                                <td><?php echo ucwords($value['fullname']).' '.$value['content']; ?></td>
                                <td><?php echo $value['date_generated']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
