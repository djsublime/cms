/* Italian initialisation for the jQuery UI date picker plugin. */

jQuery(function($){
	
	if($.datepicker) {

		$.datepicker.regional['en'] = {

			dateFormat: 'dd/mm/yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''

		};

		$.datepicker.setDefaults($.datepicker.regional['en']);

	}

});
