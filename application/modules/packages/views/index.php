<div class="box box-primary color-palette-box">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-cubes"></i> Packages</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#createPackageModal"><i class="fa fa-plus"></i> Create Package</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-stripe">
                        <thead>
                            <th>Package Name</th>
                            <th>Status</th>
                            <th>Added By</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach($packages as $key => $value): ?>
                                <tr>
                                    <td><?php echo $value['package_name']; ?></td>
                                    <td><?php echo ($value['status'] == 1) ? 'Active' : 'Inactive'; ?></td>
                                    <td><?php echo $value['fullname']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="" class="btn btn-danger btn-sm"><i class="fa fa-lock"></i></a>
                                        </div>
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
<div class="modal fade" id="createPackageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="package_form" action="<?php echo base_url('packages/save_packages'); ?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create package</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Package Name: </label>
                                <input type="text" class="form-control" name="package_name" placeholder="Package Name"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Inclusions: </label>
                                <textarea class="textarea_inclusions" name="Inclusions" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;" placeholder="Inclusions"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Complementary: </label>
                                <textarea class="form-control" name="Complementary" placeholder="Complementary"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Intinerary: </label>
                                <textarea class="textarea_inclusions" name="Intinerary" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;" placeholder="Intinerary"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Additional 500 Per Foreigner?: </label>
                                <select class="form-control" name="excess_payment">
                                    <option selected hidden>Select Option</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Number of persons: </label>
                                <input type="text" class="form-control" name="number_of_person" placeholder="Number of Person"/>
                            </div>
                        </div>
                    </div>
                    <div class="number_of_person_list">

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
