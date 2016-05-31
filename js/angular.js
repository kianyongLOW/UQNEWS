var app = angular.module('uqnews', []);


app.controller('studentCtrl', function($scope, $http) {
   $scope.updateData = function(){
    $http.get("php/retrieve-all-thoughts.php").then(function(response) {
        $scope.students = response.data.student;
    })

   }
 $scope.updateData();
    $scope.check_credentials = function () {
        
        var error = 0;
        var valuesFromText = $scope.msg;
        if($scope.msg == null){
            error = 1;
        }
        if (error === 0) {
            var request = $http({
                method: "POST",
                url: "php/insert-message.php",
                data: {
                    MSG: valuesFromText,
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            });
            /* Check whether the HTTP Request is Successfull or not. */
            request.success(function (data) {
                $scope.updateData();
                if(data.success == 2 || data.success == 0 ){
                    $scope.message = "Error: Somethign went wrong or you have to log in first";
                }else{
                    $scope.message = "New message added";
                }
            });
        }
        else {
            $scope.message = "You have Filled Wrong Details! Error: " + error;
        }
    }
 $scope.getClass = function (s) {
    return  {
        "fa-mars" : s.gender === 'f',
        "fa-venus" : s.gender === 'm' 
    };
  };
    
  // Receives the student to look up
  $scope.getstudentData = function(){
    studentSearch($scope.name);
  };
 
  // Searches through the student array for a match
  function studentSearch(name){
    // If a her is found it is returned
    $scope.studentData = [];
    for(var i=0; i < $scope.students.length; i++){
      if ($scope.students[i].name === name){
        $scope.studentData.push($scope.students[i]);
    }
  }
}
    
   

});
