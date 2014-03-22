<div class='uk-container uk-conainer-center uk-margin-top centered'>
	<div class="uk-grid" data-uk-grid-margin="">
			<div class="uk-width-medium-1-4">
				<ul class="uk-nav uk-nav-side" data-uk-switcher="{connect:'#nav-content'}">
                	<li class="uk-active"><a href="">Слоган</a></li>
                    <li class=""><a href="">Текст</a></li>
                    <li class=""><a href="">Текстът на бутона</a></li>
               </ul>
			</div>
            	<div class="uk-width-medium-3-4">
					<ul id="nav-content" class="uk-switcher">
                    	<li class="">
                    			<div class='uk-article'>
                    				<div class='uk-article-title'>
                    					<h3>Слоган</h3>
                    				</div>
                    				<div class='uk-article-meta'>
                    					<p>
                    						Първото главно изречение
                    					</p>
                    				</div>
                    				<div class='uk-article-lead'>
										<form method='POST' action='landingpage/addtext'>
											<textarea class='uk-width-medium-1-2' name='first_page_slogan'><?php echo $data['first_page_slogan']?></textarea>
											<br/>
											<input type='submit' class='uk-button uk-button-primary uk-margin-top'>
										</form>
                    				</div>
                    				
                    			</div>
                    		
                    	</li>
                        <li class="">
                        	<div class='uk-article'>
                        		<div class='uk-article-title'>
                        			<h3>Текст</h3>
                        		</div>
                        		<div class='uk-article-meta'>
                        			<p>Текстът под слогана</p>
                        		</div>
                        		<div class='uk-article-lead'>
                        				<form method='POST' action='landingpage/addtext'>
											<textarea class='uk-width-medium-1-1' name='first_page_text'><?php echo $data['first_page_text']?></textarea>
											<br/>
											<input type='submit' class='uk-button uk-button-primary uk-margin-top'>
										</form>
                        		</div>
                        	</div>
                        </li>
                        <li class="uk-active">
                        	<div class='uk-article-title'>
                        			<h3>Текст на бутона</h3>
                        		</div>
                        		<div class='uk-article-meta'>
                        			<p>Текстът на бутона</p>
                        		</div>
                        	<div class='uk-article-lead'>
                        				<form method='POST' action='landingpage/addtext'>
											<input type='text' name='first_page_go_button' value='<?php echo $data['first_page_go_button']?>'>
											<br/>
											<input type='submit' class='uk-button uk-button-primary uk-margin-top'>
										</form>
                        		</div>
                        </li>
		            </ul>
			</div>
     </div>
</div>