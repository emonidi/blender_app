<div class='uk-container uk-conainer-center uk-margin-top centered' data-ng-controller='addUser'>
	<div class="uk-grid" data-uk-grid-margin="">
		<div class='uk-article uk-width-1-1 uk-margin-top'>
			<div class='uk-article-title'>
				<h2>Добавяне на потребител</h2>
				<?php if($error){?>
					<h4 class='uk-alert uk-alert-danger'>Грешка: <?php echo $message ?></h4>
				<?php }?>
			</div>
	
			<div class='uk-article-lead'>
				<form class='uk-form' method="POST" action="<?php echo base_url() ?>index.php/users/add">
					<fieldset>
						<div class='uk-form-row'>
							<label class='uk-form-label'  ng-model='Model.name' />Име:</label>
							<input type='text' name='name' required/>
						</div>
						<div class='uk-form-row'>
							<label class='uk-form-label' ng-model='Model.surname'/>Фамилия:</label>
							<input type='text' required name='surname'/>
						</div>
						<div class='uk-form-row'>
							<label class='uk-form-label'  ng-model='Model.surname'/>Email:</label>
							<input type='email' required name='email'/>
						</div>
					</fieldset>
					<fieldset>
						<div class='uk-form-row'>
							<label class='uk-form-label'>Портебител:</label>
							<input type='text' required name='username' ng-model='Model.username'/>
						</div>
						<div class='uk-form-row'>
							<label class='uk-form-label'>Парола:</label>
							<input type='password' required name='password' ng-model='Model.password'/>
						</div>
						<div class='uk-form-row'>
							<label class='uk-form-label'>Проверка на паролата</label>
							<input type='password' required name='password_repeat' ng-model='Model.password_repeat'/>
						</div>
					</fieldset>
						<div class='uk-form-row'>
						<input data-ng-click='checkPass($event)' type="submit" value='Запиши' class='uk-button uk-button-success'/>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>