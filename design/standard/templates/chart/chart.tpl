{ezscript_load( array('highcharts.js','chart.js' ) )}

<script type="text/javascript">
	{if $data}
		var jsonData = {$data};
	{/if}
</script>


<h1>MW Chart</h1>

<div id="chart">
    
</div>