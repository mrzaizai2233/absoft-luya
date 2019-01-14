<?php
$attribute_sets = \app\modules\shop\models\EavAttributeSet::find()->all();
?>
<script>
    zaa.bootstrap.register('CreateController',['$scope','$rootScope','$http','$window','$location', '$stateParams',function($scope,$rootScope,$http,$window,$location,$stateParams){
        console.log($location.search())
        $scope.product= <?= json_encode($product->getData()) ?>;
        $scope.submit = function(){
            $http.post('admin/api-shop-product/update?id='+$scope.product.entity_id,$scope.product).then(function(){
                $window.history.back();
            })
        }
    }])
</script>
<div class="luya-content" ng-controller="CreateController">
    <?= $this->render('_form') ?>
</div>
