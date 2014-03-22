<div class="marketing" data-ng-controller="welcome">
    <div class="wrapper">
       <div class="row">
            <div class="text col-lg-10 col-md-10 col-xs-12 col-lg-offset-1">
               <h1><?php echo $data['text']['first_page_slogan']?></h1>
               <p>
                   <?php echo $data['text']['first_page_text']?>
               </p>
               <div class="row">
                   <div class="col-lg-12 start-button">
                       <a ng-click="checkFacebookUser('<php echo base_url() ?>index.php/profile')" href="" class="btn btn-success">Започни от тук</a>
                   </div>
               </div>
           </div>
       </div>
    </div>
</div>
<div class="row venues">
    <div class="container">
       <div class="row">
           <?php foreach ($venues as $v){?>

           <div class="col-lg-4 col-md-4 col-xs-4 venue">
               <div class="col-lg-12">
                   <img class="img-circle" src='./assets/images/venues/<?php echo $v->img_url;?>'/>
               </div>
               <div class="col-lg-12">
                   <h4><?php echo $v->name ?></h4>
                   <p>
                        <?php echo $v->description; ?>
                   </p>
               </div>
           </div>
           <?php } ?>
       </div>
    </div>
</div>