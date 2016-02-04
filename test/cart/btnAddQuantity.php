<?php
include('dataconn.php');
$pid=$_REQUEST["pid"];
$sql=mysql_query("select * from product where Product_ID=$pid");
$row=mysql_fetch_assoc($sql);
$totalQ=$row['Product_Quantity'];
if(isset($_POST["add_qty"]))
{



	if(isset($_REQUEST["pid"]))
	{
		if($_POST['qty']<=$totalQ)
		{
			$product_id=$_REQUEST["pid"];
			$qty=$_POST["qty"];
		
			$_SESSION['cart'][$product_id]=$qty;
		}
	if($_POST['qty']<=0)
		{
				$product_id=$_REQUEST["pid"];
		
				$qty=	$_SESSION['cart'][$product_id];
				$_SESSION['cart'][$product_id]=1;
		?>
		
			<script>
			alert("qty can't be less than 0");
			</script>
		<?php
		}
		if($_POST['qty']>$totalQ)
		{
		
					$product_id=$_REQUEST["pid"];
					$qty=$_POST["qty"];
		
					$_SESSION['cart'][$product_id]=$qty;
					?>	
				<script>
				alert('Out Of Stock we only have left <?php echo $totalQ;?> products');
				</script>
					<?php
		}
	}
	
	}
	echo "<script>
	   self.location='payment.php';
	  </script>";
