<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysqli_query($dbhandle, "DELETE FROM Supplier WHERE supplierid=$id");
	if($del_sql)
		$msg="1 Record Deleted... !";
	else
		$msg="Could not Delete :".mysqli_error();	
			
}
	echo $msg;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
</head>

<body>
<div class="btn_pos">
        <form method="post">
            <input type="text" name="searchtxt" class="input_box_pos form-control" placeholder="Search" />
            <div class="btn_pos_search">
            <input type="submit" class="btn btn-primary btn-large" name="btnsearch" value="Search"/>&nbsp;&nbsp;
            <a href="?tag=supplier_entry"><input type="button" class="btn btn-large btn-primary" value="Register new" name="butAdd"/></a>
            </div>
        </form>
    </div><br><br>

<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Supplier ID</th>
            <th style="text-align: center;" width="250px">Supplier Name</th>
            <th style="text-align: center;" colspan="2">Operation</th>
      	    </tr>
        </thead>    
        
         <?php
		 $key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysqli_query($dbhandle, "SELECT * FROM Supplier WHERE Supplierid  like '%$key%' or supplier_name like '%$key%' ");
	else
    		$sql_sel=mysqli_query($dbhandle, "SELECT * FROM Supplier");
			
			
			$i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;
    	?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row['publisherid'];?></td>
            <td><?php echo $row['publisher_name'];?></td>
            <td align="center"><a href="?tag=supplier_entry&opr=upd&rs_id=<?php echo $row['publisherid'];?>" title="Upate"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/update.png" height="20" alt="Update" /></a></td>
            <td align="center"><a href="?tag=view_supplier&opr=del&rs_id=<?php echo $row['publisherid'];?>" title="Delete"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/delete.jpg" height="20" alt="Delete" /></a></td>
        </tr>
    <?php	
    }
    ?>
   	</table>
</div><!--end of content_input -->
</body>
</html>