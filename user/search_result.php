<?php
    include("../dataconn/dataconn.php");


    if(!isset($_SESSION))
    {
      session_start();
    }
    $user_id = $_SESSION['user_id'];

    require("../dataconn/page_load.php")

    if(isset($_POST["search"]))
    {
      $search_text = $_POST["Prodcut_Name"];
      $search_result = mysql_query("SELECT * FROM product WHERE Product_Name like '%$search_text%'");
      $row = mysql_fetch_assoc($search_result);
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search_result</title>
	<link rel="icon" href="images/favicon.png" type="image/x-icon" sizes="16x16">
	<link href="../css/main.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/font/elegantlux/elegant_luxmager.css" type="text/css" charset="utf-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/jquery-2.2.0.js"></script>
	<script src="../js/main.js"></script>

</head>
<body>
  <?php
    if($row!=0)
    {
  ?>

    <table border="1px">
      <tr>
        <th>Name</th>
        <th>Descriprtion</th>
        <th>Picture/th>
        <th>Type</th>
        <th>Category</th>
      </tr>
      <tr>
          <td><?php echo $row["Product_Name"]; ?></td>
          <td><?php echo $row["Product_Description"]; ?></td>
          <td><?php echo $row["Product_Pic"]; ?></td>
          <td><?php echo $row["Product_Type"]; ?></td>
          <td><?php echo $row["Product_Category"]; ?></td>
      </tr>
    </table>
    }
    <?php
      }
      else
      {
        echo "No records found";
      }
}
?>
	<div class="cont section group">

		<?php include("../utility/user_header.php");?>
		<?php include("../utility/navigation.php");?>
		<div class="cont_element col span_2_of_2 slider_div">
		<!--<?php include("../utility/slider.php");?>-->
		</div>
		<div class="cont_element col span_1_of_2 pro_char">
			<?php include("../utility/leftprod.php");?>
		</div>
		<div class="cont_element col span_1_of_2 pro_char">
			<?php include("../utility/rightprod.php");?>
		</div>
		<?php include("../utility/footer.php");?>

	</div>
</body>
</html>