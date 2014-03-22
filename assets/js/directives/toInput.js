
app.directive('egToInput',["$http",function($http){
	return {
		restrict:"AE",
		scope:true,
		link:function($scope,$elem,$attr){
			var Super = this;
			this.val = '';
			this.oldVal =  '';1
			Super.isInput = false;
			this.prependIcon = function(elem){
				$(elem).prepend('<i class="uk-icon-edit" style="margin-right:10px;"></i>');
			}
			this.prependIcon($elem);
			$($elem).click(function(ev){
				
				Super.appendElement($elem,$attr.egElementType);

			});

			$($elem).focusout(function(){
				var $input = $($elem).find('.eg-input');
				Super.val = $input.val();
				Super.putNewValue($elem);
				Super.isInput = false;	
				Super.editDb($attr.egUrl,$attr.egField);
			});

			//append icon
			


			this.getValue = function(elem){
				return $(elem).text();
			}

			this.appendElement = function(elem,elementType){
				if(!Super.isInput){
					Super.oldVal = Super.getValue(elem);
					$(elem).text('');
					switch(elementType){
						case "text":
							var cols = $attr.egCols ? $attr.egCols : 40;
							$(elem).append("<input class='eg-title eg-input' style='width:"+cols*10+"px !important;' data-eg-is-input data-ng-model='Model.currentEdit' type='text' value='"+Super.oldVal+"' style='width:"+$($elem).width()+"px;'>");			
						break;
						case "textarea":
							$(elem).append("<textarea class='eg-title eg-input data-ng-model='Model.currentEdit' style='width:100%;height:200px'>"+Super.oldVal+"</textarea>")
						break;
					}
					$('.eg-title').trigger('focus');
					Super.isInput = true;

				}
			}


			this.editDb = function(url,field){
				if(Super.oldVal !== Super.val){
					$.post(url,{"field":field,"value":Super.val}).
						success(function(data){
							console.log(data);
						}).error(function(err){
							alert("An error has occured.Please try again");
							console.log(err);
						});
				}
			}

			this.putNewValue =  function(elem){
				$(elem).find('.eg-input').remove();
				$(elem).text(Super.val);
				Super.prependIcon(elem);
			}

		}
	}
}])