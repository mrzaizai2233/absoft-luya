<script>
    zaa.bootstrap.register('MyController', ['$scope', '$http', function($scope, $http) {

        $scope.dataResponse;

        $scope.click = function() {
            $http.get('myadminmodule/finder/data').then(function(response) {
                $scope.dataResponse = response.data;
            });
        };

    }]);
</script>
<div class="luya-content" ng-controller="MyController">
    <h1>My Custom View</h1>

    <button type="button" ng-click="click()" class="btn btn-primary">Click me</button>

    <div ng-if="dataResponse">
        The time is:
    </div>
</div>