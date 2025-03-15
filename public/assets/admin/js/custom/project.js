var result = '';
var cancelBtnId = '';
var gformData = "";
$(document).ready(function () {
	$('#btn_cancel').on('click', function (e) {
		resetForm();
		ClearErrors();
	});
	$('#btn_reset').on('click', function (e) {
		e.preventDefault();
		resetForm();
		ClearErrors();
	});
	$('#btn_save').on('click', function (e) {
		e.preventDefault();
		startLoading();
		ClearErrors();
		var form = $('#create_form')[0];
		var formData = new FormData(form);
		urlval = $('#create_form').attr("action");
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
					resetForm();
					ClearErrors();
				}

			}, error: function (errorresult) {
				endLoading();
				var response = $.parseJSON(errorresult.responseText);

				noteError();
				$.each(response.errors, function (key, val) {
					$("#" + key + "-error").text(val[0]);
					$("#" + key).addClass('is-invalid');

				});

			}, finally: function () {
				endLoading();
			}
		});
	});
	$('#btn_update_user').on('click', function (e) {
		e.preventDefault();
		startLoading();
		ClearErrors();
		//var fdata = $( "#create_form" ).serialize();
		var form = $('#create_form')[0];
		var formData = new FormData(form);
		urlval = $('#create_form').attr("action")


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



	});
	$('.btn_update_trans').on('click', function (e) {
		e.preventDefault();
		var formid = $(this).closest('form').attr("id");
		sendform('#' + formid, 'trans');
	});
	//open new image modal

	$('#btn-new-img').on('click', function (e) {
		e.preventDefault();
		resetForm('#create_image_form');
	});
	//open new video
	$('#btn-new-vid').on('click', function (e) {
		e.preventDefault();

		resetForm('#create_video_form');


	});
	//save new video
	$('#btn_create_video').on('click', function (e) {
		e.preventDefault();
		var formid = $(this).attr("form");

		formid = '#' + formid;
		cancelBtnId = "#btn-cancel-modal-create-video";
		var formData = $(formid).serialize();
		gformData = formData;

		rvideo.opts.query.fdata = gformData;
		rvideo.opts.target = $(formid).attr("action");
		rvideo.assignBrowse(Filevid[0]);
		showProgress();
		rvideo.upload();
		startLoading();
		ClearErrors();
		//sendform('#'+formid,'video'); 
	});
	//get image to edit
	$('.update').on('click', function (e) {
		e.preventDefault();
		imgId = $(this).attr("id");
		imgId = imgId.replace("edit-", "");
		resetForm('#update_image_form');
		loadImageInfo(imgId, 'image');
	});
	//get video to edit
	$('.update-video').on('click', function (e) {
		e.preventDefault();
		imgId = $(this).attr("id");
		imgId = imgId.replace("edit-", "");
		resetForm('#update_video_form');
		loadImageInfo(imgId, 'video');
	});
//pdf
$('.update-pdf').on('click', function (e) {
	e.preventDefault();
	imgId = $(this).attr("id");
	imgId = imgId.replace("edit-", "");
	resetForm('#update_pdf_form');
	loadImageInfo(imgId, 'pdf');
});
	function loadImageInfo(imageId, type) {
		startLoading();
		ClearErrors();
		urlval = editimgurl;
		urlval = urlval.replace("ItemId", imageId);
		$.ajax({
			url: urlval,
			type: "GET",

			//	data: formData,
			//	contentType: false,
			//	processData: false,
			//contentType: 'application/json',
			success: function (data) {
				//	alert(data);
				endLoading();

				if (data.length == 0) {
					noteError();
				} else {
					if (type == 'image') {
						$('#imgshow-edit').attr('src', data.image_path);
						$('#caption-edit').html(data.caption);
						//	$("#btn-cancel-modal").trigger("click");
					}else if(type == 'pdf'){
						$('#pdfshow').attr('href', data.image_path);
						$('#caption-pdf-edit').html(data.caption);
					} else {
						$('#vidshow-edit').attr('src', data.image_path);
						$('#caption-edit-video').html(data.caption);
						//$("#btn-cancel-modal").trigger("click");
					}
 }

			}, error: function (errorresult) {
				endLoading();
				var response = $.parseJSON(errorresult.responseText);
				noteError();
			}, finally: function () {
				endLoading();

			}
		});
	}
	$('#btn_create_image').on('click', function (e) {
		e.preventDefault();
		var formid = $(this).attr("form");
		formid = '#' + formid;
		cancelBtnId = "#btn-cancel-modal-create";
		var formData = $(formid).serialize();
		gformData = formData;

		resumable.opts.query.fdata = gformData;
		resumable.opts.target = $(formid).attr("action");
		resumable.assignBrowse(browseFile[0]);
		showProgress();
		//resumable.query({_token:csrtoken,fdata:gformData});
		//	resumable('query',{_token:csrtoken,fdata:gformData} );
		resumable.upload();

		startLoading();
		ClearErrors();
		//	sendformimg('#'+formid,'image');
	});
//PDF
$('#btn_create_pdf').on('click', function (e) {
	e.preventDefault();
	var formid = $(this).attr("form");
	formid = '#' + formid;
	cancelBtnId = "#btn-cancel-modal-pdf";
	var formData = $(formid).serialize();
	gformData = formData;

	rpdf.opts.query.fdata = gformData;
	rpdf.opts.target = $(formid).attr("action");
	rpdf.assignBrowse(Filepdf[0]);
	showProgress();
	//resumable.query({_token:csrtoken,fdata:gformData});
	//	resumable('query',{_token:csrtoken,fdata:gformData} );
	rpdf.upload();

	startLoading();
	ClearErrors();
	//	sendformimg('#'+formid,'image');
});
	//update
	$('#btn_update_pdf').on('click', function (e) {
		e.preventDefault();
		var formid = $(this).attr("form");
		formid = '#' + formid;
		cancelBtnId = "#btn-cancel-pdf-edit";
		 
		urlact = $(formid).attr("action");
		var urlval = urlact.replace("item_Id", imgId);
		var formData = $(formid).serialize();
		gformData = formData;
		rpdf.assignBrowse(FilepdfEdit[0]);
	 
		rpdf.opts.query.fdata = gformData;
		rpdf.opts.target = urlval;
		showProgress(); 
		rpdf.upload();
		startLoading();
		ClearErrors();
	});

	function sendformimg(formid, formtype) {
		startLoading();
		ClearErrors();
		var formData = $(formid).serialize();
		gformData = formData;
		// var formDatafile = new FormData(formid);
		//	var fileimage= $("#images");

		//	var formDataj=Json.e

		showProgress();
		resumable.upload();// to actually start uploading.

		//	alert( result);
		//alert( fileimage.attr('type'));

		//var form = $(formid)[0];
		//var formData = new FormData(form);
		urlval = $(formid).attr("action");
		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			url: urlval,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			contentType: 'application/json',
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
					if (formtype == 'image') {
						loadgallery(formtype);
						$("#btn-cancel-modal-create").trigger("click");
					} else if (formtype == 'video') {
						loadgallery(formtype);
						$("#btn-cancel-modal-create-video").trigger("click");
					}

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



	function sendform(formid, formtype) {
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
					if (formtype == 'image') {
						loadgallery(formtype);
						$("#btn-cancel-modal-create").trigger("click");
					} else if (formtype == 'video') {
						loadgallery(formtype);
						$("#btn-cancel-modal-create-video").trigger("click");
					}

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

	//update
	$('#btn_update_image').on('click', function (e) {
		e.preventDefault();
		var formid = $(this).attr("form");
		formid = '#' + formid;
		cancelBtnId = "#btn-cancel-modal-edit";
		//browseFile = $('#image');
		urlact = $(formid).attr("action");
		var urlval = urlact.replace("item_Id", imgId);
		var formData = $(formid).serialize();
		gformData = formData;
		resumable.assignBrowse(Fileimgedit[0]);
		//	resumable.assignDrop(Fileimgedit[0]);
		//  resumable.opts.fileType= ['png','image/gif','image/jpeg','image/jpg','image/svg','image/webp'];
		resumable.opts.query.fdata = gformData;
		resumable.opts.target = urlval;


		showProgress();
		//resumable.query({_token:csrtoken,fdata:gformData});
		//	resumable('query',{_token:csrtoken,fdata:gformData} );
		resumable.upload();

		startLoading();
		ClearErrors();
	});
	function updateimage(formid, type) {
		startLoading();
		ClearErrors();
		//var fdata = $( "#create_form" ).serialize();
		var form = $(formid)[0];
		var formData = new FormData(form);
		urlact = $(formid).attr("action");
		urlval = urlact.replace("item_Id", imgId);
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
					loadgallery(type);
					if (type == 'image') {
						$("#btn-cancel-modal-edit").trigger("click");
					} else {
						$("#btn-cancel-modal-edit-video").trigger("click");
					}

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
	///
	//update video

	$('#btn_update_video').on('click', function (e) {
		e.preventDefault();
		var formid = $(this).attr("form");
		formid = '#' + formid;
		cancelBtnId = "#btn-cancel-modal-edit-video";
		//browseFile = $('#image');
		urlact = $(formid).attr("action");
		var urlval = urlact.replace("item_Id", imgId);
		var formData = $(formid).serialize();
		gformData = formData;
		rvideo.assignBrowse(FilevidEdit[0]);
		rvideo.opts.query.fdata = gformData;
		rvideo.opts.target = urlval;
		showProgress();
		rvideo.upload();
		startLoading();
		ClearErrors();

		//updateimage('#'+formid,'video');
	});

	// delete image

	// $('.delete').on('click', function (e) {
	// 	e.preventDefault();	 
	// 	imgId=$(this).attr("id");
	// 	imgId=imgId.replace("del-","");
	// 	delType='image';


	// 	});
 

	$('#btn-modal-del').on('click', function (e) {
		e.preventDefault();

		var formid = $(this).closest('form').attr("id");
		delimgform('#' + formid);

	});

	function delimgform(formid) {
		startLoading();
		ClearErrors();
		//var fdata = $( "#create_form" ).serialize();
		var form = $(formid)[0];
		var formData = new FormData(form);

		urlformval = $(formid).attr("action");
		urlval = urlformval.replace("ItemId", imgId);
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

				loadgallery(delType);
				$("#btn-cancel-modal").trigger("click");
				// $('.alert').html(result.success);
			}, error: function (errorresult) {
				endLoading();
				var response = $.parseJSON(errorresult.responseText);
				// $('#errormsg').html( errorresult );
				noteError();


			}, finally: function () {
				endLoading();

			}
		});
	}
	//
	//load gallery
	function loadgallery(type) {
		urlval = '';
		if (type == 'image') {
			urlval = galimgurl;
		} else if(type == 'pdf'){
			urlval = pdfurl;
		}else {
			urlval = vidurl;
		}


		$.ajax({
			url: urlval,
			type: "GET",

			//	data: formData,
			//	contentType: false,
			//	processData: false,
			//contentType: 'application/json',
			success: function (data) {
				//	alert(data);
				//	endLoading();

				if (data.length == 0) {
					//	noteError();
				} else {
					if (type == 'image') {
						$('#image-gallery-content').html(data);
					}else if(type == 'pdf'){
						$('#pdf-gallery-content').html(data);		
					}	
					else {
						$('#video-gallery-content').html(data);
					}


					//	noteSuccess();

					//	ClearErrors();
				}

			}, error: function (errorresult) {
				//endLoading();
				var response = $.parseJSON(errorresult.responseText);
				//noteError();	
			}, finally: function () {
				//endLoading();

			}
		});
	}


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
	// $("#images").focusout(function (e) {

	// 	if (!validatempty($(this))) {
	// 		return false;
	// 	} else {

	// 		return true;
	// 	}
	// });

	$("#images").on("change", function () {
		resumable.cancel();
		imageChangeForm("#images", "#image_label", "#imgshow");
		//	resumeChangeimg(resumable.files,"#images", "#image_label", "#imgshow");
	});
	$("#image").on("change", function () {
		resumable.cancel();
		imageChangeForm("#image", "#image_label", "#imgshow-edit");
	});
	$("#image-video").on("change", function () {
		rvideo.cancel();
		videoChangeForm("image-video", "video_label", "vidshow");
	});
	$("#image-video-edit").on("change", function () {
		rvideo.cancel();
		videoChangeForm("image-video-edit", "image_label-video-edit", "vidshow-edit");
	});
	//pdf
	$("#pdf-file").on("change", function () {
		rpdf.cancel();
		//videoChangeForm("image-video", "video_label", "vidshow");
	});
	$("#pdf-edit").on("change", function () {
		rpdf.cancel();
		//videoChangeForm("image-video-edit", "image_label-video-edit", "vidshow-edit");
	});

	function imageChangeForm(btn_id, upload_label, imageId) {
		/* Current this object refer to input element */
		var $input = $(btn_id);
		var reader = new FileReader();
		reader.onload = function () {
			$(imageId).attr("src", reader.result);
			//   var filename = $('#photo_edit')[0].files.length ? ('#photo_edit')[0].files[0].name : "";
			var filename = $(btn_id).val().split('\\').pop();
			//$(upload_label).text(filename);
		}

		reader.readAsDataURL($input[0].files[0]);


	}

	function resumeChangeimg(files, btn_id, upload_label, imageId) {
		/* Current this object refer to input element */
		//  var $input = $(btn_id);
		//  var reader = new FileReader();
		//  reader.onload = function () {
		// 	 $(imageId).attr("src", reader.result); 
		// 	 var filename = $(btn_id).val().split('\\').pop();		 
		//  }
		//  reader.readAsDataURL($input[0].files[0]);	 
		//	$(upload_label).text(files[files.length-1].fileName);
		//$(upload_label).text(files[0].fileName);
	}
	function resetForm() {
		jQuery('#create_form')[0].reset();
		$('#image_label').text("Choose File");
		//$('#icon_label').text('اختر ملف SVG');
		$('#imgshow').attr("src", emptyimg);
		$('#imgshow-edit').attr("src", emptyimg);

		//$('#iconshow').attr("src", emptyimg);
	}
	function resetForm(formId) {
		jQuery(formId)[0].reset();
		$('#image_label').text("Choose File");
		$('#video_label').text("Choose File");
		$('#image_label-video-edit').text("Choose File");

		//$('#icon_label').text('اختر ملف SVG');
		$('#imgshow').attr("src", emptyimg);
		$('#imgshow-edit').attr("src", emptyimg);
		$('#vidshow').attr("src", '');
		$('#vidshow-edit').attr("src", '');

		//$('#iconshow').attr("src", emptyimg);
	}
	function videoChangeForm(btn_id, upload_label, videoId) {

		const inputFile = document.getElementById(btn_id);
		const video = document.getElementById(videoId);
		const file = inputFile.files[0];
		const videourl = URL.createObjectURL(file);
		video.setAttribute("src", videourl);
		var filename = $("#" + btn_id).val().split('\\').pop();
		$("#" + upload_label).text(filename);
		//	video.play();

	}




	var browseFile = $('#images');
	var Fileimgedit = $('#image');
	var resumable = new Resumable({
		simultaneousUploads: 1,
		//target:uploadimg,
		//query:{_token:csrtoken} ,// CSRF token
		query: { _token: csrtoken, fdata: gformData },// CSRF token

		fileType: ['png', 'gif', 'jpeg', 'jpg', 'svg', 'webp'],
		chunkSize: 1 * 1024 * 1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
		headers: {
			'Accept': 'application/json'
		},
		testChunks: false,
		throttleProgressCallbacks: 1,
	});

	resumable.assignBrowse(browseFile[0]);
	resumable.assignBrowse(Fileimgedit[0]);
	resumable.on('fileAdded', function (file) { // trigger when file picked
		//alert ('ok');

		// imageChangeForm("#images", "#image_label", "#imgshow");
		// resumeChangeimg(resumable.files,"#images", "#image_label", "#imgshow");
		// var x= resumable.files[0].fileName;
		//   showProgress();
		//   resumable.upload() // to actually start uploading.
	});

	resumable.on('fileProgress', function (file) { // trigger when file progress update
		updateProgress(Math.floor(file.progress() * 100));
	});
	var fcount = 0;
	resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
		fcount++;
		response = JSON.parse(response);
		 
		result = response.id;

		if (fcount >= resumable.files.length) {
			fcount = 0;
			endLoading();
			noteSuccess();
			ClearErrors();
			loadgallery('image');
			$(cancelBtnId).trigger("click");
			hideProgress();
		}
		//	alert(result);
		//  $('#videoPreview').attr('src', response.path);
		//  $('.card-footer').show();
		// alert(response.caption);
	});

	resumable.on('fileError', function (file, response) { // trigger when there is any error
		endLoading();
		noteError();
		hideProgress();
		ClearErrors();
		loadgallery('image');
		$(cancelBtnId).trigger("click");
	});


	let progress = $('.progress');
	function showProgress() {
		progress.find('.progress-bar').css('width', '0%');
		progress.find('.progress-bar').html('0%');
		progress.find('.progress-bar').removeClass('bg-success');
		progress.show();
	}

	function updateProgress(value) {
		progress.find('.progress-bar').css('width', `${value}%`)
		progress.find('.progress-bar').html(`${value}%`)
	}

	function hideProgress() {
		progress.hide();
	}

	//////////
	//video resume
	var Filevid = $('#image-video');
	var FilevidEdit = $('#image-video-edit');
	var rvideo = new Resumable({
		simultaneousUploads: 1,
		maxFiles:1,
		//target:uploadimg,
		//query:{_token:csrtoken} ,// CSRF token
		query: { _token: csrtoken, fdata: gformData },// CSRF token
		fileType: ['mp4', 'mkv', 'm4v', 'mov', 'avi'],
		chunkSize: 1 * 1024 * 1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
		headers: {
			'Accept': 'application/json'
		},
		testChunks: false,
		throttleProgressCallbacks: 1,
	});

	rvideo.assignBrowse(Filevid[0]);
	rvideo.assignBrowse(FilevidEdit[0]);
	rvideo.on('fileAdded', function (file) { // trigger when file picked
	});

	rvideo.on('fileProgress', function (file) { // trigger when file progress update
		updateProgress(Math.floor(file.progress() * 100));
	});

	rvideo.on('fileSuccess', function (file, response) { // trigger when file upload complete
		fcount++;
		response = JSON.parse(response);		 
		//result = response.id;
		endLoading();
		if (fcount >= rvideo.files.length) {
			fcount = 0;			
			noteSuccess();			
			loadgallery('video');
			$(cancelBtnId).trigger("click");
			hideProgress();
		}

	});

	rvideo.on('fileError', function (file, response) { // trigger when there is any error
		endLoading();
		noteError();
		hideProgress();
		ClearErrors();
		loadgallery('video');
		$(cancelBtnId).trigger("click");
	});
/// PDF resume
	//////////
		var Filepdf = $('#pdf-file');
	var FilepdfEdit = $('#pdf-edit');
	var rpdf = new Resumable({
		simultaneousUploads: 1,
		maxFiles:1,
		//target:uploadimg,
		//query:{_token:csrtoken} ,// CSRF token
		query: { _token: csrtoken, fdata: gformData },// CSRF token
		fileType: ['pdf'],
		chunkSize: 1 * 1024 * 1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
		headers: {
			'Accept': 'application/json'
		},
		testChunks: false,
		throttleProgressCallbacks: 1,
	});

	rpdf.assignBrowse(Filepdf[0]);
	rpdf.assignBrowse(FilepdfEdit[0]);
	rpdf.on('fileAdded', function (file) { // trigger when file picked

	});

	rpdf.on('fileProgress', function (file) { // trigger when file progress update
		updateProgress(Math.floor(file.progress() * 100));
	});

	rpdf.on('fileSuccess', function (file, response) { // trigger when file upload complete
		fcount++;
		response = JSON.parse(response);
		 
		//result = response.id;
		endLoading();
		if (fcount >= rpdf.files.length) {
			fcount = 0;
			
			noteSuccess();			
			loadgallery('pdf');
			$(cancelBtnId).trigger("click");
			hideProgress();
		}

	});

	rpdf.on('fileError', function (file, response) { // trigger when there is any error
		endLoading();
		noteError();
		hideProgress();
		ClearErrors();
		loadgallery('pdf');
		$(cancelBtnId).trigger("click");
	});


});
