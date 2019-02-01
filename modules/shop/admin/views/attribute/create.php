
<script>
    zaa.bootstrap.register('CreateController',['$scope','$rootScope','$http','$window','$location', '$stateParams',function($scope,$rootScope,$http,$window,$location,$stateParams){
        $scope.page_title = 'Update Attribute';
        $scope.isUpdate = false;
        $scope.attribute= {};
        $scope.addOption = function(){
            $scope.attribute.options = $scope.attribute.options?$scope.attribute.options:[]
            $scope.attribute.options.push({})
        }
        $scope.removeOption = function(i){
            $scope.attribute.options.splice(i,1)
        }
        $scope.submit = function(){
            $http.post('admin/api-shop-attribute/create',$scope.attribute).then(function(response){
//                $window.history.back();
            })
        }
    }])
</script>
<div class="luya-content" ng-controller="CreateController">
    <div class="card-body">
    <?= $this->render('_form') ?>
    </div>
</div>
