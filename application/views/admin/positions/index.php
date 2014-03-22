<div class='uk-container uk-conainer-center uk-margin-top centered' data-ng-controller='positionsIndex' data-delete-url='<?php echo base_url() ?>index.php/positions/delete/'>
	<div class="uk-grid" data-uk-grid-margin="">
		<div class='uk-article uk-width-2-3 uk-margin-top'>
			<div class='uk-article-title uk-margin-bottom'>
			 	Преглед на позиции
			</div>
			<div class='uk-article-lead uk-margin-top'>
				<table class='uk-table'>
					<thead>
						<tr>
							<td>
								Име
							</td>
							<td>
								Активна
							</td>
							<td>
								Опции
							</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach($positions as $p) {?>
								<tr>
									<td>
										<a href='<?php echo base_url()?>index.php/positions/view/<?php echo $p->id?>'><?php echo $p->name?></a>
									</td>
									<td>
										<?php echo $p->available=== '1' ? "Да" : "Не"?>
										<a href="<?php echo base_url()?>index.php/positions/<?php echo $p->available === '1' ? "deactivate" : "activate" ?>/<?php echo $p->id?>" class='uk-button uk-button-small <?php echo $p->available==='1' ? "uk-button-danger" : "uk-button-success"?>'>
											<?php echo $p->available === '1' ? "Деактивирай" : "Активирай"?>
										</a>
									</td>
									<td>
									<!-- 	<a href='<?php echo base_url()?>index.php/positions/edit/<?php echo $p->id; ?>' class='uk-button uk-button-primary'>Редакция</a>
									 -->
									 	<a href='#deleteConfirmation' data-ng-click='setPositionId("<?php echo $p->id?>")' data-uk-modal class='uk-button uk-button-primary'>Изтриване</a>
									</td>
								</tr>
						<?php }?>
					</tbody>
				</table>
				<div class='uk-modal' id="deleteConfirmation">
					<div class='uk-modal-dialog'>
						Да изтрия ли тази позиция?
						<div class='uk-grid'>
							<div class='uk-width-1-5 uk-margin-top'>
							<a href='' data-ng-click='delete()' class='uk-button'>Да</a>
						</div>
						<div class='uk-width-1-5 uk-margin-top'>
							 <a href='' class='uk-button uk-modal-close'>Не</a>
						</div>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>