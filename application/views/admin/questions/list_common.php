
<div class='uk-container uk-conainer-center uk-margin-top centered' data-ng-controller='questionList'>
	<div class="uk-grid" data-uk-grid-margin="">

		<div class='uk-article uk-width-1-1 uk-margin-top'>
		<?php if(!$questions){ ?> 
			<h1>Няма въпроси</h1>
		<?php } else {?>
			<div class='uk-article-title uk-margin-bottom'>
				<?php //var_dump($questions) ?>
				<?php if($questions[0]->position_id > 0){ echo "Преглед на въпроси за ".$questions[0]->name;  } else {echo "Преглед на специфични въпроси";}?>
			</div>
			<div class='uk-article-lead'>
				<table class='uk-table'>
					<thead>
						<td>
							Въпрос:
						</td>
						<?php if($questions[0]->position_id > 0){ ?>
							<td>
								Позиция
							</td>
						<?php } ?>
						<td>
							Тип:
						</td>
						<td>
							Опции:
						</td>
					</thead>
					<tbody>
						<?php foreach($questions as $q){ ?> 

							<tr>
								<td>
									<div class=''>
										<div class='' data-eg-to-input eg-element-type='text' eg-field='question' eg-url='<?php echo base_url() ?>index.php/questions/edit_question/<?php echo $questions[0]->position_id ? $q->question_id : $q->id ?>'><?php echo $q->question; ?></div>
										<div class='answers uk-hidden'>
											<?php foreach($q->answers as $a){ ?> 
											<div class='uk-margin-top'>
												Отговор:
												<strong data-eg-to-input eg-element-type='text' eg-field='answer' eg-url='<?php echo base_url() ?>index.php/questions/edit_answer/<?php echo $a->id ?>'><?php echo $a->answer?></strong>
												Точки:
												<strong eg-to-input eg-element-type='text' eg-field='points' eg-url='<?php echo base_url() ?>index.php/questions/edit_answer/<?php echo $a->id ?>'><?php echo $a->points;?></strong>
											    <a href="<?php echo base_url() ?>index.php/questions/delete_answer/<?php echo $a->id?>?position_id=<?php echo $questions[0]->position_id ? $q->position_id : 0?>" class="uk-button uk-button-danger">Изтриване</a>
                                            </div>
										<?php } ?>
										<p>
											<a href="" ng-click='addAnswer(<?php echo $q->id; ?>)' class='uk-button uk-button-primary'>Добавяне на отговор</a>
										</p>
										</div>
									</div>
								</td>
								<?php if($questions[0]->position_id > 0){ ?>
									<td>
										<?php echo $q->name ?>
									</td>
								<?php } ?>
								<td>
									<?php echo $q->question_type==='closed' ? "Затворен" : "Отворен"?>
								</td>
								<td>
									<a href='' data-ng-click='showAnswers($event)' class="uk-button uk-button-primary">Отговори</a>
									<a href='' ng-click='confirmModal(<?php echo $questions[0]->position_id > 0 ? $q->question_id : $q->id ?>)' class='uk-button uk-button-danger'>Изтриване</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
				<div id='confirmationModal' class='uk-modal'>
					<div class='uk-modal-dialog'>
 						<h3>Наистина ли да изтрия?</h3>

 						<a href='<?php echo base_url() ?>index.php/questions/<?php echo $questions[0]->position_id > 0 ? "delete_specific" : "delete"  ?>/{{deleteId}}' class='uk-button uk-button-success uk-width-1-10'>Да</a>
 						<a href='' ng-click='closeConfirmationModal()' class='uk-button uk-button-danger uk-width-1-10'>Не</a>
 				
 					</div>
 					
				</div>
				<div id='modal' class='uk-modal'>
					<div class='uk-modal-dialog'>
						<h3>Добавяне на отговор</h3>
						<input type='hidden' name='questionId' ng-model='Model.questionId'>
						<p>
							<label>Отговор:</label>
							<input type='text' ng-model='Model.answer'/>
						</p>
						<p>
							<label>Точки</label>
							<input type="text" ng-model='Model.points'/>
						</p>
						<p>
							<a href='' data-ng-click='sendData("<?php echo base_url() ?>index.php/questions/add_answer")' class='uk-button uk-button-success'>Запис</a>
							<a href='' data-ng-click='resetModal()' class='uk-button uk-button-danger'>Прекрати</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>