jQuery(document).ready(function ($) {
  $('#edit_profile').change(function(){
			$(this).parents('#upload_profile').submit();
	});

    setInterval(function () {
        moveRight();
    }, 5000);

	var slideCount = $('#slider ul li').length;
	var slideWidth = $('#slider ul li').width();
	var slideHeight = $('#slider ul li').height();
	var sliderUlWidth = slideCount * slideWidth;

	$('#slider').css({ width: slideWidth, height: slideHeight });

	$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });

    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 200, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 200, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    });

	$("#menu_function").click(function () {
		$("#menu_content_function").toggle(200);
	});

  $('#show_rent_div_history_btn').click(function(){
    $('#rent_history_div_control').slideDown('slow').delay(1500).show();
    $('#buy_history_div_control').hide();
  });
  $('#show_buy_div_history_btn').click(function(){
    $('#rent_history_div_control').hide();
    $('#buy_history_div_control').slideDown('slow').delay(1500).show();
  });
});
