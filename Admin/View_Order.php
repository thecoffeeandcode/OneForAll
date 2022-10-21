<!--for delete Record -->
<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysqli_query($dbhandle, "DELETE FROM orders WHERE orderid='$id'");
	if($del_sql)
		$msg="<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "1 Record Deleted... !"
                . "</span>"
                . "</div>";
	
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
        
            </div>
        </form>
    </div><br><br>
            
            
<div class="table_margin">
<table class="table table-bordered">
        <thead>
            <tr>
            <th style="text-align: center;">No.</th>
            <th style="text-align: center;">Order ID</th>
            <th style="text-align: center;">Customer ID</th>
            <th style="text-align: center;">Amount</th>
            <th style="text-align: center;">Date</th>
            <th style="text-align: center;">Ship Name</th>
            <th style="text-align: center;">Ship Address</th>
            <th style="text-align: center;">Ship City</th>
            <th style="text-align: center;">Ship Zip Code</th>
            <th style="text-align: center;">Ship Country</th>
        </tr>
        
        <?php
	$key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysqli_query($dbhandle, "SELECT * FROM orders WHERE orderid  like '%$key%' or customerid like '%$key%' or ship_city like '%$key%' or ship_name like '%$key%'");
	else
		 $sql_sel=mysqli_query($dbhandle, "SELECT * FROM `orders` ORDER BY customerid");
	
		
       
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;
    ?>
      <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row['orderid'];?></td>
            <td><?php echo $row['customerid'];?></td>
            <td><?php echo $row['amount'];?></td>
            <td><?php echo $row['date'];?></td>
            <td><?php echo $row['ship_name'];?></td>
            <td><?php echo $row['ship_address'];?></td>
            <td><?php echo $row['ship_city'];?></td>
            <td><?php echo $row['ship_zip_code'];?></td>
            <td><?php echo $row['ship_country'];?></td>
            
            <td><a href="?tag=view_order&opr=del&rs_id=<?php echo $row['customerid'];?>" title="Delete"><img style="-webkit-box-shadow: 0px 0px 0px 0px rgba(50, 50, 50, 0.75);-moz-box-shadow:    0px 0px 0px 0px rgba(50, 50, 50, 0.75);box-shadow:         0px 0px 0px 0px rgba(50, 50, 50, 0.75);" src="picture/delete.jpg" height="20" alt="Delete" /></a></td>
             
        </tr>
    <?php	
    }
	// ----- for search studnens------	
		
	
    ?>
    </table>
</form>
</div>
</body>
</html>
