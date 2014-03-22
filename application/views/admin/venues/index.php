<div class='uk-container uk-conainer-center uk-margin-top centered' data-ng-controller='viewVenues'>
	<div class="uk-grid" data-uk-grid-margin="">
		<div class='uk-width-medium-1-4'>
        	<ul class="uk-nav uk-nav-side" data-uk-switcher="{connect:'#my-id'}">
						<?php $i=0; foreach($data as $d){ ?> 
					<li <?php if($i===0){echo "class='uk-active'";} ?>>
						<a href=''><?php echo $d->name?></a>
					</li>
				<?php $i++; }?>
			</ul>
		</div>
    	<div class="uk-width-medium-3-4">
		        	<ul id="my-id" class="uk-switcher">
		        		<?php $i = 0;?>
						<?php foreach($data as $d) {
							$url = base_url().'index.php/venues/update/'.$d->id;
						?>
					<li <?php if($i==0) {echo "class='active'";} ?>>
						<div class='uk-article'>
							<div class='uk-article-title uk-width-1'>
								<h2 class='uk-width-1' data-eg-to-input data-eg-element-type='text' data-eg-url='<?php echo $url ?>' data-eg-field='name' ><?php echo $d->name;?></h2>
								
							</div>
							<div class='uk-article-lead'>
								<div class='uk-grid'>
									<div class='uk-width-1-3'>
										<div class='uk-thumbnail-small'>
											<img alt="" src="<?php echo base_url()?>assets/images/venues/<?php echo $d->img_url?>">
										</div>
									</div>
									<div class='uk-width-2-3' data-eg-to-input data-eg-element-type='textarea' data-eg-field='description' data-eg-url="<?php echo $url ?>"><?php echo $d->description?></div>
								</div>
							</div>
						</div>
						<p>		<a href='#confirmationModal' data-ng-click='setId(<?php echo $d->id ?>)' data-uk-modal class='uk-button uk-button-danger'>Изтриване</a>
</p>
							
					</li>
				<?php $i++; } ?>
			</ul>
		</div>
	</div>
	<div id = 'confirmationModal' class='uk-modal'>
		<div class='uk-modal-dialog'>
			<h3>Наистина ли да изтрия?</h3>
			<a href='' data-ng-click="delete('<?php echo base_url()."index.php/venues/delete/"?>')" class='uk-button'>Да</a>
			<a href='' class='uk-button uk-modal-close'>Не</a>
		</div>
	</div>
</div>