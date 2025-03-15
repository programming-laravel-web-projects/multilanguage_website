$(document).ready(function () {
  $('#btn-send').on('click', function (e) {
    e.preventDefault();
    var formid = $(this).attr("form");
    formid = '#' + formid;
    let thisForm = $(formid);
    $('.loading').addClass('d-block');
    $('.error-message').removeClass('d-block');
    $('.sent-message').removeClass('d-block');
    sendform(thisForm);
  });
  function sendform(thisForm) {
    $('.error-message').removeClass('d-block');
    $('.sent-message').removeClass('d-block');
    var form = thisForm[0];
    var formData = new FormData(form);
    var urlval = thisForm.attr("action");
    $.ajax({
      url: urlval,
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (data) {
        $('.loading').removeClass('d-block');
        if (data.length == 0) {
          displayError(thisForm);
        } else if (data == "OK") {
          $('.sent-message').addClass('d-block');
          jQuery(thisForm)[0].reset();
        }
      }, error: function (errorresult) {
        $('.loading').removeClass('d-block');
        displayError(thisForm);
      }, finally: function () {
        $('.loading').removeClass('d-block');
      }
    });
  }
  function displayError(thisForm) {
    $('.loading').removeClass('d-block');
    $('.error-message').addClass('d-block');
  }
});
