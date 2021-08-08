// initialize the scroller
AOS.init()
;(function ($, Drupal, drupalSettings) {
	console.log(document.cookie)
	// // Argument passed from InvokeCommand.
	// $.fn.setUserTypeCookie = function (argument) {
	//   console.log(argument);

	//   // Set cookie accordingly
	//   document.cookie = "userType=" + argument;
	// };
	// var myDropdown = $(".dropdown-toggle");

	$('.advisor-service-toggle').on('click', function () {
		$('.advisor-service-toggle:not(#' + $(this).attr('id') + ')')
			.addClass('collapsed')
			.attr('aria-expanded', 'false')

		$('.body-text').removeClass('show')
	})

	$('.dropdown-toggle').each(function () {
		var toggle = this
		toggle.addEventListener('show.bs.dropdown', function (toggle) {
			$(this).parents('.col-lg-4').addClass('focus')
			$('.two-sides-section').addClass('blur')
		})
		toggle.addEventListener('hide.bs.dropdown', function () {
			$(this).parents('.col-lg-4').removeClass('focus')
			$('.two-sides-section').removeClass('blur')
		})
	})

	var modal = $('#generalModal')

	$('.advisor-insight-thumb').on('click', function () {
		var title = $(this)
			.find('.views-field-name h2')
			.text()
			.replace(/\n/g, '')
		var vid = $(this).find('.video-embed-field-responsive-video').clone()
		modal.find('h5').text(title)
		modal.find('.modal-body').empty().append(vid)
		modal.modal('show')
	})

	Drupal.behaviors.myBehaviour = {
		attach: function (context, settings) {
			// console.log(settings.myLibrary.is_front)
			var timeHorizon = settings.myLibrary.time_horizon
			var riskLevel = settings.myLibrary.risk_level
			// return settings.myLibrary.is_front
			drawChart(timeHorizon, riskLevel)
		},
	}
})(jQuery, Drupal, drupalSettings)

function drawChart(timeHorizon, riskLevel) {
	if (document.querySelectorAll('#data-chart #svg-chart').length !== 0) return
	// console.log(riskLevel)
	// set the dimensions and margins of the graph
	var margin = { top: 30, right: 50, bottom: 70, left: 50 },
		width = 450 - margin.left - margin.right,
		height = 450 - margin.top - margin.bottom

	// append the svg object to the body of the page
	var svg = d3
		.select('#data-chart')
		.append('svg')
		.attr('id', 'svg-chart')
		.attr('width', width + margin.left + margin.right)
		.attr('height', height + margin.top + margin.bottom)
		.append('g')
		.attr('transform', 'translate(' + margin.left + ',' + margin.top + ')')

	// Create data
	var data = [{ x: riskLevel, y: timeHorizon }]

	var defs = svg.append('defs')

	var grad = defs.append('radialGradient').attr('id', 'bg-gradient')

	grad.append('stop').attr('offset', '0%').attr('stop-color', '#F43294')
	grad.append('stop').attr('offset', '20%').attr('stop-color', '#F89F2C')
	grad.append('stop').attr('offset', '40%').attr('stop-color', '#FDFF07')
	grad.append('stop').attr('offset', '55%').attr('stop-color', '#84D349')
	grad.append('stop').attr('offset', '80%').attr('stop-color', '#3B65F1')

	defs.append('clipPath')
		.attr('id', 'cut-off-edges')
		.append('rect')
		.attr('x', '0')
		.attr('y', '0')
		.attr('width', width)
		.attr('height', height)

	svg.append('circle')
		.attr('class', 'bg-circle')
		.attr('fill', 'url("#bg-gradient")')
		.attr('clip-path', 'url("#cut-off-edges")')
		.attr('cx', width)
		.attr('r', width * 1.4)

	// x grid lines
	var x = d3.scaleLinear().domain([0, 10]).range([0, width]) // This is the corresponding value I want in Pixel
	svg.append('g')
		.attr('class', 'grid')
		.attr('transform', 'translate(0,' + height + ')')
		.call(make_x_gridlines(x).tickSize(-height).tickFormat(''))

	// y grid lines
	var y = d3.scaleLinear().domain([0, 10]).range([height, 0]) // This is the corresponding value I want in Pixel
	svg.append('g')
		.attr('class', 'grid')
		.call(make_y_gridlines(y).tickSize(-width).tickFormat(''))

	// add the X Axis
	svg.append('g')
		.attr('class', 'x-axis')
		.attr('transform', 'translate(0,' + height + ')')
		.call(d3.axisBottom(x))

	// text label for the x axis
	svg.append('text')
		.attr('class', 'axis-title')
		.attr(
			'transform',
			'translate(' +
				width / 2 +
				' ,' +
				(height + margin.bottom - 20) +
				')'
		)
		.style('text-anchor', 'middle')
		.text('Risk Level')

	// add the Y Axis
	svg.append('g').attr('class', 'y-axis').call(d3.axisLeft(y))

	// text label for the y axis
	svg.append('text')
		.attr('class', 'axis-title')
		.attr('transform', 'rotate(-90)')
		.attr('y', 0 - margin.left)
		.attr('x', 0 - height / 2)
		.attr('dy', '1em')
		.style('text-anchor', 'middle')
		.text('Time Horizon')

	var dropShadowFilter = defs
		.append('svg:filter')
		.attr('id', 'drop-shadow')
		.attr('filterUnits', 'userSpaceOnUse')
		.attr('width', '250%')
		.attr('height', '250%')
	dropShadowFilter
		.append('svg:feGaussianBlur')
		.attr('in', 'SourceGraphic')
		.attr('stdDeviation', 5)
		.attr('result', 'blur-out')
	dropShadowFilter
		.append('svg:feDropShadow')
		.attr('dx', 7)
		.attr('dy', 7)
		.attr('stdDeviation', 3)
	dropShadowFilter
		.append('svg:feBlend')
		.attr('in', 'SourceGraphic')
		.attr('in2', 'the-shadow')
		.attr('mode', 'normal')

	// Add dot
	svg.selectAll('whatever')
		.data(data)
		.enter()
		.append('circle')
		.attr('class', 'indicator')
		.attr('cx', function (d) {
			return x(d.x)
		})
		.attr('cy', function (d) {
			return y(d.y)
		})
		.attr('r', 17)
		.attr('filter', 'url(#drop-shadow)')
}

// gridlines in x axis function
function make_x_gridlines(x) {
	return d3.axisBottom(x).ticks(5)
}

// gridlines in y axis function
function make_y_gridlines(y) {
	return d3.axisLeft(y).ticks(5)
}

const activate = (e) => {
	let active = e.getAttribute('aria-expanded') === 'false' ? 'true' : 'false'
	e.setAttribute('aria-expanded', active)
	let menu = document.querySelectorAll('#main-menu')[0]
	menu.setAttribute('aria-expanded', active)
}

const closePopUp = (e) => {
	let popup = document.querySelectorAll('.floating-popup')
	popup[0].classList.add('exit-popup')
}

function createCookie(name, value, days) {
	if (days) {
		var date = new Date()
		date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000)
		var expires = '; expires=' + date.toGMTString()
	} else var expires = ''
	document.cookie = name + '=' + value + ';'
}

const setAdvisorCookie = (e) => {
	document.cookie = 'userType=advisor_type;'
	// createCookie("userType", "advisor_type", "22");

	// window.location.href = "user/register";
}

const setInvestorCookie = (e) => {
	document.cookie = 'userType=investor_type'
	// createCookie("userType", "investor_type", "22");

	// window.location.href = "user/register";
}

const createCookieTooltip = (e) => {
	// check if tooltip is already expanded
	if (e.getAttribute('data-tooltip-expanded') !== 'true') {
		e.setAttribute('data-tooltip-expanded', 'true')
		let messageDiv = document.createElement('div')
		messageDiv.classList.add('tooltip', 'text-align-center')
		messageDiv.setAttribute('aria-modal', 'true')

		let acceptButton = document.createElement('button')
		acceptButton.classList.add('accept', 'btn', 'blue', 'rounded-0')
		acceptButton.append('Accept')

		let messageP = document.createElement('p')
		messageP.append(
			"This website uses 'cookies' to give you the best, most relevant experience. By clicking 'Accept', you agree to the storing of cookies on your device."
		)

		messageDiv.innerHTML =
			"<button class='close-button' aria-label='Close' onclick='closeToolTip(this)'></button>"
		messageDiv.append(messageP, acceptButton)
		messageDiv.classList.add('entering')
		messageDiv.setAttribute('role', 'dialog')

		e.parentNode.append(messageDiv)

		// setTimeout(() => {
		// 	messageDiv.classList.remove('entering')
		// }, 1000)
	}
}

const closeToolTip = (e) => {
	e.parentNode.setAttribute('data-tooltip-expanded', 'false')
	e.parentNode.classList.add('removing')
	// setTimeout(() => {
	// 	e.parentNode.remove()
	// }, 1000)
}
