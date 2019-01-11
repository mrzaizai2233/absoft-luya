<script>

    zaa.bootstrap.register('IndexController', ['$scope', '$http', function($scope, $http) {

        $scope.products;
        $http.get('admin/api-shop-product').then(function(response) {
            $scope.products = response.data;
        });
        $scope.click = function() {
            $http.get('admin/api-shop-product').then(function(response) {
                $scope.products = response.data;
            });
        };

    }]);
</script>

<div class="luya-content" ng-controller="IndexController">
    <h1>My Custom View</h1>
    <ul>
        <li ng-repeat="product in products">{{product.sku}}</li>
    </ul>


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