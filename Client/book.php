<?php
  session_start();
  $med_isbn = $_GET['bookisbn'];
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT * FROM meds WHERE med_isbn = '$med_isbn'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "No medicine data available";
    exit;
  }

  $title = $row['med_title'];
  require "./template/header.php";
?>
      <!-- Example row of columns -->
      <p class="lead" style="margin: 25px 0"><a href="books.php">Medical store DB</a> > <?php echo $row['med_title']; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['med_image']; ?>">
        </div>
        <div class="col-md-6">
          <h4>Medicine Description</h4>
          <p><?php echo $row['med_descr']; ?></p>
          <h4>Medicine Details</h4>
          <table class="table">
          	<?php foreach($row as $key => $value){
              if($key == "med_descr" || $key == "med_image" || $key == "publisherid" || $key == "med_title"){
                continue;
              }
              switch($key){
                case "med_isbn":
                  $key = "Medicine ID";
                  break;
                case "med_title":
                  $key = "med_title";
                  break;
                case "med_dom":
                  $key = "DOM";
                  break;
                case "med_price":
                  $key = "Price of Medicine";
                  break;
              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
          </table>
          <form method="post" action="cart.php">
            <input type="hidden" name="bookisbn" value="<?php echo $med_isbn;?>">
            <input type="submit" value="Purchase / Add to cart" name="cart" class="btn btn-primary">
          </form>
       	</div>
      </div>
<?php
  require "./template/footer.php";
?>