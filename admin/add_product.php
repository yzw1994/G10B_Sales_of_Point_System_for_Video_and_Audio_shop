<?php
	require_once('../dataconn/dataconn.php');
	$user_id = $_REQUEST['user_id'];


			$prodname = $_REQUEST["pname"];
			$proddes = $_REQUEST['pdesc'];
			$prodcat = $_REQUEST['pcat'];
			$prodpri=$_REQUEST['pprice'];
			$prodrentpri=$_REQUEST['prent'];
			$prodstoc=$_REQUEST['pstoc'];
	    $proddate=$_REQUEST['pdate'];
			$prodstatus=$_REQUEST['pstat'];
	    //$pic_name=$_REQUEST['pic_name'];
	    //echo $pic_name;



			$temp = explode(".",$_FILES["pic_name"]["name"]);
			$newfilename = $user_id . '.' .end($temp);
			move_uploaded_file($_FILES["pic_name"]["tmp_name"],"../images/product/" . $user_id . "U" . $_FILES["pic_name"]["name"]);

			$target_file="../images/product/" . $user_id . "U" . $_FILES["pic_name"]["name"];





	    $sql = "INSERT into product (Product_Pic,Product_Name,Product_Description,Product_Category,Product_Price,Product_Rent_Price,Product_Stock,Product_Date,Product_Status) values
			('$target_file','$prodname','$proddes','$prodcat','$prodpri','$prodrentpri','$prodstoc','$proddate','$prodstatus')";
			$result = mysql_query($sql);
	    if($result) {
	      echo "query successful";
	    }
	    else{
	      echo "query failed";
	    }


			 header("Location:admin_prodList.php");


?>
