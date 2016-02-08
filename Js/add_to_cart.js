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
  $('#delete_cart').click(function(){
    var check_delete_array = [];
    $("#delete_checkbox_value:checked").each(function() {
  		check_delete_array.push($(this).val());
  	});
    var select_item;
	  select_item = check_delete_array.join(',') + ",";
    if(select_item.length > 1){
      /*$.ajax({
        type: "POST",
        url: "../user/process_delete_cart.php?",
        data: 'user_id='+user_id+'&product_id='+product_id,
        success: function(){
          alert("Add to cart success!");
        }
      });*/
      alert('user_id='+user_id+'&product_id='+check_delete_array);
  	}else{
  		alert("Please at least one of the checkbox");
  	}
	});
});
