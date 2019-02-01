<script>

    zaa.bootstrap.register('IndexController', ['$scope', '$http','$location','$state' ,function($scope, $http,$location,$state) {

        $scope.attributes=[];
        $scope.isModalHidden = 1;
        $scope.slug = null;
        $scope.loadAttributes = function () {
            $http.get('admin/api-shop-attribute').then(function(response) {
                $scope.attributes = response.data;
            });
        }
        $scope.loadAttributes()
        $scope.toUpdate=function(id){
            $state.go('default.update',{actionId:'update?id='+id})

        }
        $scope.deleteAttribute=function(id){
            $http.post('admin/api-shop-attribute/delete',{id:id}).then(function(response){
                $scope.attributes = $scope.attributes.filter(function(attribute){
                    return attribute.attribute_id !==id
                })

            })
        }
    }]);


</script>

<div class="luya-content" ng-controller="IndexController">
    {{isModalHidden}}
    <modal is-modal-hidden="isModalHidden" modal-title="isModalHidden">
        adasdsad
    </modal>
    <button ng-click="isModalHidden=!isModalHidden">Show Modal</button>
    <h1>Attributes</h1>
    <a class="btn button-primary" ui-sref="default.attribute_create">Create</a>
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
                <a class="btn button-success" ui-sref="default.attribute_edit({id:attribute.attribute_id})" >Edit</a>
                <a ng-show="attribute.is_user_defined" class="btn btn-danger" ng-click="deleteAttribute(attribute.attribute_id)">Delete</a>
            </td>
        </tr>
        </tbody>
    </table>
</div>


