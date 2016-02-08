jQuery(document).ready(function ($) {
  $('#add_to_cart_function').click(function(){
    var datastring = 'user_id='+ user_id + '&product_id=' + product_id;
    $.ajax({
      type: "POST",
      url: "../user/process_add_to_cart.php?",
      data: 'user_id='+user_id+'&product_id='+product_id,
      success: function(result){
        if(result == "SUCCESS"){
          alert("Add to cart success!");
        }
        else if(result == "EXIST") {
          alert("Product is already in your cart!");
        }
        else if(result == "FAIL") {
          alert("Add to cart fail!");
        }

      }
    });
	});
  $('#delete_cart').click(function(){
    var check_delete_array = [];
    $("#delete_checkbox_value:checked").each(function() {
  		check_delete_array.push($(this).val());
  	});
    var select_item;
	  select_item = check_delete_array.join(',') + ",";
    if(select_item.length > 1){
      $.ajax({
        type: "POST",
        url: "../user/process_delete_cart.php?",
        data: 'cart_id='+check_delete_array,
        success: function(result){
          if(result == "SUCCESS"){
            alert(" success!");



            $("#delete_checkbox_value:checked").each(function() {
          		$(this).closest('#cart_control_outer').remove();

          	});

            if ($('#cart_control_outer').length > 0) {

            }
            else {
              $("<div id='' class='empty_cart_div span_5_of_5'>Your cart is empty!</div>").insertBefore(".cart_control_div");
            }
          }
          else if(result == "FAIL") {
            alert(" fail!");
          }

        }
      });
  	}else{
  		alert("Please at least one of the checkbox");
  	}
	});
});
