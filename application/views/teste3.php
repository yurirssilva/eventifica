<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
	<div class="container">
		<h1 class="text-center">Mensagem</h1>
		<div class="col-md-12">
			<div class="row">
				<div class="alert alert-danger text-center">
					<?= $mensagem; ?>
				</div>
			</div>
<!-- 			<div class="row text-center">
 				<?= anchor($pgn, "Voltar") ?>
 			</div> -->
		</div>	
	</div>
</body>
</html>