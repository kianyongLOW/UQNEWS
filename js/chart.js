$.ajax({
	type: "POST",
	dataType: 'json',
	url :"php/display-chart.php",
	success: function (obj){
		var sum = function(a, b) { return a + b };

	new Chartist.Pie('.ct-chart', obj, {
	  labelInterpolationFnc: function(value) {
		return Math.round(value / obj.series.reduce(sum) * 100) + '%';
	  }
	});
	}
});
