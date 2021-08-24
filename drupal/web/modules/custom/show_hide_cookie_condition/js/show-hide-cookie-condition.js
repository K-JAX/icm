;(function ($) {
	setTimeout(function () {
		$('.cc_btn_accept_all').on('click', function () {
			const queryString = window.location.search
			if (queryString !== '') {
				const urlParams = new URLSearchParams(queryString)
				const userType = urlParams.get('userType')
				document.cookie =
					'Drupal.visitor.userType=' + userType + ";path='/';"
				location.reload()
			}
		})
	}, 2000)
})(jQuery)
