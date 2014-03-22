
<!DOCTYPE html>
<html>
  <head>
  		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <?php ?>
		  		<link rel="stylesheet" href="<?php  echo base_url()?>assets/css/bootstrap/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/stylesheets/screen.css">
	    <script type="text/javascript" src="//connect.facebook.net/en_US/all.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript" src='<?php echo base_url() ?>assets/css/bootstrap/bootstrap.min.js'></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/bower_components/angular/angular.js"></script>
  		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/controllers/fe-controllers.js"></script>

  	 </head>
  <body ng-app="bhr">
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        // init the FB JS SDK


        // Additional initialization code such as adding Event Listeners goes here
        FB.Canvas.setSize({ width: 810, height: $(document).height() });

      };
      FB.init({
          appId      : '597637870302084',                        // App ID from the app dashboard
          status     : true,                                 // Check Facebook Login status
          xfbml      : true                                  // Look for social plugins on the page
      });

      // Load the SDK asynchronously
//      (function(d, s, id){
//         var js, fjs = d.getElementsByTagName(s)[0];
//         if (d.getElementById(id)) {return;}
//         js = d.createElement(s); js.id = id;
//         js.src = "//connect.facebook.net/en_US/all.js";
//         fjs.parentNode.insertBefore(js, fjs);
//       }(document, 'script', 'facebook-jssdk'));
    </script>