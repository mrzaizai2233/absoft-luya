
<script>
    zaa.bootstrap.register('CreateController',['$scope','$rootScope','$http','$window','$location', '$stateParams',function($scope,$rootScope,$http,$window,$location,$stateParams){
        $scope.page_title = 'Update Attribute';
        $scope.isUpdate = true;
        $scope.attribute= {};
        (function () {
            $http.get('admin/api-shop-attribute/view?id='+$stateParams.id).then(function(response){
                $scope.attribute = response.data
            })
        })();
        $scope.addOption = function(){
            $scope.attribute.options = $scope.attribute.options?$scope.attribute.options:[]
            $scope.attribute.options.push({})
        }
        $scope.removeOption = function(i){
            $scope.attribute.options = $scope.attribute.options.filter(function(elem,index){
                return i!==index
            })
        }
        $scope.submit = function(){
            $http.post('admin/api-shop-attribute/update?id='+$scope.attribute.attribute,$scope.attribute).then(function(response){
                $window.history.back();
            })
        }
    }])
</script>
<div class="luya-content" ng-controller="CreateController">
    <div class="card-body">
    <?= $this->render('_form') ?>
    </div>
</div>
