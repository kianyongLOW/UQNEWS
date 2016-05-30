
$.ajax({
	type: "POST",
	dataType: 'json',
	url :"php/display-chart.php",
	success: function (obj){
		var sum = function(a, b) { return a + b };
		var options = {
  			width: "640px",
  			height: "320px",
            labelInterpolationFnc: function(value) {
                return Math.round(value / data.series.reduce(sum) * 100) + '%';
            }
        }
        var responsiveOptions = [
          ['screen and (min-width: 150px)', {
            chartPadding: 0,
            labelOffset: 100,
            labelDirection: 'explode',
            labelInterpolationFnc: function(value) {
              return value;
            }
          }],
          ['screen and (min-width: 1024px)', {
            labelOffset: 80,
            chartPadding: 20
          }]
        ];
        
	
    new Chartist.Pie('.ct-chart', obj, options,responsiveOptions);
	}
});
