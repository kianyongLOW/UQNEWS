
var news = angular.module('news', []);
 
// If you use a controller twice on one page each controller
// has its own $scope. You can update the $scopes however
// by using the $rootScope.
news.controller('studentCtrl', function($scope, $rootScope) {
 
  $scope.student = [
    {name: "ali", MSG: "I love this"},
    {name: "ahhuat", MSG: "I like that"},
      {name: "yy", MSG: "HEHE"},
  ];
 
  // Receives the student to look up
  $scope.getstudentData = function(){
    studentSearch($scope.name);
  };
 
  // Searches through the student array for a match
  function studentSearch(name){
 
    // If a her is found it is returned
    $scope.studentData = "Not Found";
    for(var i=0; i < $scope.student.length; i++){
      if ($scope.student[i].name === name){
        $scope.studentData = $scope.student[i].name + " said " + $scope.student[i].MSG;
      }
    }
  }
 
  // If a broadcast is caught named studentUpdated the new studentUpdated
  // is added to the other controllers $scope
  $scope.$on("studentUpdated", function(event, args){
    console.log("MSG : " + args.MSG + " student : " + args.name);
    $scope.student.push({
      MSG: args.MSG, name: args.name
    });
  });
 
  // When a new student is added we broadcast the update to the
  // other controllers $scope
  $scope.addstudentData = function(MSG, name){
    $rootScope.$broadcast("studentUpdated",
    {
      MSG: MSG, name: name
    });
    console.log("MSG : " + MSG + " student : " + name);
 
  };
 
});