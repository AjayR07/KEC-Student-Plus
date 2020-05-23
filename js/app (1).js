var app = angular.module('myApp', [])


.service('dataService',['$http', function ($http) {

       this.getData = function (pAPI, pPara,cb) {
             
              
              pData = pPara;
              

              $http({
                     url: "http://localhost:8082/api/" + pAPI,
                     dataType: "json",
                     data: pData,
                     method: "POST",
                     headers: {
                            "Content-Type": "application/json"
                     }
              })
                     .success(function (response) {
                            console.log(response);
                            cb(response);

                     })
                     .error(function (error) {

                     });

       
}
}])



.controller('myCtrl', function ($scope, $http,dataService) {
       $scope.regSearch = "";
       $scope.result = "";


       $scope.click = function () {
              if ($scope.regSearch != null)
              {

              pData = { "Search": $scope.regSearch };
              

              dataService.getData("user", pData, function(cb) {

                     response = cb;
                     $scope.Name = response[0].name;
                     $scope.regNo = response[0].rollno;
                     $scope.dateApp = response[0].dateApplied;
                     $scope.dateFrom = response[0].dateFrom;
                     $scope.dateTo = response[0].dateTo;
                     $scope.Catagory = response[0].catagory;
                     $scope.Event = response[0].event;
       
              });
       }
       }
              

      

       $scope.approve = function () {

              pData = { "Search": $scope.regSearch };
              

                     dataService.getData("approve", pData, function(cb) {
                            response = cb;
                            console.log(response);
                     });
              
              
       }

       $scope.meetme = function () {


              pData = { "Search": $scope.regSearch };

              
              dataService.getData("meetme", pData, function(cb) {
                     response = cb;
                     console.log(response);
              });
       

       }

       $scope.declined = function () {

             
              pData = { "Search": $scope.regSearch };
              

              dataService.getData("declined", pData, function(cb) {
                     response = cb;
                     console.log(response);
                     $scope.result = 'Request confirmed';
              });
       }
       

});