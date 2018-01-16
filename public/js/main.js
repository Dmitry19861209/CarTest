$(document).on('click', '.delete_service', function () {

  var _this = $(this);
  var url = "/cars/delete-model-service/" + $(this).attr('service_id');

  $.ajax({
    type: 'POST',
    url: url,
    dataType: 'json',
    success: function (data) {
      console.log(1, data)
      _this.parent().remove();
    }
  });
});