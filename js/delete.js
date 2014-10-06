$(function() {
  $('.alert').hide();
	$('.btn-danger').click(function() {
  if (confirm("Are you sure?") == true) {
    var id = $(this).attr("value");
    var dataString = 'id='+ id;
    var h = '.t' + id;
    $.ajax({
      type: "POST",
      url: "src/delete.php",
      data: dataString,
       dataType: 'text',
      success: function(response) {
        $(h).hide();
        $(".alert").show();
        $(".btn").button('reset');
      }
    });
    return false;
  }
  });
});