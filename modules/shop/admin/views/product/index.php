<script>

    zaa.bootstrap.register('IndexController', ['$scope', '$http','$location', function($scope, $http,$location) {

        $scope.products;

        $scope.loadProducts = function () {
            $http.get('admin/api-shop-product').then(function(response) {
                $scope.products = response.data;
            });
        }
        $scope.loadProducts()
        $scope.click = function() {
            $location.path('/shopadmin/product/create')
        };

    }]);
</script>

<div class="luya-content" ng-controller="IndexController">
    <h1>My Custom View</h1>
    <a class="btn button-primary" ng-click="click()">Create</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="product in products">
            <td>{{product.sku}}</td>
        </tr>
        </tbody>
    </table>

</div>


