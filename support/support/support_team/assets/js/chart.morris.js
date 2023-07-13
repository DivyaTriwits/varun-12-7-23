$(function() {
	'use strict';

	/* Morris Chart1*/
	var morrisData = [{
		y: '2006',
		a: 100,
		b: 90
	}, {
		y: '2007',
		a: 75,
		b: 65
	}, {
		y: '2008',
		a: 50,
		b: 40
	}, {
		y: '2009',
		a: 75,
		b: 65
	}, {
		y: '2010',
		a: 50,
		b: 40
	}, {
		y: '2011',
		a: 80,
		b: 90
	}, {
		y: '2012',
		a: 75,
		b: 65
	}, {
		y: '2013',
		a: 50,
		b: 70
	}];
	var morrisData2 = [{
		y: '2006',
		a: 100,
		b: 90,
		c: 80
	}, {
		y: '2007',
		a: 75,
		b: 65,
		c: 75
	}, {
		y: '2008',
		a: 50,
		b: 40,
		c: 45
	}, {
		y: '2009',
		a: 75,
		b: 65,
		c: 85
	}, {
		y: '2010',
		a: 100,
		b: 90,
		c: 80
	}, {
		y: '2011',
		a: 75,
		b: 65,
		c: 75
	}, {
		y: '2012',
		a: 50,
		b: 40,
		c: 45
	}, {
		y: '2013',
		a: 75,
		b: 65,
		c: 85
	}];

	/* Morris Chart1*/
	new Morris.Bar({
		element: 'morrisBar1',
		data: morrisData,
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Series A', 'Series B'],
		barColors: ['rgba(33, 79 ,190,0.6)', 'rgba(229, 77, 38,0.6)'],
		gridTextSize: 11,
		hideHover: 'auto',
		resize: true
	});

	/* Morris Chart2*/
	new Morris.Bar({
		element: 'morrisBar2',
		data: morrisData2,
		xkey: 'y',
		ykeys: ['a', 'b', 'c'],
		labels: ['Series A', 'Series B', 'Series C'],
		barColors: ['rgba(33, 79 ,190,0.6)', 'rgba(229, 77, 38,0.6)', 'rgba(95, 29, 215,0.3)'],
		gridTextSize: 11,
		hideHover: 'auto',
		resize: true
	});

	/* Morris Chart3*/
	new Morris.Bar({
		element: 'morrisBar3',
		data: morrisData,
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Series A', 'Series B'],
		barColors: ['rgba(33, 79 ,190,0.6)', 'rgba(229, 77, 38,0.6)'],
		stacked: true,
		gridTextSize: 11,
		hideHover: 'auto',
		resize: true
	});
	new Morris.Bar({
		element: 'morrisBar4',
		data: morrisData2,
		xkey: 'y',
		ykeys: ['a', 'b', 'c'],
		labels: ['Series A', 'Series B', 'Series C'],
		barColors: ['rgba(33, 79 ,190,0.6)', 'rgba(229, 77, 38,0.6)', 'rgba(95, 29, 215,0.3)'],
		stacked: true,
		gridTextSize: 11,
		hideHover: 'auto',
		resize: true
	});
	new Morris.Line({
		element: 'morrisLine1',
		data: [{
			y: '2006',
			a: 20,
			b: 10
		}, {
			y: '2007',
			a: 30,
			b: 15
		}, {
			y: '2008',
			a: 60,
			b: 40
		}, {
			y: '2009',
			a: 40,
			b: 25
		}, {
			y: '2010',
			a: 30,
			b: 15
		}, {
			y: '2011',
			a: 45,
			b: 20
		}, {
			y: '2012',
			a: 60,
			b: 40
		}],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Series A', 'Series B'],
		lineColors: ['rgba(33, 79 ,190,0.6)', 'rgba(229, 77, 38,0.6)'],
		lineWidth: 1,
		ymax: 'auto 100',
		gridTextSize: 11,
		hideHover: 'auto',
		resize: true
	});
	new Morris.Line({
		element: 'morrisLine2',
		data: [{
			y: '2006',
			a: 20,
			b: 10,
			c: 40
		}, {
			y: '2007',
			a: 30,
			b: 15,
			c: 45
		}, {
			y: '2008',
			a: 50,
			b: 40,
			c: 65
		}, {
			y: '2009',
			a: 40,
			b: 25,
			c: 55
		}, {
			y: '2010',
			a: 30,
			b: 15,
			c: 45
		}, {
			y: '2011',
			a: 45,
			b: 20,
			c: 65
		}, {
			y: '2012',
			a: 60,
			b: 40,
			c: 70
		}],
		xkey: 'y',
		ykeys: ['a', 'b', 'c'],
		labels: ['Series A', 'Series B', 'Series C'],
		lineColors: ['rgba(33, 79 ,190,0.6)', 'rgba(229, 77, 38,0.6)', 'rgba(95, 29, 215,0.3)'],
		lineWidth: 1,
		ymax: 'auto 100',
		gridTextSize: 11,
		hideHover: 'auto',
		resize: true
	});
	new Morris.Area({
		element: 'morrisArea1',
		data: [{
			y: '2006',
			a: 50,
			b: 40
		}, {
			y: '2007',
			a: 25,
			b: 15
		}, {
			y: '2008',
			a: 20,
			b: 40
		}, {
			y: '2009',
			a: 75,
			b: 65
		}, {
			y: '2010',
			a: 50,
			b: 40
		}, {
			y: '2011',
			a: 75,
			b: 65
		}, {
			y: '2012',
			a: 100,
			b: 90
		}],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Series A', 'Series B'],
		lineColors: ['rgba(33, 79 ,190,0.6)', 'rgba(229, 77, 38,0.6)'],
		lineWidth: 1,
		fillOpacity: 0.9,
		gridTextSize: 11,
		hideHover: 'auto',
		resize: true
	});
	new Morris.Area({
		element: 'morrisArea2',
		data: [{
			y: '2006',
			a: 20,
			b: 10,
			c: 40
		}, {
			y: '2007',
			a: 30,
			b: 15,
			c: 45
		}, {
			y: '2008',
			a: 50,
			b: 40,
			c: 65
		}, {
			y: '2009',
			a: 40,
			b: 25,
			c: 55
		}, {
			y: '2010',
			a: 30,
			b: 15,
			c: 45
		}, {
			y: '2011',
			a: 45,
			b: 20,
			c: 65
		}, {
			y: '2012',
			a: 60,
			b: 40,
			c: 70
		}],
		xkey: 'y',
		ykeys: ['a', 'b', 'c'],
		labels: ['Series A', 'Series B', 'Series C'],
		lineColors: ['rgba(33, 79 ,190,0.6)', 'rgba(229, 77, 38,0.6)', 'rgba(95, 29, 215,0.3)'],
		lineWidth: 1,
		fillOpacity: 0.9,
		gridTextSize: 11,
		hideHover: 'auto',
		resize: true
	});
	new Morris.Donut({
		element: 'donutexample',
		  data: [
			{label: "New clients", value: 35},
			{label: "Sales", value: 65}
		  ],
		colors: ['#214fbe' ,'#e54d26'],
		labelColor: '#77778e',
		resize: true
	});
	new Morris.Donut({
		element: 'morrisDonut2',
		data: [{
			label: 'Men',
			value: 12
		}, {
			label: 'Women',
			value: 30
		}, {
			label: 'Kids',
			value: 20
		}, {
			label: 'Infant',
			value: 25
		}],
		labelColor: '#77778e',
		colors: ['#214fbe', '#e54d26', '#269c8e', '#5f1dd7'],
		resize: true,
	});
});