$(function() {
  $('.error').hide();
  $('.alert').hide();
  $('#back').hide();
  $("#submit_btn").click(function() {
    // validate and process form here
    b = true;
    $(".form-group").removeClass("has-error");
    $('.error').hide();
    $('.alert').hide();
	  var ticket = $("input#ticket").val();
		if (ticket == "") {
      $("label#ticket_error").show();
      $("input#ticket").focus();
      $("#ticket_control").addClass("has-error");
      b = false;
    }
		var name = $("input#name").val();
		if (name == "") {
      $("label#name_error").show();
      $("input#name").focus();
      $("#name_control").addClass("has-error");
      b = false;
    }
     var pass = $("input#pass").val();
    if (pass == "") {
      $("label#pass_error").show();
      $("input#pass").focus();
      $("#pass_control").addClass("has-error");
      b = false;
    }
		var bag = $("#bag").val();
		if (bag == "") {
      $("label#bag_error").show();
      $("input#bag").focus();
      $("#bag_control").addClass("has-error");
      b = false;
    }

    if(!b) {
      return false;
    }
     var id = $("#id").val();
     var dataString = 'id=' + id + '&name='+ ticket + '&code=' + name + '&link=' + pass + '&file=' + bag;
  //alert (dataString);return false;
  $.ajax({
    type: "POST",
    url: "src/aedit.php",
    data: dataString,
     beforeSend: function () {
                        $("#submit_btn").button('loading').fadeIn(1500);
                },

    success: function(response) {
      if(response == 1) {
        $('.alert-success').html("Airline sucessfully updated");
        $('.alert-success').show();
        $('#contact_form').hide();
        $('#back').show();
      } else {
        $('#danger').html("The ariline code already exists");
        $('.alert-danger').show();
        $("#submit_btn").button('reset');
      }
      
    }
  });
  return false
  });





});