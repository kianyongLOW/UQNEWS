var app = angular.module('uqnews', ['jsonService']);


app.controller('studentCtrl', function($scope, JsonService) {
  JsonService.get(function(data){
    $scope.students = data.student;
  });
    
  // Receives the student to look up
  $scope.getstudentData = function(){
    studentSearch($scope.name);
  };
 
  // Searches through the student array for a match
  function studentSearch(name){
    // If a her is found it is returned
    $scope.studentData = "Not Found";
    for(var i=0; i < $scope.students.length; i++){
      if ($scope.students[i].name === name){
        $scope.studentData = $scope.students[i].name + " said " + $scope.students[i].MSG;
      }
    }
  }
   

});
app.controller('sign_up', function ($scope, $http) {

    $scope.check_credentials = function () {
        /*
        * Validate the Email and Password using Regular Expression.
        * Once Validated call the PHP file using HTTP Post Method.
        */
        /*
        * Validate Email and Password.
        * Email shound not be blank, should contain @ and . and not more than 30 characters.
        * Password Cannot be blank, not be more than 12 characters, should not contain 1=1.
        * Set the Messages to Blank each time the function is called.
        */
        var error = 0;
        var valuesFromText = $scope.msg;

        if (error == 0) {
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
                $scope.message = "New message added";
                
            });
        }
        else {
            $scope.message = "You have Filled Wrong Details! Error: " + error;
        }
    }

});