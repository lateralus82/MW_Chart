//var chart;


// Use this for Highchart
function initChart(chartType, jsonData){
    
            var options = {
            chart: {
                renderTo: 'chart',
                defaultSeriesType: chartType
            },
            title: {
                text: 'Orkla Årsrapport'
            },
            xAxis: {
                categories: []
            },
            yAxis: {
                title: {
                    text: 'Kroner i mill'
                }
            },
            series: []
        };

        // Iterate over the lines and add categories or series
        $.each(jsonData, function(lineNo, line) {
            // header line containes categories
            if (lineNo == 0) {
                $.each(line, function(itemNo, item) {
                    if (itemNo > 0) options.xAxis.categories.push(item);
                });
            }
            // the rest of the lines contain data with their name in the first position
            else {
                var series = {
                    data: []
                };
                $.each(line, function(itemNo, item) {
                    if (itemNo == 0) {
                        series.name = item;
                    } else {
                        series.data.push(parseFloat(item));
                    }
                });

                options.series.push(series);

            }

        });
        // Create the chart
        var chart = new Highcharts.Chart(options);

}


// Use this for Google Chart
function drawChart(jsonData){

    var data = new google.visualization.arrayToDataTable(jsonData);

    // Set chart options
    var options = {'title':'Orkla Årsrapport',
                   vAxis: {title: 'Year',  titleTextStyle: {color: 'red'}},
                   'width':800,
                   'height':500};

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.BarChart(document.getElementById('chart'));
    chart.draw(data, options);          
}
    
    






  