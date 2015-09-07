function openOffersDialog() {
	$('#overlay').fadeIn('fast', function() {
		$('#boxpopup').fadeIn('fast');
        $('#boxpopup').css({ 'left': ($(window).width()-$('#boxpopup').width())/2 })
    });
}
function closeOffersDialog(prospectElementID) {
	$(function($) {
		$(document).ready(function() {
			$('#' + prospectElementID).fadeOut('fast');
			$('#overlay').fadeOut('fast');
		});
	});
}
