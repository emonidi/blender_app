var app = angular.module('bhr',[]);

app.controller('welcome',['$scope',function($scope){
       $scope.User = {};
       $scope.checkFacebookUser  = function(){
           FB.getLoginStatus(function(data){
               if(data.status === 'not_authorized'){
                   $scope.fbAuth();
               }else{
                   $scope.redirect();
               }
           });
       }

       $scope.fbAuth = function(){
           FB.login(function(res){
               res.status === 'connected' && $scope.redirect();
           },{scope:'email,user_about_me'});
       }





       $scope.redirect = function(){
           window.location.href='index.php/candidate_profile';
       }
}]);


app.service('facebook',['$q',function($q){

        return {
           getUser:function(){
                var defered = $q.defer();
                this.getToken().then(function(token){
                    console.log(token);
                    FB.api('/me',function(res){
                        defered.resolve(res)
                    });
                });

                return defered.promise;
           },
           getToken:function(){
               var defered = $q.defer();
                FB.getLoginStatus(function(res){
                   defered.resolve(res.authResponse.accessToken);
                });
                return defered.promise;
           }
       }
}]);


app.controller('candidate_profile',['$scope','facebook','$q',function($scope,facebook,$q){
     $scope.Model = {};

     $scope.getUser = function(){
        facebook.getUser().then(function(res){
            $scope.Model = res;

        });
     }

     $scope.getUser();
}])