
$(document).ready(function () {
    $('#btn_update_title').on('click', function (e) {
        e.preventDefault();	 
        var formid = $(this).closest('form').attr("id");
        sendform('#'+formid,'');
        });
			//	#contact_email
			$('#btn_update_contact_email').on('click', function (e) {
				e.preventDefault();	 
				var formid = $(this).closest('form').attr("id");
				sendform('#'+formid,'');
				});
	//	#whatsapp
		$('#btn_update_whatsapp').on('click', function (e) {
			e.preventDefault();	 
			var formid = $(this).closest('form').attr("id");
			sendform('#'+formid,'');
			});
	//	#location
	$('#btn_update_location').on('click', function (e) {
		e.preventDefault();	 
		var formid = $(this).closest('form').attr("id");
		sendform('#'+formid,'');
		});
			
//favicon
$('#btn_update_favicon').on('click', function (e) {
	e.preventDefault();	 
	var formid = $(this).closest('form').attr("id");
	sendform('#'+formid,'');
	});
//logo
	$('#btn_update_logo').on('click', function (e) {
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
$("#images").focusout(function (e) {
	if (!validatempty($(this))) {
		return false;
	} else {

		return true;
	}
});

$("#image").on("change", function () {
	imageChangeForm("#image", "#image_label", "#imgshow-edit");
});
$("#favicon").on("change", function () {
	imageChangeForm("#favicon", "#favicon_label", "#faviconshow");
});
$("#logo").on("change", function () {
	imageChangeForm("#logo", "#logo_label", "#logoshow");
});
function imageChangeForm(btn_id, upload_label, imageId) {
	/* Current this object refer to input element */
	var $input = $(btn_id);
	var reader = new FileReader();
	reader.onload = function () {
		$(imageId).attr("src", reader.result);
		//   var filename = $('#photo_edit')[0].files.length ? ('#photo_edit')[0].files[0].name : "";
		var filename = $(btn_id).val().split('\\').pop();
		$(upload_label).text(filename);
	}
	reader.readAsDataURL($input[0].files[0]);

}
 
function resetForm(formId) {
	jQuery(formId)[0].reset();
	$('#image_label').text("Choose File");
	 
	//$('#icon_label').text('اختر ملف SVG');
	$('#imgshow').attr("src", emptyimg);
	$('#imgshow-edit').attr("src", emptyimg);
 
	//$('#iconshow').attr("src", emptyimg);
}
 

});
