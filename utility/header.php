<!DOCTYPE html>
<head>

	<script>
				$('#searchfrm').keydown(function() {
					var key = e.which;
						if (key == 13) {
						// As ASCII code for ENTER key is "13"
						$('#searchfrm').submit(); // Submit form code
						}
				});
	</script>
	<script src="submit_on_enter.js" type="text/javascript"></script>

</head>
	<body>
		<div id="" class="logo_div section group">
				<div id="" class="col span_1_of_3">
				<a href="../visitor/visitor.php" id="" class="logo_link" id="">
					<img src="../images/logo.ico" alt="Blu Video and Audio Shop" id="" class="logo_images"/>
					<p id="" class="shop_name">Blu Video And Audio Shop</p>
				</a>
				</div>
				<div id="" class="search_div col span_1_of_3">
					<p>
							<form name="searchfrm" method="post" action="search_result.php">
								<input type="submit" name="search" id="" class="search_bar" placeholder="Search..."/>
							</form>

							<!--
							function searching() {
		            var keywordsStr = document.getElementById('keywords').value;
		            var cmd ="http://XXX/advancedsearch_result.asp?language=ENG&+"+ encodeURI(keywordsStr) + "&x=11&y=4";
		            window.location = cmd;
		        }

		    <form name="form1" method="get">
		             <input name="keywords" type="text" id="keywords" size="50" >
		             <input type="submit" name="btn_search" id="btn_search" value="Search"
								 onClick="javascript:searching(); return false;" onKeyPress="javascript:searching(); return false;">
		             <input type="reset" name="btn_reset" id="btn_reset" value="Reset">
		    </form>-->
					</p>
				</div>
				<div id="" class="col span_1_of_3 btn_group">
					<p>
					<a href="../visitor/register.php" id="" class="btn reg_btn"/>REGISTER</a>
					<a href="../visitor/login.php" id="" class="btn log_btn"/>LOGIN</a>
					</p>
				</div>

			</div>
		</body>
	</html>
