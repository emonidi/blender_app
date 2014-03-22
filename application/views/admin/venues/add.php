<div class='uk-container uk-conainer-center uk-margin-top centered'>
	<div class="uk-grid" data-uk-grid-margin="">
		<div class='uk-article uk-width-2-3'>
			<div class='uk-article-title'>
				<h2>Добавяне на заведение</h2>
			</div>
			<div class='uk-article-lead'>
				<form class='uk-form' action="<?php echo base_url()?>index.php/venues/adder" method="POST"  enctype="multipart/form-data" >
					<p>
						<label class='uk-width-1-3'>Име:</label>
						<br/>
						<input type='text' name='name'/>
						
					</p>
					<p>
						<label class='uk-width-1-3'>Описание</label>
						<br/>
						<textarea name='description' class='uk-width-1-2' rows='5'></textarea>
					</p>
					<p>
						<label>Снимка:</label>
						<input type='file' name='picture'/> 
					</p>
					<p>
						<input type='submit' class='uk-button uk-button-primary'/>
					</p>
				</form>
			</div>
		</div>
	</div>
</div>