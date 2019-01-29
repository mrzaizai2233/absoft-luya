<script>

    zaa.bootstrap.register('IndexController', ['$scope', '$http','$location','$state' ,function($scope, $http,$location,$state) {

        $scope.attributes=[];

        $scope.loadAttributes = function () {
            $http.get('admin/api-shop-attribute').then(function(response) {
                $scope.attributes = response.data;
            });
        }
        $scope.loadAttributes()
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
    <h1>Attributes</h1>
    <a class="btn button-primary" ui-sref="default.create">Create</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Attribute Code</th>
            <th>Attribute Type</th>
            <th>Is Required</th>
            <th>User Defined</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="attribute in attributes">
            <td>{{attribute.attribute_id}}</td>
            <td>{{attribute.attribute_code}}</td>
            <td>{{attribute.frontend_input}}</td>
            <td>{{attribute.is_required}}</td>
            <td>{{attribute.is_user_defined}}</td>
            <td>
                <a class="btn button-success" ui-sref="default.edit({id:product.entity_id})" >Edit</a>
                <a class="btn btn-danger" ng-click="deleteProduct(product.entity_id)">Delete</a>
            </td>
        </tr>
        </tbody>
    </table>
</div>


