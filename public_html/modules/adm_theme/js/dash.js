$(document).ready(function() {
	class  ChartJson{
		constructor(canvas_id,json_url){
			this.canvas_id=canvas_id;
			this.json_url=json_url;
			this.ctx= $("#"+this.canvas_id);
			this.data={
				datasets: [{
					label: "count",
					data: [],
					fill: false
				}
				]
			};
			this.config = {
				type: 'line',
				data : this.data,
				options: {
					maintainAspectRatio: false,
					responsive: false,
					title:{
						display:false,
						text:"Chart.js Time Point Data"
					}, 
					scales: {
						xAxes: [{
							type: "time",
							time: {
								unit: 'day',
								tooltipFormat: 'll'
							},
							display: true, 
							scaleLabel: {
								display: true,
								labelString: 'Date'
							}
						}],
						yAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'value'
							}
						}]
					}
				}
			};
		}

		load(){
			var ctx=this.ctx;
			var config=this.config;
			var res = $.getJSON(this.json_url,{test:'test'}).done(function(data){
				config.data.datasets[0].data = data.map(function(item) {
	     			return {x: new Date(item["x"]), y: item["y"]};
		 		});
	
				return new Chart(ctx, config);		
			});
			
		}
	}

	let gj = new ChartJson("myChart",'/test.json').load();
});