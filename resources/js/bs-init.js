document.addEventListener('DOMContentLoaded', function() {

	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bss-tooltip]'));
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
	  return new bootstrap.Tooltip(tooltipTriggerEl);
	})

	var charts = document.querySelectorAll('[data-bss-chart]');

	for (var chart of charts) {
		chart.chart = new Chart(chart, JSON.parse(chart.dataset.bssChart));
	}

	var products = document.querySelectorAll('[data-bss-dynamic-product]');

	for (var product of products) {
		var param = product.dataset.bssDynamicProductParam;
		product.dataset.reflowProduct = new URL(location.href).searchParams.get(param)
	}

}, false);