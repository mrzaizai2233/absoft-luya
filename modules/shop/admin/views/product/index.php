<?php
use  luya\admin\ngrest\base\ActiveWindow;
?>
<script>

    zaa.bootstrap.register('IndexController', ['$scope', '$http','$location','$state' ,function($scope, $http,$location,$state) {

        $scope.products=[];

        $scope.loadProducts = function () {
            $http.get('admin/api-shop-product').then(function(response) {
                $scope.products = response.data;
            });
        }
        $scope.loadProducts()
        $scope.toUpdate=function(id){
            $state.go('default.update',{actionId:'update?id='+id})

        }
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
    <a class="btn button-primary" ui-sref="default.create">Create</a>
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
                <a class="btn button-success" ui-sref="default.edit({id:product.entity_id})" >Edit</a>
                <a class="btn btn-danger" ng-click="toUpdate(product.entity_id)">Custom</a>

            </td>
        </tr>
        </tbody>
    </table>
</div>


