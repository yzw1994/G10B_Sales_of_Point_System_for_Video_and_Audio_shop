<?php
include("../dataconn/dataconn.php");
$check_login_url = "";
if(isset($_SESSION['user_id']) && $_SESSION['user_id']) {
  $user_id = $_SESSION['user_id'];
  $check_login_url = "../utility/product_page_login.php?u_id=".$user_id;
  $login_product="product_page_login.php";
} else {
  $check_login_url = "../visitor/login.php";
  $login_product="product_page.php";
}
$product_sql = "select * from product";
$product_exe = mysql_query($product_sql);
$product_row = mysql_num_rows($product_exe);
$product_image = "";
?>
<div id="slider">
  <a href="#" class="control_next">>></a>
  <a href="#" class="control_prev"><</a>
      <ul>
        <?php
        while($product_row = mysql_fetch_array($product_exe)){
          echo "
            <li>
              <a href='../utility/".$login_product."?product_id=".$product_id = $product_row['Product_ID']."' target='_blank'>
                <img src='".$product_image = $product_row['Product_Pic']."' title='".$product_name = $product_row['Product_Name']."' alt='".$product_name = $product_row['Product_Name']."'/>
              </a>
            </li>
          ";
        };
        ?>
      </ul>
</div>
