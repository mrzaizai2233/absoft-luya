
<script>
    zaa.bootstrap.register('CreateController',['$scope','$rootScope','$http','$window','$location', '$stateParams',function($scope,$rootScope,$http,$window,$location,$stateParams){
        $scope.page_title = 'Update Product'
        $scope.product= {};
        (function () {
            $http.get('admin/api-shop-product/view?id='+$stateParams.id).then(function(response){
                $scope.product = response.data
            })
        })()
        $scope.submit = function(){
            $http.post('admin/api-shop-product/update?id='+$scope.product.entity_id,$scope.product).then(function(response){
                $window.history.back();
            })
        }
    }])
</script>
<div class="luya-content" ng-controller="CreateController">
    <?= $this->render('_form') ?>
</div>
