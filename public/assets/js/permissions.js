$(document).ready(function () {
  // $('.table').DataTable();

  $(".permissions-data").each(function () {
    var element = $(this);
    var spinner = '<div class="spinner-border text-center m-4" role="status">';
        spinner += '<span class="visually-hidden">Loading...</span>';
        spinner += '</div>';
    $.ajax({
      url: '/role-permissions/r',
      type: 'get',
      data: { id: $(this).attr("id") },
      beforeSend: function () {
        element.html(spinner);
      },
      success: function (html) {
        element.html(html);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        alert(thrownError);
      }
    });
  });
});
