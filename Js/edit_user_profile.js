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

    var name = $('#edit_user_name_input').val();
    if(name != ""){
      $('#cancel_user_name_btn').hide();
      $('#edit_user_name_input').hide();
      $('#edit_user_name_btn').show();
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
    }
    else if(name == ""){
      alert("Please enter value!");
    }

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
    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    var phone = $('#edit_user_phone_input').val();
    if(phone != ""){
      if(filter.test(phone)){
        $('#cancel_user_phone_btn').hide();
        $('#edit_user_phone_input').hide();
        $('#edit_user_phone_btn').show();
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
      }
      else {
        alert("Please enter a valid value!");
      }
    }
    else if(phone == ""){
      alert("Please enter the value!")
    }


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

    var address = $('#edit_user_address_input').val();
    if(address != ""){
      $('#cancel_user_address_btn').hide();
      $('#edit_user_address_input').hide();
      $('#edit_user_address_btn').show();
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
    }
    else if(address == ""){
      alert("Please enter value!");
    }


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
    var tdate = new Date();
    var dd = tdate.getDate(); //yields day
    var formatedTwoLastDigits;
    var MM = tdate.getMonth(); //yields month
    if (MM <10 ) {
        formatedTwoLastDigits = "0" + (MM+1);
    } else {
        formatedTwoLastDigits = "" + (MM+1);
    }
    var yyyy = tdate.getFullYear(); //yields year
    var xxx = yyyy + "-" +( formatedTwoLastDigits)+ "-" + dd;
    var dobdate = $('#edit_user_date_input').val();
    if(dobdate != ""){
        if(dobdate!=xxx && dobdate<xxx){
          $('#cancel_user_date_btn').hide();
          $('#edit_user_date_input').hide();
          $('#edit_user_date_btn').show();
          $(this).hide();

          $.ajax({
            type: "POST",
            url: "../user/process_edit_date.php?",
            data: 'date='+dobdate,
            success: function(response){
              $('#user_date_control').show();
              $('#user_date_control').html(response);
            }
          });
        }
        else if(dobdate==xxx){
          alert("Birthday cannot be today!");
        }
        else if(dobdate>xxx){
          alert("Birthday cannot be greater than today!");
        }


    }
    else if(dobdate == ""){
      alert("Please enter value!");
    }


  });
  //user date edit
});
