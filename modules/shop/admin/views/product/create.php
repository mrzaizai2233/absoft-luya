<script>
    zaa.bootstrap.register('CreateController',['$scope','$rootScope','$http','$window',function($scope,$rootScope,$http,$window){

        $scope.product= {

        }
        $scope.attribute_sets = []
        $scope.getAttributeSets= function(){
            $http.get('admin/api-shop-attribute/get-attribute-sets').then(function(response){
                $scope.attribute_sets = response.data
            })
        }
        $scope.getAttributeSets();
        $scope.submit = function(){
            $http.post('admin/api-shop-product/create',$scope.product).then(function(){
                $window.history.back();
            })
        }
    }])
</script>
<div class="luya-content" ng-controller="CreateController">
    <?= $this->render('_form') ?>
</div>