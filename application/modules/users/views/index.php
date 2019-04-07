<div class="box box-primary color-palette-box">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-users"></i> Users</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <div class="form-group">
                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#createUserModal"><i class="fa fa-plus"></i> Create User</a>
                </div>
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Site Handled</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php foreach($users as $key => $value): ?>
                            <tr>
                                <td><?php echo ucwords($value['fullname']); ?></td>
                                <td><?php echo $value['site_name']; ?></td>
                                <td><?php echo ($value['user_status'] == 1) ? 'Active' : 'Inactive'; ?></td>
                                <td>
                                    <a href="" class="btn btn-danger btn-sm"><i class="fa fa-lock"></i></a>
                                </td>
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
            <form id="create_user_form" action="<?php echo base_url('users/create_users'); ?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create User</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Full Name: </label>
                                <input type="text" class="form-control" name="fullname" placeholder="Full Name"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Site: </label>
                                <select class="form-control" name="site">
                                    <option selected hidden>Select Site</option>
                                    <?php foreach($sites as $key => $value): ?>
                                        <option value="<?php echo $value['site_id']; ?>"><?php echo $value['site_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Username: </label>
                                <input type="text" class="form-control" name="username" placeholder="Username"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Password: </label>
                                <input type="password" class="form-control" name="password" placeholder="Password"/>
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
