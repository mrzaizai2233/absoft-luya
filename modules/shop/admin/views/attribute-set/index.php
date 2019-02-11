<script>

    zaa.bootstrap.register('IndexController', ['$scope', '$http','$location','$state' ,function($scope, $http,$location,$state) {
        $scope.isModalHidden = true;
        $scope.getAttributeSets = function(){
            $http.get('admin/api-shop-attribute-set').then(function(response) {
                $scope.attribute_sets = response.data;
            });
        }
        $scope.getAttributeSets()
        $scope.attribute_set = {}
        $scope.submit = function(){
            $http.post('admin/api-shop-attribute-set/create',$scope.attribute_set).then(function(response){
                $scope.attribute_set = {}
                $scope.getAttributeSets()
                $scope.isModalHidden=!$scope.isModalHidden
            })
        }
    }]);


</script>
<div class="card" ng-controller="IndexController">
    <div class="card-header">

        <div class="float-left">
            <h1>Attribute set</h1>
        </div>
        <div class="float-right">
            <button ng-click="isModalHidden=!isModalHidden" class="btn btn-primary">Add Attribute Set</button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
<!--            <tr>-->
<!--                <th colspan="2">Set</th>-->
<!--            </tr>-->
            </thead>
            <tbody>
            <tr ng-repeat="attribute_set in attribute_sets">
                <td>
                    <a ui-sref="default.attribute_set_edit({id:attribute_set.attribute_set_id})" >{{attribute_set.attribute_set_name}}</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <modal is-modal-hidden="isModalHidden" modal-title="Add Attribute Set">
        <div class="form-group">
            <label for="name" class="col-sm-2 col-md-2 control-label">Attribute Set Name</label>
            <div class="col-sm-10 col-md-10">
                <input type="text" class="form-control" id="name" ng-model="attribute_set.attribute_set_name" placeholder="name">
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="button" ng-click="submit()">Save</button>
        </div>
    </modal>
</div>
