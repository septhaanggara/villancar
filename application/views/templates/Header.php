<?php 
  $sesi = $this->session->userdata('name');
  $via = $this->session->userdata('via');
  $role = $this->session->userdata('role_id');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?= $title ?></title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
	
    <!-- css files -->
    <link href="<?= base_url();?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url();?>css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="<?= base_url();?>css/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
    <link href="<?= base_url();?>css/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
	<!-- //css files -->
	
	<!-- google fonts -->
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=devanagari,latin-ext" rel="stylesheet">
	<!-- //google fonts -->
	
</head>
<body>


<!-- //header -->
<header class="py-4">
	<div class="container">
			<div id="logo">
				<h1> <a href="<?= base_url('C_Home')?>"><span class="fa fa-home" aria-hidden="true"></span> Villancar</a></h1>
			</div>
		<!-- nav -->
		<nav class="d-lg-flex">

			<label for="drop" class="toggle">Menu</label>
			<input type="checkbox" id="drop" />
			<ul class="menu mt-2 ml-auto">
				<li class="mr-lg-4 mr-3"><a href="<?= base_url('C_Home')?>">Home</a></li>
				<li class="mr-lg-4 mr-3"><a href="<?= base_url('C_About')?>">About Us</a></li>
				<li class="mr-lg-4 mr-3">
				
				<li class="mr-lg-4 mr-3"><a href="<?= base_url('C_Villa')?>">villa</a></li>
				<li class="mr-lg-4">
                <?php if(!$sesi){ ?>
                  <a href="<?= base_url('Auth')?>" class="nav-style">Login</a>
                  <?php }else{ ?>
                    
                
                      <a class="nav-style" href="<?= base_url('Auth/logout')?>">LogOut</a>
                  <?php } ?>
                </li>
			</ul>
			
		</nav>
		<div class="clear"></div>
		<!-- //nav -->
	</div>
</header>


