                </section>
            </div>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    Anything you want
                </div>
                <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved
            </footer>
        </div>
        <input type="hidden" class="base_url" value="<?php echo base_url(); ?>"/>
        <script src="<?php echo base_url('static/js/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('static/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('static/js/datepicker.min.js'); ?>"></script>
        <script src="<?php echo base_url('static/js/select2.min.js'); ?>"></script>
        <script src="<?php echo base_url('static/js/adminlte.min.js'); ?>"></script>
        <script src="<?php echo base_url('static/js/jquery-confirm.min.js'); ?>"></script>
        <script src="<?php echo base_url('static/js/ckeditor.js'); ?>"></script>
        <script src="<?php echo base_url('static/js/script.js'); ?>"></script>
        <script>
            $('.textarea_inclusions').wysihtml5();
            $('.select2').select2();
            $('.datepicker_field').datepicker({
                autoclose: true,
                startDate: new Date(),
                format:'yyyy-mm-dd'
            });
            $('.tour_date').datepicker({
                autoclose: true,
                startDate: new Date(),
                format:'mm/dd/yyyy'
            });
            $('.audit_date').datepicker({
                autoclose: true,                
                format:'yyyy-mm-dd'
            });
        </script>
    </body>
</html>
