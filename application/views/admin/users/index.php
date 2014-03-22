<div class='uk-container uk-conainer-center uk-margin-top centered' data-ng-controller='userController'>
	<div class="uk-grid" data-uk-grid-margin="">
		<div class='uk-article uk-width-1-1 uk-margin-top'>
			<div class='uk-article-title'>
				<h2>Преглед на потребители</h2>
			</div>
			<div class='uk-article-lead'>
				<table class='uk-table'>
					<thead>
						<td>
							Имена
						</td>
						<td>
							E-mail
						</td>
                        <?php if($this->session->userdata('user_role') === '1'){ ?>
                        <td>
                            Уведомяване по пощата
                        </td>
                        <?php } ?>
						<td>
							Опции
						</td>
					</thead>
					<tbody>
						<?php foreach($users as $u){?>
							<tr>
								<td>
									<span eg-to-input eg-field='name' eg-cols='8' eg-element-type='text' eg-url='<?php echo base_url() ?>index.php/users/edit/<?php echo $u->id ?>'><?php  echo $u->name; ?></span>
									<span eg-to-input eg-field='surname' eg-cols='8' eg-element-type='text' eg-url='<?php echo base_url() ?>index.php/users/edit/<?php echo $u->id ?>'><?php  echo $u->surname; ?></span>
								</td>
								<td>
									<span eg-to-input eg-field='email' eg-cols='20' eg-element-type='text' eg-url='<?php echo base_url() ?>index.php/users/edit/<?php echo $u->id ?>'><?php echo $u->email ?></span>
								</td>
                                 <?php if($this->session->userdata('user_role') === '1'){ ?>
                                     <td>
                                        <input type="checkbox" <?php echo $u->email_notification === '1' ? "checked" : "" ?> name="email_notification" data-ng-click="changeEmailNotification($event,'<?php echo $u->id ?>')">
                                    </td>
							    <?php } ?>
								<td>
								<a href='#deleteConfirmation' data-ng-click='confirmDelete(<?php echo $u->id ?>)' class='uk-button uk-button-danger'>Изтриване</a>
								<?php if($u->id == $this->session->userdata('user_id')){?>
										<a href=''data-ng-click='changePass("<?php echo base_url() ?>index.php/users/change_pass/<?php echo $u->id ?>")' class='uk-button uk-button-primary'>Смяна на парола</a>

								<?php } ?>
								</td>
							</tr>

						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
	<div class='uk-modal' id="deleteConfirmation">
					<div class='uk-modal-dialog'>
						Да изтрия ли този потребител?
						<div class='uk-grid'>
							<div class='uk-width-1-10 uk-margin-top'>
							<a href='' data-ng-click='delete("<?php echo base_url() ?>index.php/users/delete/")' class='uk-button uk-button-success'>Да</a>
						</div>
						<div class='uk-width-1-10 uk-margin-top'>
							 <a href='' class='uk-button uk-button-danger uk-modal-close'>Не</a>
						</div>
						</div> 
					</div>
		</div>
		<div class='uk-modal' id='newPass'>
			<div class='uk-modal-dialog'>
				<h4>Смяна на парола</h4>
				<form class='uk-form'>
					<p>
						<label>Стара Парола:</label>
						<input type='text' required ng-model='Pass.old_pass'/>
					</p>
					<p>
						<label>Нова Парола</label>
						<input type='password' required ng-model='Pass.new_pass'>
					</p>
					<p>
						<label>Проверка на Паролата</label>
						<input type='password' required ng-model='Pass.new_pass_repeat'>
					</p>
					<div class='uk-margin-top'>
						<input type='submit' data-ng-click='sendPass($event)' class='uk-button uk-button-success uk-width-1-6' value='Запиши'/>
						<a href='' data-ng-click='cancelNewPass()' class='uk-button uk-button-danger uk-width-1-6'>Откажи</a>
					</div>
				</form>
				
			</div>
		</div>
</div>

