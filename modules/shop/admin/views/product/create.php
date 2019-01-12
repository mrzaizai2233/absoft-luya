<script>
    zaa.bootstrap.register('CreateController',['$scope','$rootScope','$http',function($scope,$rootScope,$http){

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
            $http.post('admin/api-shop-product/create',$scope.product).then()
        }
    }])
</script>
<div class="luya-content" ng-controller="CreateController">
    <?= $this->render('_form') ?>
</div>
