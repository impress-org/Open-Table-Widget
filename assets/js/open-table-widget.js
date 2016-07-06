/**
 *  Open Table Widget JavaScript
 *
 *  @description: JavaScripts for the frontend display of Open Table Widget
 */

jQuery(document).ready(function ($) {

	//Selects (only if loaded)
	if (typeof $.fn.selectpicker == 'function') {
		$('.otw-selectpicker').selectpicker();
	}

	//Party Size Change
	$('.otw-party-size-select').on('change', function () {
		$('.PartySize').val($(this).val());
	});
	
	//Datepicker Initialization
	$(".otw-reservation-date").otwdatepicker({
		autoClose: true,
		dateFormat: "mm/dd/yyyy",
		weekStart: 0
	});

});