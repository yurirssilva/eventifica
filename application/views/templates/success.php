<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script src="<? echo base_url('assets/js/jquery.min.js') ?>"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<? echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">

<!-- Latest compiled and minified JavaScript -->
<script src="<? echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>

<body>
	<div class="container">
		<h1 class="text-center">Mensagem</h1>
		<div class="col-md-12">
			<div class="row">
				<div class="alert alert-success text-center">
					<?= $message; ?>
				</div>
			</div>
<!-- 			<div class="row text-center">
 				<?= anchor($pgn, "Voltar") ?>
 			</div> -->
		</div>	
	</div>
</body>
</html>