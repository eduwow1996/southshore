<div class="login-box">
    <div class="login-logo">
        South Shore Cebu
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?php echo base_url('login/auth'); ?>" method="post">
            <?php if(isset($msg)): ?>
                <div class="callout callout-danger">
                    <p><?php echo $msg; ?></p>
                </div>
            <?php endif; ?>
            <div class="form-group has-feedback">
                <input type="username" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>" >
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
            </div>
        </form>
    </div>
</div>
