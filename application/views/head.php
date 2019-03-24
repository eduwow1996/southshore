<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>South Shore Cebu</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url('static/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('static/css/datepicker.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('static/css/select2.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('static/css/font-awesome.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('static/css/ionicons.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('static/css/AdminLTE.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('static/css/skin-blue.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('static/css/ckeditor.css'); ?>">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="<?php echo base_url(); ?>" class="logo">
                    <span class="logo-mini">SSC</span>
                    <span class="logo-lg">South Shore</span>
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url('static/img/avatar5.png'); ?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $this->session->userdata('full_name'); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="<?php echo base_url('static/img/avatar5.png'); ?>" class="img-circle" alt="User Image">
                                        <p><?php echo $this->session->userdata('full_name'); ?></p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url('logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url('static/img/avatar5.png'); ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $this->session->userdata('full_name'); ?></p>
                        </div>
                    </div>
                    <ul class="sidebar-menu" data-widget="tree">
                        <?php $current = $this->router->fetch_class(); ?>
                        <li class="header">MAIN HEADER</li>
                        <li <?php echo ($current == 'dashboard') ? 'class="active"' : ''?>><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                        <li <?php echo ($current == 'users') ? 'class="active"' : ''?>><a href="<?php echo base_url('users'); ?>"><i class="fa fa-users"></i> <span>Users</span></a></li>
                        <li <?php echo ($current == 'packages') ? 'class="active"' : ''?>><a href="<?php echo base_url('packages'); ?>"><i class="fa fa-cubes"></i> <span>Packages</span></a></li>
                        <li <?php echo ($current == 'reservations') ? 'class="active"' : ''?>><a href="<?php echo base_url('reservations'); ?>"><i class="fa fa-calendar"></i> <span>Reservations</span><span class="pull-right-container"><small class="label pull-right bg-green"><?php echo $reservations_count; ?></small></span></a></li>
                        <li <?php echo ($current == 'audit') ? 'class="active"' : ''?>><a href="<?php echo base_url('audit'); ?>"><i class="fa fa-search"></i> <span>Log Audit</span></a></li>
                    </ul>
                </section>
            </aside>
            <div class="content-wrapper">
                <section class="content-header">
                    <h1><?php echo ucwords(str_replace("_"," ",$this->router->fetch_class())); ?></h1>
                </section>
                <section class="content container-fluid">
