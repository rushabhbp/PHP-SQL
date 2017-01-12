<?php include('includes/database.php');?>
<?php
$id = $_GET['id'];

$query = "SELECT * FROM customer
            INNER JOIN specs_prescription
            ON  customer.customer_id = specs_prescription.cust_id
            WHERE customer.customer_id = $id";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
if($result==$mysqli->query($query)){
    while($row = $result->fetch_assoc()){
        $name = $row['customer_name'];
        $contact = $row['customer_contact'];
        $email = $row['customer_email'];
        $left_eye= $row['left_eye'];
        $right_eye = $row['right_eye'];
    }
    
    $result->close();
    
}  ?>

<?php 
if($_POST){
    $id = $_GET['id'];
    $customer_name = $mysqli->real_escape_string($_POST['customer_name']);
    $contact_number = $mysqli->real_escape_string($_POST['contact_number']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $left_eye = $mysqli->real_escape_string($_POST['left_eye']);
    $right_eye = $mysqli->real_escape_string($_POST['right_eye']);
    
    
    $query = "UPDATE customer
                SET
                customer_name = '$customer_name',
                customer_contact=$contact_number,
                customer_email = '$email'                
                WHERE customer_id = $id";
    $mysqli->query($query) or die();
     
   
    $query = "UPDATE specs_prescription
                SET
                left_eye = $left_eye,
                right_eye = $right_eye
                WHERE cust_id = $id";
    $mysqli->query($query) or die();
    
    $msg = "Customer Updated";
    header('Location:index.php?msg='.$msg.'');
   
    exit();
}
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>Optique India | Edit Customer</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
   <!-- <script type="text/javascript" src="http://gc.kis.scr.kaspersky-labs.com/F5B67E1A-9535-FF42-AB56-D6837D56EEF3/main.js" charset="UTF-8"></script><script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->

    
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" ><a href="index.php">Home</a></li>
            
              <li role="presentation"class="active"><a href="edit_customer.php">Edit Customer</a></li>
            
          </ul>
        </nav>
        <h3 class="text-muted">Spectacle Prescription</h3>
      </div>

      

      <div class="row marketing">
        <div class="col-lg-12">
         <h2>Edit Customer</h2>
            <form method="post" action="edit_customer.php?id=<?php echo $id?>">
                <div class="form-group">
                    <label>Full Name</label>
                    <input name="customer_name" type="text" class="form-control" value="<?php echo $name;?>" placeholder="Full Name">
                </div>
                    <div class="form-group">
                    <label>Contact Number</label>
                <input name="contact_number" type="number" class="form-control" value="<?php echo $contact;?>"   placeholder="Contact Number">
              </div>
              <div class="form-group">
                <label>Email Address</label>
                <input name="email" type="email" class="form-control" value="<?php echo $email;?>"   placeholder="Email">
              </div>
              <div class="form-group">
                <label>Left-Eye</label>
                <input name = "left_eye" type="text" class="form-control"  value="<?php echo $left_eye;?>" placeholder="Left Eye Power">
              </div>
                <div class="form-group">
                <label>Right-Eye</label>
                <input name = "right_eye" type="text" class="form-control"  value="<?php echo $right_eye;?>" placeholder="Right Eye Power">
              </div>
             
              <input type="submit" class="btn btn-default" value="Update customer"/>
            </form>
        </div>

       
      </div>

      <footer class="footer">
        <p>&copy; 2016 Company, Inc.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
