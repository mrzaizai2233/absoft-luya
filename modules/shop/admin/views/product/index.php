<script>
    zaa.bootstrap.register('ProductController', ['$scope', '$http', function($scope, $http) {

        $scope.products;

        $scope.click = function() {
            $http.get('admin/api-shop-product').then(function(response) {
                $scope.products = response.data;
                console.log($scope.products)
            });
        };

    }]);
</script>
<div class="luya-content" ng-controller="ProductController">
    <h1>My Custom View</h1>

    <button type="button" ng-click="click()" class="btn btn-primary">Click me</button>

    <table class="table table-hover">
        <thead>
        <tr>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="product in ProductController.products">
            <td>{{product.sku}}</td>
        </tr>
        </tbody>
    </table>
</div>