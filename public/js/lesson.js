$(function(){
  if ($('#start_date').length) {
    $('#start_date').datepicker({
      dateFormat: 'yy-mm-dd'
    });
  }

  $(".take-button").click(function() {
    $(".title").text($('.lesson-name').text());
    $(".date-schedule").text($('.lesson-datetime').text());
    $(".description").text($('.lesson-content').text());
    $(".teacher").text($('.teacher-name').text());
    $(".profile").text($('.introduction').text());
    $('#lessonModal').modal();
  });

  $(".take").click(function() {
    let doneFunc = function (response) {
      alert('You have completed!');
      location.reload();
    };
    let id = $("#lesson-id").val();
    let data = {
      'id': id
    };

    $(this).ajaxRequest(doneFunc, data, '/lesson', 'post')
  })

  $(".cancel").click(function() {
    let doneFunc = function (response) {
      alert('You have canceled!');
      location.reload();
    };
    let id = $("#lesson-id").val();
    let data = {
      'id': id
    };
    $(this).ajaxRequest(doneFunc, data, '/lesson/cancel', 'post')
  })

});