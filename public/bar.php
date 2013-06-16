<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>VAW</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		
		<script>
		var cat=[];
        var count[];
				function getdetails(){
				 $.getJSON("../includes/data.php", function(data){
				 
				 for (x in data)
				 {
				 
				 var itemType = data[x].name;
                 var itemCount = data[x].index;
				 cat.push(items);
				 //alert(items);
			
				}
				
				});
			return cat;	
			}
		</script>
<script>		
		$(function () {
		
			$('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Womens Voilence Data'
            },
            xAxis: {
                //categories: [ "nepal","America", "Asia"],// 'Europe', 'Oceania'],
				categories: getdetails(),
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Population (millions)',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' millions'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -100,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Year 1800',
                //data: [107, 31, 635, 203, 2]
				data: [107, 31, 635]
            }, {
                name: 'Year 1900',
                //data: [133, 156, 947, 408, 6]
				data: [133, 156, 947]
            }, {
                name: 'Year 2008',
                //data: [973, 914, 4054, 732, 34]
				data: [973, 914, 4054]
            }]
        });
    });
   	</script>
	</head>
	<body>
	<h1>VAW Data survey</h1>
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
<button type="button" onclick="getdetails()" >show me</button>

	</body>
</html>
