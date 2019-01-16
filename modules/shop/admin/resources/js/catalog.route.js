zaa.config(['$httpProvider', '$stateProvider', '$controllerProvider', '$urlMatcherFactoryProvider', function($httpProvider, $stateProvider, $controllerProvider, $urlMatcherFactoryProvider) {
    $stateProvider
        .state("default.create", {
            url: "/product/create",
            templateUrl: function ($stateParams) {
                return "shopadmin/product/create";
            }
        })
        .state("default.edit", {
            url: "/product/edit?id",
            templateUrl: function ($stateParams) {
                return "shopadmin/product/update?id="+$stateParams.id
            }
        })
}]);
