<?php $p = $position[0]; $url = base_url()."index.php/positions/edit/".$p->id?>
<div class='uk-container uk-conainer-center uk-margin-top centered' data-ng-controller='viewPostion'>
	<div class="uk-grid" data-uk-grid-margin="">
		<div class='uk-article uk-width-2-3 uk-margin-top'>
			<div class='uk-article-title uk-margin-bottom'>
				Преглед на позиция <strong data-eg-to-input data-eg-element-type='text' data-eg-url='<?php echo $url ?>' data-eg-field='name'><?php echo $p->name;?></strong>
			</div>
			<div class='uk-article-lead uk-margin-top'>
				<div class='uk-panel uk-panel-box uk-grid'>
					<div class='uk-width-1-3'>Статус:</div>
					<div class='uk-width-1-3'>
						<?php echo $p->available === '1' ? "Активна" : "Неактивна" ; ?>
					</div>
					<div class='uk-width-1-3'>
						<a href='<?php echo base_url() ?>index.php/positions/<?php echo $p->available === '1' ? 'deactivate' : 'activate' ?>/<?php echo $p->id ?>?redirect=<?php echo $p->id ?>' class='uk-button <?php echo $p->available === '1' ? "uk-button-danger" : "uk-button-success" ?>'>
							<?php echo $p->available === '1' ? "Деактивирай" : "Активирай" ?>
						</a>
					</div>
				</div>
	
				<br/>
				<div class='uk-grid'>
					<div class='uk-width-1-3'>
						<?php if($p->image_url)  { ?>
						<img src='<?php echo base_url() ?>assets/images/positions/<?php echo $p->image_url; ?>'/>
						<?php }else{ ?>
							<div class='uk-panel uk-panel-box'>
								<form method="POST" action="<?php echo base_url() ?>index.php/positions/image_adder/<?php echo $p->id; ?>" enctype="multipart/form-data">
								
								<input type='file' name='image'/>
								<input type='submit' value='Запиши'>
							</form>
							</div>
						 <?php } ?>
					</div>
					<div class='uk-width-2-3'>
						<div class='uk-panel uk-panel-box'>
							<div class='uk-panel-title'><h4 data-eg-to-input data-eg-element-type='text' data-eg-field='title'  data-eg-url='<?php echo base_url() ?>index.php/positions/edit/<?php echo $p->id ?>'><?php echo $p->title === "" ? "Заглавие на позиция" : $p->title; ?></h4></div>
							<p data-eg-to-input data-eg-element-type='textarea' data-eg-field='introduction'  data-eg-url='<?php echo base_url() ?>index.php/positions/edit/<?php echo $p->id ?>'><?php echo $p->introduction === "" ? "Начален текст" : $p->introduction?></p>
						</div>
					</div>
				</div>
				<br/>
				<div class='uk-panel uk-panel-box'>
					<div class='uk-panel-title' eg-to-input data-eg-element-type='text' eg-field='duties_title' eg-url="<?php echo $url ?>"><?php echo $p->duties_title === "" ? "Заглавие - задължения" : $p->duties_title ?></div>
					<p eg-to-input eg-element-type='textarea' eg-field='duties' eg-url='<?php echo $url ?>'><?php echo $p->duties === "" ? "Текст - задължения" : $p->duties ?></p>
				</div>
				<br/>
				<div class='uk-panel uk-panel-box'>
					<div class='uk-panel-title' eg-to-input data-eg-element-type='text' eg-field='requirements_title' eg-url="<?php echo $url ?>"><?php echo $p->requirements_title === ""  ? "Изисквания - заглавие" : $p->requirements_title?></div>
					<p eg-to-input eg-element-type='textarea' eg-field='requirements' eg-url='<?php echo $url ?>'><?php echo $p->requirements === "" ? "Изисквания - текст" : $p->requirements ?></p>
				</div>
				<br/>
				<div class='uk-panel uk-panel-box'>
					<div class='uk-panel-title' eg-to-input data-eg-element-type='text' eg-field='benefits_title' eg-url="<?php echo $url ?>"><?php echo $p->benefits_title === ""  ? "Ползи заглавие" : $p->benefits_title; ?></div>
					<p eg-to-input eg-element-type='textarea' eg-field='benefits' eg-url='<?php echo $url ?>'><?php echo $p->benefits === "" ? "Ползи текст" : $p->benefits ?></p>
				</div>
				
			</div>
		</div>
	</div>
</div>