<?php include('includes/database.php');?>

<?php 
//select query 
    $query = "SELECT * from customer 
                INNER JOIN specs_prescription
                ON  customer.customer_id = specs_prescription.cust_id
                ORDER BY customer_id";

//Get results

$result = $mysqli->query($query) or die($mysqli->error.__LINE__);


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

    <title>Optique India | Dashboard</title>

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
            <li role="presentation" class="active"><a href="index.php">Home</a></li>
            <li role="presentation"><a href="add_customer.php">Add Customer</a></li>
            
          </ul>
        </nav>
        <h3 class="text-muted">Spectacle Prescription</h3>
      </div>

      

      <div class="row marketing">
        <div class="col-lg-12">
            <?php
            if(isset($_GET['msg'])){
                echo '<div style="padding: 3px;background:#f4f4f4;color:green;font-size:16px;">'.$_GET['msg'].'</div>';
            }
            
            ?>
         <h2>Customers</h2>
            <table class="table table-striped">
                <tr>
                    <th>Customer Name</th>
                    <th>Contact Number</th>
                    <th>Email ID</th>
                    <th>Left Eye</th>
                    <th>Right Eye</th>
                    <th></th>
                </tr>
                <?php 
                if($result->num_rows>0){
                    //loop through results while fetching associative arrays into $row
                    while($row = $result->fetch_assoc()){
                        //display info
                        $output = '<tr>';
                        $output .= '<td>'.$row['customer_name'].'</td>';
                         $output .= '<td>'.$row['customer_contact'].'</td>';
                         $output .= '<td>'.$row['customer_email'].'</td>';
                        $output .= '<td>'.$row['left_eye'].'</td>';
                        $output .= '<td>'.$row['right_eye'].'</td>';
                        $output .= '<td><a href="edit_customer.php?id='.$row['customer_id'].'" class="btn btn-default btn-sm">Edit</a></td>';
                        $output .='</tr>';
                        
                        echo $output;
                        
                    }
                
                }
                else{
                    echo "Sorry, no customers were found!";
                }
                ?>
                
            </table>
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
