/**
 * Created by - LENOVO - on 13/08/2015.
 */
conAngular.controller('UserCtrl', ['$scope', 'user', '$http', function ($scope, user) {
    $scope.main = {
        page: 1,
        term: ''
    };

    // init get data
    user.get($scope.main.page, $scope.main.term)
        .success(function (data) {
            // result data
            alert(data.data);
        })
        .error(function (data) {
            alert(data);
        });

}]);
