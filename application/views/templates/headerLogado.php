<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<script src="<? echo base_url('assets/js/jquery.min.js') ?>"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<? echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">

	<!-- Latest compiled and minified JavaScript -->
	<script src="<? echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>

<style type="text/css">
	.erro {
		color: #f00;
	}

	body { 
		/*background: #5995DD !important;*/
		background-image: url("<? echo base_url('assets/images/baby_blue_hexagon_tile_seamless_background_pattern.jpg')?>") ;
		background-repeat: repeat;
	}
</style>


	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
					<span>
						<img src="assets/images/Eventifica_svg3.svg" height="30px"> 
					</span> Eventifica</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<p class="navbar-text"> <?= $this -> lang -> line('login_loged');?> <?= $this -> session -> userdata['usuario_logado']['name']; ?></p>
						<?= anchor('login/logout', 'Logout', array('class'=>'btn btn-danger navbar-btn')); ?>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</head>