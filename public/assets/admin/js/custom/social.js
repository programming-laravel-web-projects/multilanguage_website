
$(document).ready(function () {
 
	 //social create
	 $('#btn_create_social').on('click', function (e) {
		e.preventDefault();	 
		var formid = $(this).closest('form').attr("id");
		sendform('#'+formid,'');
		});

	 // //social update
	 $('#btn_update_social').on('click', function (e) {
		e.preventDefault();	 
		var formid = $(this).closest('form').attr("id");
		sendform('#'+formid,'');
		});

        function sendform(formid,formtype) {
            startLoading();
		ClearErrors();
		//var fdata = $( "#create_form" ).serialize();
		var form = $(formid)[0];
		var formData = new FormData(form);
		urlval = $(formid).attr("action");
        		$.ajax({
			url: urlval,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			//contentType: 'application/json',
			success: function (data) {
				//	alert(data);
				endLoading();
				//$('#errormsg').html('');
				//$('#sortbody').html('');
				if (data.length == 0) {
					noteError();
				} else if (data == "ok") {
					noteSuccess();

					ClearErrors();
 
					
				}
				// $('.alert').html(result.success);
			}, error: function (errorresult) {
				endLoading();
				var response = $.parseJSON(errorresult.responseText);
				// $('#errormsg').html( errorresult );
				noteError();
				$.each(response.errors, function (key, val) {
					$("#" + key + "-error").text(val[0]);
					$("#" + key).addClass('is-invalid');
					//$('#error').append(key+"-"+ val[0] +"/");
				});

			}, finally: function () {
				endLoading();

			}
		});
        }

// delete video
 
//
function ClearErrors() {

    $('.error').html('');
    $(":input").removeClass('is-invalid');     
}
function noteSuccess() {
	toastr.success("Sucsess");	 
}
function noteError() {
	toastr.error("Faild");		 
}
$("#name").focusout(function (e) {
	if (!validatempty($(this))) {
		return false;
	} else {

		return true;
	}
});
$("#code").focusout(function (e) {
	if (!validatempty($(this))) {
		return false;
	} else {

		return true;
	}
});
$("#link").focusout(function (e) {
	if (!validatempty($(this))) {
		return false;
	} else {

		return true;
	}
});
function resetForm(formId) {
	jQuery(formId)[0].reset();
	//$('#image_label').text("Choose File");
	 
	//$('#icon_label').text('اختر ملف SVG');
	//$('#imgshow').attr("src", emptyimg);
//$('#imgshow-edit').attr("src", emptyimg);
 
	//$('#iconshow').attr("src", emptyimg);
}
 

});
