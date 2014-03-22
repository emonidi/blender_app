
<!DOCTYPE html>
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<link rel="stylesheet" href='<?php echo base_url()?>/assets/css/ui/css/uikit.almost-flat.css'>
			<link rel="stylesheet" href='<?php echo base_url()?>/assets/css/ui/css/custom.css'>
<!-- <link rel='stylesheet' href='<?php echo base_url()?>/assets/css/custom.css'>  -->			
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script type="text/javascript" src='<?php echo base_url()?>assets/css/bootstrap/editor.js'></script>
			<script src='<?php echo base_url()?>/assets/css/ui/js/uikit.js'></script>
			<script type="text/javascript" src='<?php echo base_url() ?>assets/bower_components/angular/angular.js'></script>
		
			<script type="text/javascript" src="<?php echo base_url()?>assets/js/app.js"></script>
		
			<script type="text/javascript" src="<?php echo base_url() ?>assets/js/controllers/controllers.js"></script>
			
			<script type="text/javascript" src="<?php echo base_url()?>assets/js/directives/toInput.js"></script>
			<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
			<style type="text/css">
				.centered{
					margin:20px auto !important;
				}
			</style>
			<script>
				$(document).ready(function(){
						$.get("<?php echo base_url() ?>index.php/positions/get_names",function(data){
							var d = JSON.parse(data);
							for(var key in d){
								var val = d[key];
								$(".positions").append('<li><a href="<?php echo base_url() ?>index.php/questions/specific_list/'+val.id+'">'+val.name+'</a></li>')
							}

						})
				})
			</script>
		</head>
		<body ng-app='app'>
		
		<header>
			<nav class='tm-navbar uk-navbar uk-navbar-attached'>
				<div class='uk-container uk-container-center'>
					<a class='uk-navbar-brand'>bHR</a>
					<ul class='uk-navbar-nav uk-hidden-small'>
						<li class='uk-parent' data-uk-dropdown>
							<a href='content'>Управление на съдържанието</a>
							<div class='uk-dropdown uk-dropdown-navbar'>
								<ul class='uk-nav uk-nav-navbar positions'>
									<li>
										<a href='<?php echo base_url()?>index.php/landingpage'>Първа страница</a>
									</li>
									<li class='uk-nav-header'>
										Общи въпроси
									</li>
									<li><a href='<?php echo base_url() ?>index.php/questions/add'>Добавяне</a></li>
									<li><a href='<?php echo base_url() ?>index.php/questions/general_list'>Преглед</a></li>
									<li class='uk-nav-header'>
										Специфични въпроси
									</li>
									<li><a href='<?php echo base_url() ?>index.php/questions/add_specific'>Добавяне</a></li>
									
								</ul>
							</div>
						<li/>
						<li>
							<a href="">Кандидати</a>
						</li>
						<li class='uk-parent' data-uk-dropdown>
							<a>Потребители</a>
							<div class='uk-dropdown uk-dropdown-navbar'>
							<ul class='uk-nav uk-nav-navbar'>
								<li>
									<a href='<?php echo base_url() ;?>index.php/users'>Преглед</a>
								</li>
								<li>
									<a href='<?php echo base_url() ;?>index.php/users/add'>Добавяне</a>
								</li>
							</ul>
							</div>
						</li>
						<li class='uk-parent' data-uk-dropdown>
							<a href=''>Заведения</a>
							<div class='uk-dropdown uk-dropdown-navbar'>
								<ul class='uk-nav uk-nav-navbar'>
									<li>
										<a href='<?php echo base_url() ?>index.php/venues'>Преглед</a>
									</li>
									<li>
										<a href='<?php echo base_url()?>index.php/venues/add'>Добавяне</a>
									</li>
								</ul>
							</div>
						<li/>
						<li class='uk-parent' data-uk-dropdown>
							<a href=''>Позиции</a>
							<div class='uk-dropdown uk-dropdown-navbar'>
								<ul class='uk-nav uk-nav-navbar'>
									<li >
										<a href='<?php echo base_url()?>index.php/positions'>Преглед</a>
									</li>
									<li>
										<a href='<?php echo base_url()?>index.php/positions/add'>Добавяне</a>
									</li>
								</ul>
							</div>
						</li>
						
					</ul>
					<div class='uk-navbar-flip'>
						<ul class='uk-navbar-nav'>
							<li>
								<a href="login/logout">Изход</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>