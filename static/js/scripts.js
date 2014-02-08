/*
codekit-prepend "bootstrap/affix.js"
codekit-prepend "bootstrap/alert.js"
codekit-prepend "bootstrap/button.js"
codekit-prepend "bootstrap/carousel.js"
@codekit-prepend "bootstrap/collapse.js"
@codekit-prepend "bootstrap/dropdown.js"
codekit-prepend "bootstrap/modal.js"
codekit-prepend "bootstrap/scrollspy.js"
codekit-prepend "bootstrap/tab.js"
@codekit-prepend "bootstrap/tooltip.js"
@codekit-prepend "bootstrap/popover.js"
codekit-prepend "bootstrap/transition.js"
*/
(function($) {
	$("a[data-toggle='popover']").popover({
		trigger: 'hover',
		placement: 'left'
	});
})(jQuery);