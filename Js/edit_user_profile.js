jQuery(document).ready(function ($) {
  //user phone edit
  $('#edit_user_name_btn').click(function(){
    $('#user_name_control').hide();
    $('#edit_user_name_input').show();
    $(this).hide();
    $("#cancel_user_name_btn").show();
    $("#save_user_name_btn").show();
  });

  $('#cancel_user_name_btn').click(function(){
    $('#user_name_control').show();
    $('#edit_user_name_input').hide();
    $(this).hide();
    $("#save_user_name_btn").hide();
    $('#edit_user_name_btn').show();
  });

  $("#save_user_name_btn").click(function(){
    $('#cancel_user_name_btn').hide();
    $('#edit_user_name_input').hide();
    $('#edit_user_name_btn').show();
    var name = $('#edit_user_name_input').val();
    $(this).hide();
    $.ajax({
      type: "POST",
      url: "../user/process_edit_name.php?",
      data: 'name='+name,
      success: function(response){
        $('#user_name_control').show();
        $('#user_name_control').html(response);
      }
    });

  });
  //user name edit
  //user phone edit
  $('#edit_user_phone_btn').click(function(){
    $('#user_phone_control').hide();
    $('#edit_user_phone_input').show();
    $(this).hide();
    $("#cancel_user_phone_btn").show();
    $("#save_user_phone_btn").show();
  });

  $('#cancel_user_phone_btn').click(function(){
    $('#user_phone_control').show();
    $('#edit_user_phone_input').hide();
    $(this).hide();
    $("#save_user_phone_btn").hide();
    $('#edit_user_phone_btn').show();
  });

  $("#save_user_phone_btn").click(function(){
    $('#cancel_user_phone_btn').hide();
    $('#edit_user_phone_input').hide();
    $('#edit_user_phone_btn').show();
    var phone = $('#edit_user_phone_input').val();
    $(this).hide();
    $.ajax({
      type: "POST",
      url: "../user/process_edit_phone.php?",
      data: 'phone='+phone,
      success: function(response){
        $('#user_phone_control').show();
        $('#user_phone_control').html(response);
      }
    });

  });
  //user phone edit
  //user address edit
  $('#edit_user_address_btn').click(function(){
    $('#user_address_control').hide();
    $('#edit_user_address_input').show();
    $(this).hide();
    $("#cancel_user_address_btn").show();
    $("#save_user_address_btn").show();
  });

  $('#cancel_user_address_btn').click(function(){
    $('#user_address_control').show();
    $('#edit_user_address_input').hide();
    $(this).hide();
    $("#save_user_address_btn").hide();
    $('#edit_user_address_btn').show();
  });

  $("#save_user_address_btn").click(function(){
    $('#cancel_user_address_btn').hide();
    $('#edit_user_address_input').hide();
    $('#edit_user_address_btn').show();
    var address = $('#edit_user_address_input').val();
    $(this).hide();
    $.ajax({
      type: "POST",
      url: "../user/process_edit_address.php?",
      data: 'address='+address,
      success: function(response){
        $('#user_address_control').show();
        $('#user_address_control').html(response);
      }
    });

  });
  //user address edit
  //user date edit
  $('#edit_user_date_btn').click(function(){
    $('#user_date_control').hide();
    $('#edit_user_date_input').show();
    $(this).hide();
    $("#cancel_user_date_btn").show();
    $("#save_user_date_btn").show();
  });

  $('#cancel_user_date_btn').click(function(){
    $('#user_date_control').show();
    $('#edit_user_date_input').hide();
    $(this).hide();
    $("#save_user_date_btn").hide();
    $('#edit_user_date_btn').show();
  });

  $("#save_user_date_btn").click(function(){
    $('#cancel_user_date_btn').hide();
    $('#edit_user_date_input').hide();
    $('#edit_user_date_btn').show();
    var date = $('#edit_user_date_input').val();
    $(this).hide();
    $.ajax({
      type: "POST",
      url: "../user/process_edit_date.php?",
      data: 'date='+date,
      success: function(response){
        $('#user_date_control').show();
        $('#user_date_control').html(response);
      }
    });

  });
  //user date edit
});
