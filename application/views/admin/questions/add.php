<div class='uk-container uk-conainer-center uk-margin-top centered' data-ng-controller='questions'>
	<div class="uk-grid" data-uk-grid-margin="">
		<div class='uk-article uk-width-2-3 uk-margin-top'>
			<div class='uk-article-title uk-margin-bottom'>
				Добавяне на <?php echo $parentId === null ? "общ" : "последващ"?> въпрос
			</div>
			<hr/>
			<div calss='uk-article-lead'>
				<form class='uk-form' method="POST" action="<?php echo base_url() ?>index.php/questions/adder">
					<label class='uk-width-1-4'>Текст на въпроса:</label>
					<input type='text' name='question' class='uk-width-2-4' required/>
					<br/>

					<hr/>
					<label for='question_type' class='uk-width-1-4'>Вид на Въпроса:</label>
					<select name='question_type' ng-change='setQuestionType()' ng-model='Model.question_type' required>
						<option value='opened' selected>Отворен</option>
						<option value='closed'>Затворен</option>
					</select>
					<hr/>
					<div class='answers uk-grid' data-ng-show='Model.question_type === "closed" '>
						<h3 class='uk-width-4-5'>Отговори</h3>
						<a href='' data-ng-click='addAnswer()' class='uk-button uk-width-1-5'>Добави</a>
					</div>

					<input type='submit' value='Запиши' class='uk-button uk-button-primary'/>
				</form>
			</div>
		</div>
	</div>
</div>