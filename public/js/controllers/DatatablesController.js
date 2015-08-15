conAngular.controller('DatatablesController', function($rootScope, $scope, $http, $timeout) {

  // tables data



  // table 1
  $scope.table1opts = {
    "bLengthChange": false,
    "filter": false,
    "iDisplayLength": 5
  }

  // table 2
  $scope.table2opts = {
    "iDisplayLength": 5,
    "aLengthMenu": [
      [5, 10, 25, 50, -1],
      [5, 10, 25, 50, "all"]
    ]
  }

  // table 3
  $scope.table3opts = {
    "scrollY": "200px",
    "scrollCollapse": true,
    "paging": false
  }

  // table 4
  $scope.table4opts = {
    "iDisplayLength": 5,
    "bLengthChange": false,
    "filter": false,
    "dom": 'Tlfrtip',
    "tableTools": {
      "sSwfPath": "../assets/dataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
    }
  }

  // table 5
  $scope.table5opts = {
    "ajax": "../assets/dataTables/myData.txt",
    "scrollY": "200px",
    "dom": "frtiS",
    "deferRender": true
  }

});