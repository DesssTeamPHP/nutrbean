$(document).ready(function() {
		//* validation with tooltips
		gebo_validation.ttip();
		//* regular validation
		gebo_validation.reg();
		
		gebo_validation.reg_frm_product_add_valid();
		
		
		
		
		gebo_validation.product_add_valid();
	});
	
	//* validation
	gebo_validation = {
		ttip: function() {
			var ttip_validator = $('.frm_urlrewrite').validate({
				onkeyup: false,
				errorClass: 'error', 
				validClass: 'valid',
				highlight: function(element) {
					$(element).closest('div').addClass("f_error");
				},
				unhighlight: function(element) {
					$(element).closest('div').removeClass("f_error");
				}, ignore : [], 
                rules: {
					request_path: { required: true, minlength: 3 },
					target_path: { required: true, minlength: 3 }
					
				},
				invalidHandler: function(form, validator) {
					$.sticky("There are some errors. Please corect them and submit again.", {autoclose : 5000, position: "top-center", type: "st-error" });
				},
				errorPlacement: function(error, element) {
					// Set positioning based on the elements position in the form
					var elem = $(element);
					
					// Check we have a valid error message
					if(!error.is(':empty')) {
						if( (elem.is(':checkbox')) || (elem.is(':radio')) ) {
							// Apply the tooltip only if it isn't valid
							elem.filter(':not(.valid)').parent('label').parent('div').find('.error_placement').qtip({
								overwrite: false,
								content: error,
								position: {
									my: 'left bottom',
									at: 'center right',
									viewport: $(window),
									adjust: {
										x: 6
									}
								},
								show: {
									event: false,
									ready: true
								},
								hide: false,
								style: {
									classes: 'ui-tooltip-red ui-tooltip-rounded' // Make it red... the classic error colour!
								}
							})
							// If we have a tooltip on this element already, just update its content
							.qtip('option', 'content.text', error);
						} else {
							// Apply the tooltip only if it isn't valid
							elem.filter(':not(.valid)').qtip({
								overwrite: false,
								content: error,
								position: {
									my: 'bottom left',
									at: 'top right',
									viewport: $(window),
                                    adjust: { x: -8, y: 6 }
								},
								show: {
									event: false,
									ready: true
								},
								hide: false,
								style: {
									classes: 'ui-tooltip-red ui-tooltip-rounded' // Make it red... the classic error colour!
								}
							})
							// If we have a tooltip on this element already, just update its content
							.qtip('option', 'content.text', error);
						};
                        
					}
					// If the error is empty, remove the qTip
					else {
						if( (elem.is(':checkbox')) || (elem.is(':radio')) ) {
							elem.parent('label').parent('div').find('.error_placement').qtip('destroy');
						} else {
							elem.qtip('destroy');
						}
					}
				},
				success: $.noop // Odd workaround for errorPlacement not firing!
			})
		},
		product_add_valid: function() {
			var ttip_validator = $('.frm_product_add_valid').validate({
				onkeyup: false,
				errorClass: 'error', 
				validClass: 'valid',
				highlight: function(element) {
					$(element).closest('div').addClass("f_error");
				}, ignore : [], 
				unhighlight: function(element) {
					$(element).closest('div').removeClass("f_error");
				},
                rules: {
					products_name: { required: true, minlength: 3 }, 
					manage_type: { required: true, minlength: 1 },
					availability_type: { required: true, minlength: 1 }
					
				},
				invalidHandler: function(form, validator) {
					$.sticky("There are some errors. Please corect them and submit again.", {autoclose : 5000, position: "top-center", type: "st-error" });
						// Don't need this 
						$('.tab-pane').find('.f_error').parents('.tab-pane').next().show();
						
						
/*$('a[data-toggle="tab"]').live('.tab-pane', function(e){
    e.target // activated tab
alert(e.target); 
    $($(e.target).attr('href')).find(".f_error").focus();

    //e.relatedTarget // previous tab
}); */
				},
				errorPlacement: function(error, element) {
					// Set positioning based on the elements position in the form
					var elem = $(element);
					
					// Check we have a valid error message
					if(!error.is(':empty')) {
						if( (elem.is(':checkbox')) || (elem.is(':radio')) ) {
							// Apply the tooltip only if it isn't valid
							elem.filter(':not(.valid)').parent('label').parent('div').find('.error_placement').qtip({
								overwrite: false,
								content: error,
								position: {
									my: 'left bottom',
									at: 'center right',
									viewport: $(window),
									adjust: {
										x: 6
									}
								},
								show: {
									event: false,
									ready: true
								},
								hide: false,
								style: {
									classes: 'ui-tooltip-red ui-tooltip-rounded' // Make it red... the classic error colour!
								}
							})
							// If we have a tooltip on this element already, just update its content
							.qtip('option', 'content.text', error);
						} else {
							// Apply the tooltip only if it isn't valid
							elem.filter(':not(.valid)').qtip({
								overwrite: false,
								content: error,
								position: {
									my: 'bottom left',
									at: 'top right',
									viewport: $(window),
                                    adjust: { x: -8, y: 6 }
								},
								show: {
									event: false,
									ready: true
								},
								hide: false,
								style: {
									classes: 'ui-tooltip-red ui-tooltip-rounded' // Make it red... the classic error colour!
								}
							})
							// If we have a tooltip on this element already, just update its content
							.qtip('option', 'content.text', error);
						};
                        
					}
					// If the error is empty, remove the qTip
					else {
						if( (elem.is(':checkbox')) || (elem.is(':radio')) ) {
							elem.parent('label').parent('div').find('.error_placement').qtip('destroy');
						} else {
							elem.qtip('destroy');
						}
					}
				},
				success: $.noop // Odd workaround for errorPlacement not firing!
			})
		},
        reg: function() {
            reg_validator = $('.frm_urlrewrite').validate({
				onkeyup: false,
				errorClass: 'error',
				validClass: 'valid',
				highlight: function(element) {
					$(element).closest('div').addClass("f_error");
				},
				unhighlight: function(element) {
					$(element).closest('div').removeClass("f_error");
				},
                errorPlacement: function(error, element) {
                    $(element).closest('div').append(error);
                },
                rules: {
					request_path: { required: true, minlength: 3 },
					target_path: { required: true, minlength: 3 }
				}, ignore : [], 
                invalidHandler: function(form, validator) {
					$.sticky("There are some errors. Please corect them and submit again.", {autoclose : 5000, position: "top-center", type: "st-error" });
				}
            })
        }, reg_frm_product_add_valid: function() {
            reg_validator = $('.frm_product_add_valid').validate({
				onkeyup: false,
				errorClass: 'error',
				validClass: 'valid',
				highlight: function(element) {
					$(element).closest('div').addClass("f_error");
				},
				unhighlight: function(element) {
					$(element).closest('div').removeClass("f_error");
				},
                errorPlacement: function(error, element) {
                    $(element).closest('div').append(error);
                },
                rules: {
					products_name: { required: true, minlength: 3 }, 
					manage_type: { required: true, minlength: 1 },
					availability_type: { required: true, minlength: 1 }
				}, ignore : [], 
                invalidHandler: function(form, validator) {
					//$.sticky("There are some errors. Please corect them and submit again.", {autoclose : 5000, position: "top-center", type: "st-error" });
					// $('#tabs a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show');
						// Don't need this 
						// final	$('.tab-pane').find('.f_error').parents('.tab-pane').next().show();
						
						
						//alert($('.tab-pane').find('.f_error').parents('.tab-pane').attr('id'));
						
						$('a[href="#' + $('.tab-pane').find('.f_error').parents('.tab-pane').attr('id') + '"]').tab('show');
						
						
						
						
/*$('a[data-toggle="tab"]').live('.tab-pane', function(e){
    e.target // activated tab
alert(e.target); 
    $($(e.target).attr('href')).find(".f_error").focus();

    //e.relatedTarget // previous tab
}); */
					
				}
            })
        }
	};
	
	
	
	  function rewrite_goBack(get_val)
{

 window.location.assign(get_val);

}
	