<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=utf-8>
    <meta name=description content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Main Page</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/half-slider.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/elegant-icons-style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/alertifyjs/css/alertify.min.css">
    <script src="<?php echo base_url(); ?>assets/alertifyjs/alertify.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/jquery-3.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootbox.min.js"></script>
</head>
<style type="text/css">
    .wrap{
    }
</style>
<body class="rule">
<!-- Navigation -->
<nav id="main-menu" class="navbar navbar- navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">M<small>y</small>P<small>roject</small>B<small>ox</small></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
               <li role="presentation"><a class="page-scroll" href="<?php echo base_url(); ?>">HOME <span class="sr-only">(current)</span></a></li>
                <li role="presentation"><a class="page-scroll" href="<?php echo base_url(); ?>projects">PROJECTS</a></li>
                <?php if (!$this->session->userdata('logged_in')): ?>
                    <li role="presentation"><a class="page-scroll" href="<?php echo base_url(); ?>users/register">REGISTER</a></li>
                <?php endif;?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if ($this->session->userdata('logged_in')): ?>
                    <li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
                <?php endif;?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="container ">
<div class="row main_content">
   <?php if ($this->session->userdata('logged_in')): ?>
      <?php $this->load->view($main_view);?>
       <?php endif;?>
</div>

</div>
<footer class="foo">
    <div class="row">
        <div class="col-lg-12">

            <p style="text-align:center; font-family: 'Monotype Corsiva'; font-size:17px;">Coded with <i class="fa fa-heart fa-lg" style="color: red;"></i> from <b >Victor Alagwu</b></p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</footer>
</body>
</html>