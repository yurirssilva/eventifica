<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
	<div class="form-group">
	<br>
	</div>
	<div class="text-center" padding="20px">
		<img src="<? echo base_url('assets/images/Eventifica_svg1.svg')?>" height="150" padding-top="20px">
	</div>

	<?= form_open('login/logar'); ?>
		<div class="form-group">
	<br>
	</div>
	<div class="container col-xs-4 col-xs-offset-4">
		<div class="form-group">
			<h1 class="form-login-heading" align="center"><?= $this -> lang -> line('login_title'); ?> </h1>
			<label for="usr_username"><?= $this -> lang -> line('register_username'); ?></label><span class="erro"><?php echo form_error('usr_username') ?  : ''; ?></span>		
			<input type="text" class="form-control" name="usr_username" placeholder="<?= $this -> lang -> line('register_username'); ?>" value="<?= set_value('usr_username') ? : (isset($usr_username) ? $usr_username : '') ?>">

			<label for="usr_password"><?= $this -> lang -> line('register_password'); ?></label><span class="erro">
			<?php echo form_error('usr_password') ?  : ''; ?></span>		
			<input type="password" class="form-control" name="usr_password" placeholder="<?= $this -> lang -> line('register_password'); ?>">
		</div>
		<div class="form-group text-center">		
			<input type="submit" value="Login" class="btn btn-success">
		</div>	
	</div>
	<?= form_close(); ?>
