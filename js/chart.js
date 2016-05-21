
$.ajax({
	type: "POST",
	dataType: 'json',
	url :"php/display-chart.php",
	success: function (obj){
		var sum = function(a, b) { return a + b };
		var options = {
  			width: "640px",
  			height: "320px"
		};

	new Chartist.Pie('.ct-chart', obj, options, {
	  labelInterpolationFnc: function(value) {
		return Math.round(value / obj.series.reduce(sum) * 100) + '%';
	  }
	});
	}
});
