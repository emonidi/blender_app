
    <div class="profile" data-ng-controller="candidate_profile" class="ng-cloak">
        <div class="container">
        <div class="row">
            <h1>Профил</h1>
        </div>
        <div class="row">
            <div class="thumbnail col-lg-6 col-lg-offset-3">
                <img class="img-circle" ng-src="http://graph.facebook.com/{{Model.id}}/picture?type=square"/>
            </div>
        </div>
        </div>
        <div class="row profile-form">
           <p>
            <form class="form-horizontal col-lg-8 col-lg-offset-3" method="POST" action="index.php/profile/submit" role="form">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Име:</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" id="" placeholder="" ng-model="Model.first_name" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Фамилия:</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" id="" placeholder="" ng-model="Model.last_name" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Email:</label>
                    <div class="col-lg-5">
                        <input disabled type="text" class="form-control" id="" placeholder="" ng-model="Model.email" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Телефон:</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" id="" placeholder="" ng-model="Model.telephone" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-9">
                        <input type="submit" value="Запиши" class="btn btn-success"/>
                    </div>
                </div>
            </form>
           </p>
        </div>
    </div>