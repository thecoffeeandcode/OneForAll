<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
if(isset($_POST['btn_sub'])){
	$cusname=$_POST['cusname'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$zip_code=$_POST['zip_code'];
	$country=$_POST['country'];
	

$sql_ins=mysqli_query($dbhandle, "INSERT INTO `customers`(`customerid`, `name`, `address`, `city`, `zip_code`, `country`) 
                            VALUES (
                                NULL,
                                '$cusname',
                                '$address',
                                '$city',
                                '$zip_code',
                                '$country'
							)
					");
if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysqli_error();
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$cusname=$_POST['cusname'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$zip_code=$_POST['zip_code'];
	$country=$_POST['country'];
	
	$sql_update=mysqli_query($dbhandle, "UPDATE customers SET 
								name='$cusname',
								address='$address',
								city='$city',
								zip_code='$zip_code',
								country='$country',
							WHERE
                                customerid='$id'
							");
	if($sql_update==true)
		echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Record Updated Successfully... !"
                . "</span>"
                . "</div>";
	else
		$msg="Update Failed...!";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>

<?php

if($opr=="upd")
{
	$sql_upd=mysqli_query($dbhandle, "SELECT * FROM customers WHERE customerid='$id'");
	$rs_upd=mysqli_fetch_array($sql_upd);
	
?>

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-hdd"></span> Customer Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll update the customer's detail to record into database.</p>
			</div>

<div class="container_form">
    <form method="post">
        <div class='faculty_pos'>

		    <input type="text" style="width: 250px;" class="form-control" name="cusname" placeholder='Name' value="<?php echo $rs_upd['name'];?>"/><br>
			<input type="text" style="width: 250px;" class="form-control" name="address" placeholder='address' value="<?php echo $rs_upd['address'];?>"/><br>
			<input type="text" style="width: 250px;" class="form-control" name="city" placeholder='city' value="<?php echo $rs_upd['city'];?>"/><br>
			<input type="text" style="width: 250px;" class="form-control" name="zip_code" placeholder='zip_code' value="<?php echo $rs_upd['zip_code'];?>"/><br>
			<input type="text" style="width: 250px;" class="form-control" name="country" placeholder='country' value="<?php echo $rs_upd['country'];?>"/><br>
        
            <input type="submit" name="btn_upd" href="#" class="btn btn-primary btn-large" value="Register" />&nbsp;&nbsp;&nbsp;
	    <input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
        </div>
    </form>
</div>

<?php	
}
else
{
?>
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-hdd"></span> Suppliers Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll add new supplier's detail to record into database.</p>
			</div>


<div class="container_form">
    <form method="post">
        <div class='faculty_pos'>
        
            <input type="text" style="width: 250px;" class="form-control" name="cusname" placeholder='name'/><br>
			<input type="text" style="width: 250px;" class="form-control" name="address" placeholder='address'/><br>
			<input type="text" style="width: 250px;" class="form-control" name="city" placeholder='city'/><br>
			<input type="text" style="width: 250px;" class="form-control" name="zip_code" placeholder='zip_code'/><br>
			<input type="text" style="width: 250px;" class="form-control" name="country" placeholder='country'/><br>
        
            <input type="submit" name="btn_sub" href="#" class="btn btn-primary btn-large" value="Register" />&nbsp;&nbsp;&nbsp;
	    <input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
        </div>
    </form>
</div><!-- end of style_informatios -->

<?php
}
?>
</body>
</html>