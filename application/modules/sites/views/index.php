<div class="box box-primary color-palette-box">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-users"></i> Sites</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <div class="form-group">
                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#createUserModal"><i class="fa fa-plus"></i> Create Site</a>
                </div>
                <table class="table">
                    <thead>
                        <th>Site</th>
                        <th>Site Url</th>
                    </thead>
                    <tbody>
                        <?php foreach($sites as $key => $value): ?>
                            <tr>
                                <td><?php echo $value['site_name']; ?></td>
                                <td><?php echo $value['site_url']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="create_site_form" action="<?php echo base_url('sites/create_sites'); ?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create User</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Site Name: </label>
                                <input type="text" class="form-control" name="site_name" placeholder="Site Name"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Site Url: </label>
                                <input type="text" class="form-control" name="site_url" placeholder="Site Url"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editPackagePriceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="edit_price_package_form" action="<?php echo base_url('packages/edit_price_packages'); ?>" method="post">
                <input type='hidden' name="trans_type" />
                <input type='hidden' name="package_id_edit" />
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit package price</h4>
                </div>
                <div class="modal-body" id="price_div">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
