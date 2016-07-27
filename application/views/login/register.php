<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<script src="<? echo base_url('assets/js/jquery.min.js') ?>"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<? echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">

<!-- Latest compiled and minified JavaScript -->
<script src="<? echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>

	<link rel="stylesheet" href="<? echo base_url('assets/css/bootstrap-datetimepicker.css') ?>">
	<script src="<? echo base_url('assets/js/pt-br.js') ?>"></script>
	<script src="<? echo base_url('assets/js/bootstrap-datetimepicker.min.js') ?>"></script>
<!-- 	<script src="<? echo base_url('assets/js/bootstrap-datetimepicker.pt-BR.js') ?>"></script>		
 -->	<script src="<? echo base_url('assets/js/jquery.mask.min.js') ?>"></script>

<script type ="text/javascript">
	$(function() {
		$('#data_inicio').datetimepicker({
			format : 'yyyy-MM-dd',
			sideBySide : true,

			/*locale: 'es',*/
		});
	});	
</script>

	<script type ="text/javascript">

	// var SPMaskBehavior = function (val) {
	//   return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	// },
	// spOptions = {
	//   onKeyPress: function(val, e, field, options) {
	//       field.mask(SPMaskBehavior.apply({}, arguments), options);
	//     }
	// };

	$(function() {
    	$('#usr_zip').mask('00000-000');
    	$('#usr_cel').mask('(00)0000-0000');
    	$('#usr_tel').mask('(00)0000-0000');
    	$('#usr_register').mask('000.000.000-00');
    });


$(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#usr_street").val("");
                $("#usr_district").val("");
                $("#usr_city").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#usr_zip").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#usr_street").val("...")
                        $("#usr_district").val("...")
                        $("#usr_city").val("...")
                        $("#usr_state").val("...")
                        $("#ibge").val("...")

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#usr_street").val(dados.logradouro);
                                $("#usr_district").val(dados.bairro);
                                $("#usr_city").val(dados.localidade);
                                $("#usr_state").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
	</script>

	<style>
		.erro {
			color: #f00;
		}
	body { 
		/*background: #5995DD !important;*/
		background-image: url("<? echo base_url('assets/images/baby_blue_hexagon_tile_seamless_background_pattern.jpg')?>") ;
		background-repeat: repeat;
	}		
	</style>	
</head>

<div class="container col-xs-6 col-xs-offset-3">
<br>
	<div class="text-center">
		<img src="<? echo base_url('assets/images/Eventifica_svg1.svg')?>" height="150">
	</div>

	<div class="form-group">
		<br>
	</div>
	<?= form_open('register/store'); ?>
	<h1 class="form-signin-heading" align="center"><?= $this -> lang -> line('register_page_title'); ?> </h1>
	<div class="form-group">
		<h3 class="form-signin-heading"><?= $this -> lang -> line('register_personal_title'); ?> </h3>
		<!-- <div class="form-group"> -->
			<label for="usr_name"><?= $this -> lang -> line('register_name'); ?></label><span class="erro"><?php echo form_error('usr_name') ?  : ''; ?></span>		
			<input type="text" class="form-control" name="usr_name" placeholder="<?= $this -> lang -> line('register_name'); ?>" value="<?= set_value('usr_name') ? : (isset($usr_name) ? $usr_name : '') ?>" autofocus>	
		<!-- </div> -->
		<label for="usr_sex"><?= $this -> lang -> line('register_sex'); ?> </label><span class="erro"><?php echo form_error('usr_sex') ? : ''; ?></span>
		<select class="form-control" name="usr_sex">
			<option> <?= $this -> lang -> line('register_sex_masc'); ?></option>
			<option> <?= $this -> lang -> line('register_sex_fem'); ?></option>
		</select>

		<label for="usr_nacionality"><?= $this -> lang -> line('register_nacionality'); ?></label><span class="erro"><?php echo form_error('usr_nacionality') ?  : ''; ?></span>
		<select class="form-control" name="usr_nacionality">
			<option> <?= $this -> lang -> line('register_nacionality_brazil'); ?></option>
			<option> <?= $this -> lang -> line('register_nacionality_other'); ?></option>
		</select>

		<label for="usr_register"><?= $this -> lang -> line('register_number'); ?></label><span class="erro"><?php echo form_error('usr_register') ?  : ''; ?></span>		
		<input type="text" class="form-control" name="usr_register" placeholder="<?= $this -> lang -> line('register_number'); ?>" id="usr_register"value="<?= set_value('usr_register') ? : (isset($usr_register) ? $usr_register : '') ?>">

<!-- 		<label for="data_inicio">Data de Inicio</label>
			<input name="data_inicio" type='text' class="form-control" id="data_inicio"  class='input-group date' value="<?= set_value('data_inicio') ? : (isset($data_inicio) ? $data_inicio : '') ?>"/> -->


		<div class="form-group">
			<label for="usr_birth"><?= $this -> lang -> line('register_birth'); ?></label><span class="erro"><?php echo form_error('usr_birth') ?  : ''; ?></span>
			<div class="input-group date" data-provide="datepicker">
				<input name="usr_birth" type='date' class="form-control" id="usr_birth" value="<?= set_value('usr_birth') ? : (isset($usr_birth) ? $usr_birth : '') ?>"/>
			    <div class="input-group-addon">
			        <span class="glyphicon glyphicon-th"></span>
			    </div>
			</div>			
		</div>
	</div>

	<div class="form-group">
	<h3 class="form-signin-heading"><?= $this -> lang -> line('register_contact_title'); ?> </h3>

		<label for="usr_zip"><?= $this -> lang -> line('register_contact_zip'); ?></label><span class="erro"><?php echo form_error('usr_zip') ?  : ''; ?></span>			
		<input type="text" class="form-control" name="usr_zip" id="usr_zip" placeholder="<?= $this -> lang -> line('register_contact_zip'); ?>" value="<?= set_value('usr_zip') ? : (isset($usr_zip) ? $usr_zip : '') ?>">

		<label for="usr_street"><?= $this -> lang -> line('register_contact_street'); ?></label><span class="erro"><?php echo form_error('usr_street') ?  : ''; ?></span>			
		<input type="text" class="form-control" name="usr_street" id="usr_street" placeholder="<?= $this -> lang -> line('register_contact_street'); ?>" readonly="readonly">

		<label for="usr_number"><?= $this -> lang -> line('register_contact_number'); ?></label><span class="erro"><?php echo form_error('usr_number') ?  : ''; ?></span>			
		<input type="text" class="form-control" name="usr_number" id="usr_number" placeholder="<?= $this -> lang -> line('register_contact_number'); ?>" value="<?= set_value('usr_number') ? : (isset($usr_number) ? $usr_number : '') ?>">

		<label for="usr_district"><?= $this -> lang -> line('register_contact_district'); ?></label><span class="erro"><?php echo form_error('usr_district') ?  : ''; ?></span>			
		<input type="text" class="form-control" name="usr_district" id="usr_district" placeholder="<?= $this -> lang -> line('register_contact_district'); ?>" readonly="readonly">

		<label for="usr_city"><?= $this -> lang -> line('register_contact_city'); ?></label><span class="erro"><?php echo form_error('usr_city') ?  : ''; ?></span>			
		<input type="text" class="form-control" name="usr_city" id="usr_city" placeholder="<?= $this -> lang -> line('register_contact_city'); ?>" readonly="readonly">

		<label for="usr_state"><?= $this -> lang -> line('register_contact_state'); ?></label><span class="erro"><?php echo form_error('usr_state') ?  : ''; ?></span>			
		<input type="text" class="form-control" name="usr_state" id="usr_state" placeholder="<?= $this -> lang -> line('register_contact_state'); ?>" readonly="readonly">


		<label for="usr_cel"><?= $this -> lang -> line('register_contact_cel'); ?></label><span class="erro"><?php echo form_error('usr_cel') ?  : ''; ?></span>			
		<input type="text" class="form-control" name="usr_cel" id="usr_cel" placeholder="<?= $this -> lang -> line('register_contact_cel'); ?>" value="<?= set_value('usr_cel') ? : (isset($usr_cel) ? $usr_cel : '') ?>">

		<label for="usr_tel"><?= $this -> lang -> line('register_contact_tel'); ?></label><span class="erro"><?php echo form_error('usr_tel') ?  : ''; ?></span>			
		<input type="text" class="form-control" name="usr_tel" id="usr_tel" placeholder="<?= $this -> lang -> line('register_contact_tel'); ?>" value="<?= set_value('usr_tel') ? : (isset($usr_tel) ? $usr_tel : '') ?>">

		<label for="usr_email"><?= $this -> lang -> line('register_contact_email'); ?></label><span class="erro"><?php echo form_error('usr_email') ?  : ''; ?></span>			
		<input type="email" class="form-control" name="usr_email" placeholder="<?= $this -> lang -> line('register_contact_email'); ?>" value="<?= set_value('usr_email') ? : (isset($usr_email) ? $usr_email : '') ?>">
	</div>

	<div class="form-group">
	<h3 class="form-signin-heading"><?= $this -> lang -> line('register_login_title'); ?> </h3>	
		<label for="usr_username"><?= $this -> lang -> line('register_username'); ?></label><span class="erro"><?php echo form_error('usr_username') ?  : ''; ?></span>		
		<input type="text" class="form-control" name="usr_username" placeholder="<?= $this -> lang -> line('register_username'); ?>" value="<?= set_value('usr_username') ? : (isset($usr_username) ? $usr_username : '') ?>">

		<label for="usr_password"><?= $this -> lang -> line('register_password'); ?></label><span class="erro">
		<?php echo form_error('usr_password') ?  : ''; ?></span>		
		<input type="password" class="form-control" name="usr_password" placeholder="<?= $this -> lang -> line('register_password'); ?>">

		<label for="usr_passwordConf"><?= $this -> lang -> line('register_password_confirmation'); ?></label><span class="erro">
		<?php echo form_error('usr_passwordConf') ?  : ''; ?></span>		
		<input type="password" class="form-control" name="usr_passwordConf" placeholder="<?= $this -> lang -> line('register_password_confirmation'); ?>">		
	</div>

	<div class="form-group text-center">		
		<input type="submit" value="Save" class="btn btn-success btn-lg">
	</div>
	<?= form_close();?>

</div>