<html lang="en"><head>
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">    <!--favicon-->
    <title>MonkaS. Restaurant</title>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="css/style.css" rel="stylesheet" type="text/css">     <!--style.css document-->
      <link href="css/font-awesome.min.css" rel="stylesheet">     <!--font-awesome-->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">  <!--bootstrap-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  <!--googleapis jquery-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  <!--font-awesome-->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>                          <!--bootstrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>           <!--bootstrap-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>            <!--bootstrap-->
    <style>
    .flex-column { 
           max-width : 260px;
       }
               
    .container {
                background: #f9f9f9;
            }
          
    .img {
                margin: 5px;
            }
    
    .logo img{
         width:150px;
         height:250px;
        margin-top:90px;
        margin-bottom:40px;
    }
    </style></head>
    
    
    <body>

    <?php
        session_start();
        $dbhost="localhost";
        $dbuser="root";
        $dbpass="";
        $db="project";
        $conn=new mysqli($dbhost,$dbuser,$dbpass,$db);
        
        if(isset($_POST['reserv-submit'])){
            $name = $_POST['fname'];
            $date = $_POST['date'];
            $guests = $_POST['num_guests'];
            $telephone = $_POST['tele'];
            $res_random= rand(1,3000);
            $_SESSION['RI'] = $res_random;
            $userid=$_SESSION['id'] ;

            $sqll = "INSERT INTO reservation (RID ,name,date,guests,phone) VALUES (' $res_random' ,'$name','$date','$guests','$telephone')";
            $resultr = mysqli_query($conn,$sqll);
           
            if($resultr){
                $sqll2 ="INSERT INTO reservationid (IDU,IDR) VALUES ('$userid','$res_random')";
                $resultr2 = mysqli_query($conn,$sqll2);
            } else{
             echo '<script type="text/javascript"> alert("Error")</script>';
            }
        
        }
        

           

        if(isset($_POST['logout-submit'])){
         header('location:index.php');
        }

        ?>
     <!---navbar--->   
   <!---navbar--->   
<nav class="navbar navbar-expand-md navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="">
		<strong><em>The 3 Sugars</em></strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navi">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navi" class='btn btn-danger'>
                
        
                    <form  method="post"action="veiw.php">
                    <button  type="submit" name="new-res" class="btn btn-outline">New Reservation</button>
                    </form> 
                    
                    <form  method="post"action="veiw.php">
                    <button type="submit" name=" view-res"  class="btn btn-outline" style='margin-left:20px;'>View Reservations</button>
                    </form> 
        
                  
                    <form class="navbar-form navbar-right" method="post">
                    <button type="submit" name="logout-submit" class="btn btn-outline-dark" style='margin-left:580px;'>Logout</button>
                    </form>              
            </div>
        </div>
</nav>
       
    
        
        <!-- end of nav bar -->
    
    <br><br>
    <div class="container">
        <h3 class="text-center"><br>New Reservation<br></h3>   
        <div class="row">
            <div class="col-md-6 offset-md-3">   
     
            
            
            
        
    <p class="text-white bg-dark text-center">Welcome rana, Create your reservation here!</p><br>  
            
        <div class="signup-form">
            <form  method="post">
                <div class="form-group">
                <label>Name</label>
                    <input type="text" class="form-control" name="fname" placeholder="First Name" required="required">
                    <small class="form-text text-muted">First name must be 2-20 characters long</small>
                </div>  
                <div class="form-group">
                <label>Enter Date</label>
                <input type="date" class="form-control" name="date" placeholder="Date" required="required">
                </div>
                <div class="form-group">
                <label>Enter number of Guests</label>
                <input type="number" class="form-control" min="1" name="num_guests" placeholder="Guests" required="required">
                    <small class="form-text text-muted">Minimum value is 1</small>
                </div>
                <div class="form-group">
                <label for="guests">Enter your Telephone Number</label>
                    <input type="telephone" class="form-control" name="tele" placeholder="Telephone" required="required">
                    <small class="form-text text-muted">Telephone must be 6-20 characters long</small>
                </div>      
               
                <div class="form-group">
                <button type="submit" name="reserv-submit" class="btn btn-dark btn-lg btn-block">Submit Reservation</button>
                </div>
            </form>
            <br><br>
        </div>
        
                 
            </div>
        </div>
    </div>

    <!---end of body-->
    </body></html>