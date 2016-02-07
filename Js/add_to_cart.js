jQuery(document).ready(function ($) {
  $('#add_to_cart_function').click(function(){
    var datastring = 'user_id='+ user_id + '&product_id=' + product_id;
    $.ajax({
      type: "POST",
      url: "../user/process_add_to_cart.php?",
      data: 'user_id='+user_id+'&product_id='+product_id,
      success: function(){
        alert("Add to cart success!");
      }
    });
	});
});
