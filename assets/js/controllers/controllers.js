app.controller("viewPostion",["$scope","$http",function($scope,$http){
	console.log($scope);
}]);

app.controller('positionsIndex',["$scope","$element",function($scope,$element){
	
	$scope.Model = {};

	$scope.Model.url = $($element).data('deleteUrl');
	console.log($scope.Model.url);

	$scope.setPositionId = function(posId){
		$scope.Model.posId = posId;
	}

	$scope.delete = function(){
		window.location.href=$scope.Model.url+$scope.Model.posId;
	}

	
}])


app.controller('addUser',["$scope",function($scope){
	$scope.Model = {};
	$scope.checkPass = function($event){

		if($scope.Model.password !== $scope.Model.password_repeat){
			$event.preventDefault();	
			alert('Паролите не съвпадат');
		}
	}
}]);


app.controller('viewVenues',["$scope",function($scope){
	$scope.Model = {};
	$scope.setId = function(id){
		$scope.Model.id = id;
		console.log($scope.Model.id);
	}

	$scope.delete = function(url){
		window.location.href=url+$scope.Model.id;
	}
}])


app.controller('')


app.controller('questions',["$scope","$compile",function($scope,$compile){
		$scope.Model = {};


		$scope.setQuestionType = function(){
			console.log($scope.Model.question_type);
		}

		$scope.addAnswer = function(){
			$(".answers").append("<p class='uk-width-1-1 uk-margin-top uk-margin-bottom'><label style='width:100px'>Отговор:</label><input class='uk-width-1-2'  type='text' name='answers[]' required/><br/><br/>"
				+"<label style='width:100px'>Toчки:</label><input  name='points[]' class='uk-width-1-2' type='number' name='points'>"
				+"</p>")
			console.log();
		}
}]);	

app.controller('questionList',["$scope",function($scope){

	$scope.Model ={
		question_id:'',
		answer:'',
		points:''
	};

	$scope.deleteId;
	$scope.Modal = new $.UIkit.modal.Modal("#modal");
	$scope.confirmationModal = new $.UIkit.modal.Modal("#confirmationModal");


	$scope.showAnswers = function($event){
		var $element = $($event.target);
		var $answers = $($element).parents('tr').find('.answers');
		$($answers).toggleClass('uk-hidden');
	}

	$scope.addAnswer = function(questionId){
		console.log(questionId);
		$scope.Model.question_id = questionId;
		$scope.Modal.show();
	}

	$scope.sendData = function(url){
		
		$.post(url,$scope.Model)
		  .success(function(data){
		  	 console.log(data);
		  	  var d = JSON.parse(data);
		  	  console.log(d);
		  	  if(d.answer_id){
		  	  	$scope.resetModal();
		  	  	window.location.reload()
		  	  }
		  })
		  .error(function(err){
		  	console.log(err);
		  })
	}

	$scope.confirmModal = function(questionId){
		$scope.confirmationModal.show();
		$scope.deleteId = questionId;
	}

	$scope.closeConfirmationModal = function(){

		$scope.confirmationModal.hide();
	}

	

	$scope.resetModal = function(){
		$scope.Model ={
			question_id:'',
			answer:'',
			points:''
		};

		$scope.Modal.hide();
	}
}]);

app.controller('userController',["$scope","$http","$location",function($scope,$http,$location){
	$scope.Model = {};
	$scope.Modal;
	$scope.Pass = {};
	$scope.confirmDelete = function(userId){
			$scope.Model.userId = userId;
			$scope.Modal = new $.UIkit.modal.Modal("#deleteConfirmation");
			$scope.Modal.show();
	};

	$scope.delete = function(deleteUrl){
		var deleteUrl = deleteUrl+$scope.Model.userId;
		$http.post(deleteUrl).
		success(function(data){
			if(data.error){
				alert(data.error);
			}else{
				$scope.Modal.hide();
				window.reload();
			}
		})
	}

    $scope.changeEmailNotification = function($event,userId){
        var checked = $($event.target).is(":checked");
        console.log(checked);
        var data = {
            field:"email_notification",
            value:0
        }
        if(checked){
            data.value = 1;
        }else{
            data.value = 0;
        }

        $.post("users/edit/"+userId,data,function(d){
            console.log(d);
        })
    }

	$scope.changePass = function(changePassUrl){
		$scope.Modal = new $.UIkit.modal.Modal("#newPass");
		$scope.Modal.show();
		$scope.changePassUrl = changePassUrl;

	}

	$scope.sendPass = function($event){
		$event.preventDefault();

		var $elem = $($event.target);
		var $form = $($elem).parents('form');
		var $inputs = $($form).find('input');

		$($inputs).each(function(i,$input){

			if($($input).val() === ''){
				alert("Всички полета трябва да са попълнени")
				return false;
			}
		})

		$.post($scope.changePassUrl,$scope.Pass,function(data){
			
			var data = JSON.parse(data);
			console.log(data);
			if(data.error){
				alert("Грешка:"+data.error);
				return false;
			}else if(data.status){
				$scope.Modal.hide();
				alert("Паролата е променена")
			}
				
			
			
		}).error(function(err){
			alert("Ооопа! Стана някаква грешка. Моля опитай пак");
			console.log(err);
		})
			
	}


	$scope.cancelNewPass = function(){
		$scope.Modal.hide();
	}
}])