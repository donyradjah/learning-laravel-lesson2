conAngular.factory('user', ['$http', function ($http) {
    return {
        // get data dengan pagination dan pencarian data
        get: function (page, term) {
            return $http({
                method: 'get',
                url: 'http://localhost:8000/user?page=1&term=',
                headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest' , "Access-Control-Allow-Origin" : "*","Access-Control-Allow-Methods" : "POST, GET, OPTIONS, DELETE","Access-Control-Max-Age" : "3600","Access-Control-Allow-Headers" : "x-requested-with"},
                error : alert('gagal')
            });
        }
    }
}]);