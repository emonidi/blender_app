<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<link rel='stylesheet' type="text/css" href='<?php echo base_url()?>assets/css/ui/css/uikit.almost-flat.css'>
		<style>

			.login{
				margin:0 auto;
				margin-top:40px;
				
			}
			.error{
				line-height:18px;
				font-size:12px;
				color:red;
			}
		</style>
	</head>
	<body>
		<div class='uk-container uk-container-center'>
			<div class='uk-panel uk-panel-box uk-width-1-4 login'>
				<div class='uk-panel-title'>
					<h3>Вход в системата:</h3>
				</div>
				<hr/>
				<form class='uk-form login' method='POST' action='<?php echo base_url()?>index.php/login/loginer'>
					<p>
						<label for='username'>Потребител</label>
						<input type='text' id='username' name='username'/>
						<?php if($error !==''){ ?>
							<span class='error'>Грешен потребител или парола</span>
						<?php }?>
						</p>
					<p>
						<label for='password'>Потребител</label>
						<input type='password' name='password' id='password'/>
					</p>
					<hr/>
					<input type='submit' class='uk-button uk-button-primary' value='Вход'/>
				</form>
			</div>
		</div>
	</body>
</html>