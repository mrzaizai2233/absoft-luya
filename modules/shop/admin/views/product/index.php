<?php
use  luya\admin\ngrest\base\ActiveWindow;
?>
<script>

    zaa.bootstrap.register('IndexController', ['$scope', '$http','$location','$state', function($scope, $http,$location,$state) {
        console.log($state)
        $scope.products;

        $scope.loadProducts = function () {
            $http.get('admin/api-shop-product').then(function(response) {
                $scope.products = response.data;
            });
        }
        $scope.loadProducts()

        $scope.deleteProduct=function(id){
            $http.post('admin/api-shop-product/delete',{id:id}).then(function(response){
                $scope.products = $scope.products.filter(function(product){
                    return product.entity_id !==id
                })

            })
        }
    }]);


</script>

<div class="luya-content" ng-controller="IndexController">
    <h1>Products</h1>
    <a class="btn button-primary" ui-sref="default.route({moduleRouteId:'shopadmin',controllerId:'product',actionId:'create'})">Create</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="product in products">
            <td>{{product.entity_id}}</td>
            <td>{{product.name}}</td>
            <td>{{product.sku}}</td>
            <td>
                <a class="btn button-success" ui-sref="default.route.detail({moduleRouteId:'shopadmin',controllerId:'product',actionId:'update',id:product.entity_id})">Edit</a>
<!--                <button type="button" class="btn btn-danger" ng-click="deleteProduct(product.entity_id)">Delete</button>-->
                <button class="btn btn-danger" ng-click="$state.go('default.route', {moduleRouteId:'shopadmin',controllerId:'product',actionId:'update'});">Custom</button>
                    
            </td>
        </tr>
        </tbody>
    </table>

</div>


