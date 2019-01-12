<script>
    zaa.bootstrap.register('CreateController',['$scope','$rootScope','$http',function($scope,$rootScope,$http){

        $scope.product= <?= json_encode($product->getData()) ?>;
        $scope.attribute_sets = []
        $scope.getAttributeSets= function(){
            $http.get('admin/api-shop-attribute/get-attribute-sets').then(function(response){
                $scope.attribute_sets = response.data
            })
        }
        $scope.getAttributeSets();
        $scope.submit = function(){
            $http.post('admin/api-shop-product/update?id='+$scope.product.entity_id,$scope.product).then()
        }
    }])
</script>
<div class="luya-content" ng-controller="CreateController">
    <pre>
        {{product}}
    </pre>
    <?= $this->render('_form') ?>
</div>
