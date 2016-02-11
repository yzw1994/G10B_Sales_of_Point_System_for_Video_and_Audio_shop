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


  var accumulate_checked_value = function() {
    var number_of_checked = $( "input[name='checkbox_value']:checked" ).length;
    $( "#choosen_value" ).text( number_of_checked );
  };
  accumulate_checked_value();
  $( "input[type=checkbox]" ).on( "click", accumulate_checked_value );

  $('#delete_cart').click(function(){
    var check_delete_array = [];
    $("#checkbox_value:checked").each(function() {
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

            $("#checkbox_value:checked").each(function() {
          		$(this).closest('#cart_control_outer').remove();
              $( "#choosen_value" ).text(0);
          	});

            if ($('#cart_control_outer').length > 0) {

            }
            else {
              $("<div id='' class='empty_cart_div span_5_of_5'>Your cart is empty!</div>").insertBefore(".cart_control_div");
              $( "#choosen_value" ).text(0);
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




  $('#check_all_checkbox').click(function(event) {
    if(this.checked) {
        $(':checkbox').each(function() {
            this.checked = true;

            var accumulate_checked_value = function() {
              var number_of_checked = $( "input[name='checkbox_value']:checked" ).length;
              $( "#choosen_value" ).text( number_of_checked );
            };
            accumulate_checked_value();
            $( "input[name='selectall']:checked" ).on( "click", accumulate_checked_value );

        });

    }
    else {
      $(':checkbox').each(function() {
          this.checked = false;

          var accumulate_checked_value = function() {
            var number_of_checked = $( "input[name='checkbox_value']:checked" ).length;
            $( "#choosen_value" ).text( number_of_checked );
          };
          accumulate_checked_value();
          $( "input[name='selectall']:checked" ).on( "click", accumulate_checked_value );

      });
    }
  });

  $(".minus_function_char").click(function() {
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    var quantity_value = parseInt($('#product_quantity_value'+id).val());
    var minus_value;
    if(quantity_value == 1){
      minus_value = quantity_value;
      $('#product_quantity_value'+id).val(minus_value);
    }
    else {
      minus_value = quantity_value-1;
      $('#product_quantity_value'+id).val(minus_value);
    }
  });

  $(".plus_function_char").click(function() {
    var id = $(this).attr('id'); // $(this) refers to button that was clicked
    var quantity_value = parseInt($('#product_quantity_value'+id).val());
    var stock_value = parseInt($('#stock_value'+id).val());
    var plus_value;
    if(quantity_value == stock_value){
      plus_value = quantity_value1;
      $('#product_quantity_value'+id).val(plus_value);
    }
    else {
      plus_value = quantity_value+1;
      $('#product_quantity_value'+id).val(plus_value);
    }
  });

  $('#rent_product_btn').click(function() {
    var check_rental_array = [];
    var quantity_value_array = [];
    var sum_total = 0;
    $("#checkbox_value:checked").each(function() {
  		check_rental_array.push($(this).val());
  	});

    for(i=0;i<check_rental_array.length;i++){
      quantity_value_array[i] = parseInt($('#product_quantity_value'+check_rental_array[i]).val());
      sum_total += quantity_value_array[i];
    }

    if(check_rental_array.length>0){
      if(sum_total>user_rent_limit){
        alert("Maximum 5 rental only, you still can have "+user_rent_limit+" rental");
      }
      else {
        $.ajax({
          type: "POST",
          url: "../user/process_cart_rental.php?",
          data: 'cart_id='+check_rental_array+'&rent_quantity='+quantity_value_array,
          success: function(result){
            if(result == "FAIL"){
              alert("Rent fail!");
            }
            else {
              alert("Rent success!");
              location.reload();
            }

          }
        });
      }
    }
    else{
  		alert("Please at least rent 1 item!");
  	}
  });

  $('#buy_product_btn').click(function() {
    var check_buy_array = [];
    var quantity_value_array = [];
    var sum_total = 0;
    $("#checkbox_value:checked").each(function() {
  		check_buy_array.push($(this).val());
  	});

    for(i=0;i<check_buy_array.length;i++){
      quantity_value_array[i] = parseInt($('#product_quantity_value'+check_buy_array[i]).val());
      sum_total += quantity_value_array[i];
    }

    if(check_buy_array.length>0){
      $.ajax({
        type: "POST",
        url: "../user/process_cart_buy.php?",
        data: 'cart_id='+check_buy_array+'&rent_quantity='+quantity_value_array,
        success: function(result){
          if(result == "FAIL"){
            alert("Buy fail!");
          }
          else if(result == "SUCCESS") {
            alert("Buy success!");
            location.reload();
          }

        }
      });
    }
    else{
  		alert("Please at least rent 1 item!");
  	}
  });


  $('#rent_disable').click(function(){
    alert("You have reach the maximum of rental, please return product!")
  });
});
