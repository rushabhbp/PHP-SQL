<?php include('includes/database.php');?>
<?php 
if($_POST){
    $customer_name = $mysqli->real_escape_string($_POST['customer_name']);
    $contact_number = $mysqli->real_escape_string($_POST['contact_number']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $left_eye = $mysqli->real_escape_string($_POST['left_eye']);
    $right_eye = $mysqli->real_escape_string($_POST['right_eye']);
    
    /*INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_contact`, `customer_email`, `customer_add_date`) VALUES (NULL, 'hello', '99', 'rr@g.com', CURRENT_TIMESTAMP);*/
    
    echo "hello".$customer_name,$contact_number;
    $query ="INSERT INTO customer(customer_name,customer_contact,customer_email)
                VALUES ('$customer_name','$contact_number','$email')";
    
    $mysqli->query($query);
    
    //echo "hello".$mysqli->insert_id, $mysqli->insert_customer_name;
    
    /*INSERT INTO `specs_prescription` (`id`, `cust_name`, `cust_id`, `left_eye`, `right_eye`) VALUES ('1', 'Rushabh BangalorePadmanabha', '16', '4', '5');*/
     $query ="INSERT INTO specs_prescription(cust_name,cust_id,left_eye,right_eye)
                VALUES ('$customer_name','$mysqli->insert_id','$left_eye','$right_eye')";
    
    $mysqli->query($query);
    $msg = 'Customer Added';
    header('Location: index.php?msg='.$msg.'');
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

    <title>Optique India | Add Customer</title>

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
            <li role="presentation"class="active"><a href="add_customer.php">Add Customer</a></li>
            
          </ul>
        </nav>
        <h3 class="text-muted">Spectacle Prescription</h3>
      </div>

      

      <div class="row marketing">
        <div class="col-lg-12">
         <h2>Add Customer</h2>
            <form method="post" action="add_customer.php">
                <div class="form-group">
                    <label>Full Name</label>
                    <input name="customer_name" type="text" class="form-control"  placeholder="Full Name">
                </div>
                    <div class="form-group">
                    <label>Contact Number</label>
                <input name="contact_number" type="number" class="form-control"  placeholder="Contact Number">
              </div>
              <div class="form-group">
                <label>Email Address</label>
                <input name="email" type="email" class="form-control"  placeholder="Email">
              </div>
              <div class="form-group">
                <label>Left-Eye</label>
                <input name = "left_eye" type="text" class="form-control"  placeholder="Left Eye Power">
              </div>
                <div class="form-group">
                <label>Left-Eye</label>
                <input name = "right_eye" type="text" class="form-control"  placeholder="Right Eye Power">
              </div>
             
              <input type="submit" class="btn btn-default" value="add customer"/>
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
