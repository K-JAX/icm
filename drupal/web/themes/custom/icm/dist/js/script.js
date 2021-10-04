// initialize the scroller
AOS.init();

(function ($, Drupal, drupalSettings) {
  // // Argument passed from InvokeCommand.
  // $.fn.setUserTypeCookie = function (argument) {
  //   console.log(argument);
  //   // Set cookie accordingly
  //   document.cookie = "userType=" + argument;
  // };
  // var myDropdown = $(".dropdown-toggle");
  $('.advisor-service-toggle').on('click', function () {
    $('.advisor-service-toggle:not(#' + $(this).attr('id') + ')').addClass('collapsed').attr('aria-expanded', 'false');
    $('.body-text').removeClass('show');
  });
  $('.dropdown-toggle').each(function () {
    var toggle = this;
    toggle.addEventListener('show.bs.dropdown', function (toggle) {
      $(this).parents('.dropdown').addClass('expanded');
      $(this).parents('.layout.row').addClass('raise-section');
      $(this).parents('.col-lg-4').addClass('focus');
      $('.two-sides-section').addClass('blur');
    });
    toggle.addEventListener('hide.bs.dropdown', function () {
      $(this).parents('.dropdown').removeClass('expanded');
      $(this).parents('.layout.row').removeClass('raise-section');
      $(this).parents('.col-lg-4').removeClass('focus');
      $('.two-sides-section').removeClass('blur');
    });
  });
  var modal = $('#generalModal');
  $('.advisor-insight-thumb').on('click', function () {
    var title = $(this).find('.views-field-name h2').text().replace(/\n/g, '');
    var vid = $(this).find('.video-embed-field-responsive-video').clone();
    modal.find('h5').text(title);
    modal.find('.modal-body').empty().append(vid);
    modal.modal('show');
  }); // smooth scrolling
  // Check if page has hash

  if (window.location.hash) {
    var hash = window.location.hash;

    if ($(hash).length) {
      $('html, body').animate({
        scrollTop: $(hash).offset().top - 250
      }, 700, 'swing');
    }
  } // Select all links with hashes


  $('a[href*="#"]') // Remove links that don't actually link to anything
  .not('[href="#"]').not('[href="#0"]').click(function (event) {
    // On-page links
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']'); // Does a scroll target exist?

      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top - 250
        }, 700, function () {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();

          if ($target.is(':focus')) {
            // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable

            $target.focus(); // Set focus again
          }
        });
      }
    }
  });
  Drupal.behaviors.myBehaviour = {
    attach: function attach(context, settings) {
      if ((settings === null || settings === void 0 ? void 0 : settings.myLibrary) != undefined) {
        var timeHorizon = settings === null || settings === void 0 ? void 0 : settings.myLibrary.time_horizon;
        var riskLevel = settings === null || settings === void 0 ? void 0 : settings.myLibrary.risk_level;
        drawChart(timeHorizon, riskLevel);
      }
    }
  };
})(jQuery, Drupal, drupalSettings);

function drawChart(timeHorizon, riskLevel) {
  if (document.querySelectorAll('#data-chart #svg-chart').length !== 0) return; // console.log(riskLevel)
  // set the dimensions and margins of the graph

  var margin = {
    top: 30,
    right: 50,
    bottom: 70,
    left: 50
  },
      width = 450 - margin.left - margin.right,
      height = 450 - margin.top - margin.bottom; // append the svg object to the body of the page

  var svg = d3.select('#data-chart').append('svg').attr('id', 'svg-chart').attr('width', width + margin.left + margin.right).attr('height', height + margin.top + margin.bottom).append('g').attr('transform', 'translate(' + margin.left + ',' + margin.top + ')'); // Create data

  var data = [{
    x: riskLevel,
    y: timeHorizon
  }];
  var defs = svg.append('defs');
  var grad = defs.append('radialGradient').attr('id', 'bg-gradient');
  grad.append('stop').attr('offset', '0%').attr('stop-color', '#F43294');
  grad.append('stop').attr('offset', '20%').attr('stop-color', '#F89F2C');
  grad.append('stop').attr('offset', '40%').attr('stop-color', '#FDFF07');
  grad.append('stop').attr('offset', '55%').attr('stop-color', '#84D349');
  grad.append('stop').attr('offset', '80%').attr('stop-color', '#3B65F1');
  defs.append('clipPath').attr('id', 'cut-off-edges').append('rect').attr('x', '0').attr('y', '0').attr('width', width).attr('height', height);
  svg.append('circle').attr('class', 'bg-circle').attr('fill', 'url("#bg-gradient")').attr('clip-path', 'url("#cut-off-edges")').attr('cx', width).attr('r', width * 1.4); // x grid lines

  var x = d3.scaleLinear().domain([0, 10]).range([0, width]); // This is the corresponding value I want in Pixel

  svg.append('g').attr('class', 'grid').attr('transform', 'translate(0,' + height + ')').call(make_x_gridlines(x).tickSize(-height).tickFormat('')); // y grid lines

  var y = d3.scaleLinear().domain([0, 10]).range([height, 0]); // This is the corresponding value I want in Pixel

  svg.append('g').attr('class', 'grid').call(make_y_gridlines(y).tickSize(-width).tickFormat('')); // add the X Axis

  svg.append('g').attr('class', 'x-axis').attr('transform', 'translate(0,' + height + ')').call(d3.axisBottom(x)); // text label for the x axis

  svg.append('text').attr('class', 'axis-title').attr('transform', 'translate(' + width / 2 + ' ,' + (height + margin.bottom - 20) + ')').style('text-anchor', 'middle').text('Risk Level'); // add the Y Axis

  svg.append('g').attr('class', 'y-axis').call(d3.axisLeft(y)); // text label for the y axis

  svg.append('text').attr('class', 'axis-title').attr('transform', 'rotate(-90)').attr('y', 0 - margin.left).attr('x', 0 - height / 2).attr('dy', '1em').style('text-anchor', 'middle').text('Time Horizon');
  var dropShadowFilter = defs.append('svg:filter').attr('id', 'drop-shadow').attr('filterUnits', 'userSpaceOnUse').attr('width', '250%').attr('height', '250%');
  dropShadowFilter.append('svg:feGaussianBlur').attr('in', 'SourceGraphic').attr('stdDeviation', 5).attr('result', 'blur-out');
  dropShadowFilter.append('svg:feDropShadow').attr('dx', 7).attr('dy', 7).attr('stdDeviation', 3);
  dropShadowFilter.append('svg:feBlend').attr('in', 'SourceGraphic').attr('in2', 'the-shadow').attr('mode', 'normal'); // Add dot

  svg.selectAll('whatever').data(data).enter().append('circle').attr('class', 'indicator').attr('cx', function (d) {
    return x(d.x);
  }).attr('cy', function (d) {
    return y(d.y);
  }).attr('r', 17).attr('filter', 'url(#drop-shadow)');
} // gridlines in x axis function


function make_x_gridlines(x) {
  return d3.axisBottom(x).ticks(5);
} // gridlines in y axis function


function make_y_gridlines(y) {
  return d3.axisLeft(y).ticks(5);
}

var activate = function activate(e) {
  var active = e.getAttribute('aria-expanded') === 'false' ? 'true' : 'false';
  e.setAttribute('aria-expanded', active);
  var menu = document.querySelectorAll('#main-menu')[0];
  menu.setAttribute('aria-expanded', active);
};

var closePopUp = function closePopUp(e) {
  var popup = document.querySelectorAll('.floating-popup');
  popup[0].classList.add('exit-popup');
};

function createCookie() {
  console.log('right, wats all this then?'); // if (days) {
  // 	var date = new Date()
  // 	date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000)
  // 	var expires = '; expires=' + date.toGMTString()
  // } else var expires = ''
  // document.cookie = name + '=' + value + ';'
}

function getCookie(cname) {
  var name = cname + '=';
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');

  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];

    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }

    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }

  return '';
}

function haveConsent() {
  return getCookie('cookieconsent_dismissed') === 'yes';
}

var setAdvisorCookie = function setAdvisorCookie(e) {
  console.log(haveConsent());
  document.cookie = 'userType=advisor_type;'; // createCookie("userType", "advisor_type", "22");
  // window.location.href = "user/register";
};

var setInvestorCookie = function setInvestorCookie(e) {
  document.cookie = 'userType=investor_type'; // createCookie("userType", "investor_type", "22");
  // window.location.href = "user/register";
};

var createCookieTooltip = function createCookieTooltip(e) {
  // check if tooltip is already expanded
  if (e.getAttribute('data-tooltip-expanded') !== 'true') {
    e.setAttribute('data-tooltip-expanded', 'true');
    var messageDiv = document.createElement('div');
    messageDiv.classList.add('tooltip', 'text-align-center');
    messageDiv.setAttribute('aria-modal', 'true');
    var acceptButton = document.createElement('button');
    acceptButton.classList.add('accept', 'btn', 'blue', 'rounded-0');
    acceptButton.append('Accept');
    var messageP = document.createElement('p');
    messageP.append("This website uses 'cookies' to give you the best, most relevant experience. By clicking 'Accept', you agree to the storing of cookies on your device.");
    messageDiv.innerHTML = "<button class='close-button' aria-label='Close' onclick='closeToolTip(this)'></button>";
    messageDiv.append(messageP, acceptButton);
    messageDiv.classList.add('entering');
    messageDiv.setAttribute('role', 'dialog');
    e.parentNode.append(messageDiv); // setTimeout(() => {
    // 	messageDiv.classList.remove('entering')
    // }, 1000)
  }
};

var closeToolTip = function closeToolTip(e) {
  e.parentNode.setAttribute('data-tooltip-expanded', 'false');
  e.parentNode.classList.add('removing'); // setTimeout(() => {
  // 	e.parentNode.remove()
  // }, 1000)
};