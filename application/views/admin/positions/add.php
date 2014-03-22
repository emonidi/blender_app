<script type="text/javascript">
$(document).ready(function(){
	
});
</script>
<div class='uk-container uk-conainer-center uk-margin-top centered'>
	<div class="uk-grid" data-uk-grid-margin="">
		<div class='uk-article uk-width-2-3 uk-margin-top'>
			<div class='uk-article-title uk-margin-bottom'>
				Добавяне на позиция
			</div>
			<div class='uk-article-lead uk-margin-top'>
				<form class='uk-form' method='POST' action="<?php echo base_url()?>index.php/positions/adder" enctype="multipart/form-data">
					<div class='uk-grid'>
						<label class='uk-width-1-4'>Име:</label>
						<input class='uk-width-3-4' type='text' name='name' required />
					</div>
					<hr/>
					<div class='uk-grid'>
						<label  class='uk-width-1-4'>Заглавие: </label>
						<textarea  class='uk-width-3-4 editor' rows="" cols="" name='title'></textarea>
					</div>
					<div class='uk-grid'>
						<label  class='uk-width-1-4'>Начален Текст: </label>
						<textarea  class='uk-width-3-4' rows="" cols="" name='introduction'></textarea>
					</div>
					<hr/>
					<div class='uk-grid'>
						<label  class='uk-width-1-4'><strong>Задължения</strong> Заглавие:</label>
						<input class='uk-width-3-4' type='text' name='duties_title'>
					</div>
					<div class='uk-grid'>
						<label  class='uk-width-1-4'><strong>Задължения</strong> Текст:</label>
						<textarea  class='uk-width-3-4' rows="" cols="" name='duties'></textarea>
					</div>
					
					<hr/>
					<div class='uk-grid'>
						<label  class='uk-width-1-4'><strong>Изисквания</strong> Заглавие:</label>
						<input class='uk-width-3-4' type='text' name='requirements_title'>
					</div>
					<div class='uk-grid'>
						<label  class='uk-width-1-4'><strong>Изисквания</strong> Текст:</label>
						<textarea  class='uk-width-3-4' rows="" cols="" name='requirements'></textarea>
					</div>
					<hr/>
					
					<div class='uk-grid'>
						<label  class='uk-width-1-4'><strong>Ползи</strong> Заглавие:</label>
						<input class='uk-width-3-4' type='text' name='benefits_title'>
					</div>
					<div class='uk-grid'>
						<label  class='uk-width-1-4'><strong>Ползи</strong> Текст:</label>
						<textarea  class='uk-width-3-4' rows="" cols="" name='benefits'></textarea>
					</div>
					<hr/>
					
					<div class='uk-grid'>
						<label  class='uk-width-1-4'>Снимка:</label>
						<input type='file' name='image'>
					</div>
					<hr/>
					<input type='submit' class='uk-button uk-button-primary'>
				</form>
			</div>
		</div>
	</div>
</div>
