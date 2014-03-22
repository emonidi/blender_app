
	<div class='jumbotron' style='background:#1abc9c;color:#fff;text-align:center;'>
		<h2><?php echo $data['text']['first_page_slogan']?></h2>
		<img class='img-circle' src="http://us.123rf.com/400wm/400/400/fedorkondratenko/fedorkondratenko0906/fedorkondratenko090600023/5113644-wineglasses-on-bar-counter-with-blurred-crowd-in-background.jpg" width="180" height="180" class="mb-7 hero-image"/>
		<p>
			<?php echo $data['text']['first_page_text']?>
		</p>
		<a href='' class='btn btn-primary btn-lg'><?php echo $data['text']["first_page_go_button"]?></a>
	</div>

<section id='venues'>
		<div class='container no-padding-left'>
			<?php foreach ($venues as $v){?>
			<div class='thumbnail col-md-8'>
				<div class='col-md-3 no-padding-left' style='margin-right:0px;'>
					<img src='./assets/images/venues/<?php echo $v->img_url;?>'/>
				</div>
				<div class='col-md-9 description'>
					<p><?php echo $v->description?></p>
				</div>
			</div>
		<?php }?>
		</div>
</section>