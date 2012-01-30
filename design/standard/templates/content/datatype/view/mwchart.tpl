{ezscript_load( array('highcharts.js','chart.js' ) )}
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script type="text/javascript">
     google.load('visualization', '1.0', {ldelim}'packages':['corechart']{rdelim});
    $(document).ready(function() {ldelim}
        var jsonData = {$attribute.content.json};
	//initChart('{$attribute.content.type}',jsonData);
        google.setOnLoadCallback(drawChart(jsonData));
    {rdelim});
</script>

<div id="chart">
    
</div>