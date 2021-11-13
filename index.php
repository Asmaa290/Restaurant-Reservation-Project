
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
    
    
    <body class="">
    <?php
        session_start();
        $dbhost="localhost";
        $dbuser="root";
        $dbpass="";
        $db="project";
        $conn=new mysqli($dbhost,$dbuser,$dbpass,$db);
        if(isset($_POST['login-submit'])){
            
            
            $_SESSION['username']=$_POST['mailuid'];
            $username = $_POST['mailuid'];
            $_SESSION['password']=$_POST['pwd'];
            $password = $_POST['pwd'];

            $sql = "SELECT * FROM users WHERE username ='$username' AND password='$password'";
            $resultl = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($resultl);
            $_SESSION['id']=$row['id'];
            
            if($row['username']==$username && $row['password']==$password){
   
                header('location:Reservation.php');
                
            }else{
                    header('location:index.php');
                }
            
            if($username=="" && $password==""){
                header('location:index.php');
            }
            

        }

        if(isset($_POST['signup-submit'])){

            $username = $_POST['uid'];
            $mail = $_POST['mail'];
            $password = $_POST['pwd'];
            $id=rand(1,3000); 
            $sql = "INSERT INTO users (id,username,email,password) VALUES ('$id','$username','$mail','$password')";
            $results = mysqli_query($conn,$sql);
            if ($results){
                 header('location:index.php');
            }
        }

      ?>
     <!---navbar--->   
    <nav class="navbar navbar-expand-md navbar-light fixed-top" >
            <div class="container">
                <a class="navbar-brand" href="#">
            <strong><em>The 3 Sugars</em></strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navi" >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navi">
                    <ul class="navbar-nav mr-auto">
                        
                        
                        
                        <li class="nav-item">
                         <a class="nav-link" href="#aboutus">About Us</a>
                     </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#reservation">Reservation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#footer">Find Us</a>
                        </li>
                                            
                    </ul>
                    
                        
                        <div>
                        <ul class="navbar-nav ml-auto">
                <li><a class="nav-link fa fa-sign-in" data-toggle="modal" data-target="#myModal_reg">&nbsp;Sing Up</a></li>
                <li><a class="nav-link fa fa-user-plus" data-toggle="modal" data-target="#myModal_login">&nbsp;Login</a></li>
                        </ul> 
                        </div>
                                      
                </div>
            </div>
    </nav>
    
    <div class="container">
      <!-- The Modal -->                          
        <div class="modal fade" id="myModal_login">
            <div class="modal-dialog">
              <div class="modal-content">
    
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Login</h4>
                  <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
    
                <!-- Modal body -->
                <div class="modal-body">
                
                <br>  
                
                        <div class="signin-form">
                        <form  method="post" >
                            <p class="hint-text">If you have already an account please log in.</p>
                        <div class="form-group">
                            <input type="text" class="form-control" name="mailuid" placeholder="Username" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pwd" placeholder="Password" required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login-submit" class="btn btn-dark btn-lg btn-block">Log In</button>
                        </div>
                                </form>
                        </div>   
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    
        
    <div class="container">
      <!-- The Modal -->
        <div class="modal fade" id="myModal_reg" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Register</h4>
                      <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>      
                <!-- Modal body -->
                    <div class="modal-body">   
    
                    <br>    
        <!---sign up form -->
                        <div class="signup-form">
                            <form method="post">
                                <p class="hint-text">Create your account. It's free and only takes a minute.</p>
                                <div class="form-group">
                                        <input type="text" class="form-control" name="uid" placeholder="Username" required="required">
                                        <small class="form-text text-muted">Username must be 4-20 characters long</small>
                                </div>
                                <div class="form-group">
                                        <input type="email" class="form-control" name="mail" placeholder="Email" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="pwd" placeholder="Password" required="required">
                                    <small class="form-text text-muted">Password must be 6-20 characters long</small>
                                </div>
                                   
                                <div class="form-group">
                                    <button type="submit" name="signup-submit" class="btn btn-dark btn-lg btn-block"  >Register Now</button>
                                </div>
                            </form>
                                <div class="text-center">Already have an account? <a href="" data-dismiss="modal" class="nav-link fa fa-user-plus" class="close" data-toggle="modal" data-target="#myModal_login" >Sign in</a></div>
                        </div> 	
                    </div>        
                    <!-- Modal footer -->
                    <div class="modal-footer">
    
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div> 
                </div>
            </div>
        </div>
    </div>
       
    
    
    <header class="header">
        <div class="row">
            <div class="col-md-12 text-center">
       <a class="logo"><img src="img/logo1.png" alt="logo"></a>
       </div>
            <div class="col-md-12 text-center">
                <button type="button" data-toggle="modal" data-target="#myModal_reg"class="btn btn-outline-light btn-lg"><em>Make a Reservation Now!</em></button>
            </div>
        </div>
    </header>
    
    
    
    <!--about us section-->
    
    <section id="aboutus">
    
     <div class="container">
       <h3 class="text-center"><br><br>The 3 Sugars</h3>
       <div class="row">
    <!--carousel-->
         <div class="col-sm"><br><br>
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
             <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
             </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                 <img class="d-block w-100" src="img/3.jpeg" alt="First slide">
               </div>
               <div class="carousel-item">
               <img class="d-block w-100" src="img/4.jpeg" alt="Second slide">
               </div>
               <div class="carousel-item">
               <img class="d-block w-100" src="img/5.jpeg" alt="Third slide">
               </div>
            </div>
             <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
             </a>
             <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
             </a>
           </div><br><br>
         </div>
    
    <!--end of carousel-->
    
         <div class="col-sm">
            <div class="arranging"><br><hr>
        <h4 class="text-center">Our Story</h4>
        <p><br>The restaurant MonkaS, In warmer months of the year the restaurant moves to the 7th floor of the building, offering a unique outdoor setting with panoramic view of the Acropolis, Lycebettus hill and the city skyline,The restaurant MonkaS, In warmer months of the year the restaurant moves to the 7th floor of the building, offering a unique outdoor setting with panoramic view of the Acropolis, Lycebettus hill and the city skyline,The restaurant MonkaS, In warmer months of the year the restaurant moves to the 7th floor of the building, offering a unique outdoor setting with panoramic view of the Acropolis, Lycebettus hill and the city skyline.<br><br><br></p><hr>
        </div>
         </div>
        </div><br>
      </div>
    </section>
    <!--end of about us section-->
    
    <div class="header2">
    </div>
    
    <!----gallery -->
    <div class="" id="gallery"><br>
        <div class="container">
        <h3 class="text-center"><br>Gallery<br><br></h3>
            <div class="d-flex flex-row flex-wrap justify-content-center">
               <div class="d-flex flex-column">
                  <img src="img/1.jpg" class="img-fluid">
                  <img src="img/2.png" class="img-fluid">
               </div>
               <div class="d-flex flex-column">
                  <img src="img/3.jpeg" class="img-fluid">
                  <img src="img/4.jpeg" class="img-fluid">
               </div>
               <div class="d-flex flex-column">
                   <img src="img/5.jpeg" class="img-fluid">
                   <img src="img/6.jpeg" class="img-fluid">
               </div>
               <div class="d-flex flex-column">
                   <img src="img/7.jpeg" class="img-fluid">
                   <img src="img/8.jpeg" class="img-fluid">
               </div>
            </div>
        </div>
    </div><br><br>
    <!----end of gallery -->
    
    <div class="container" id="reservation">
        <h3 class="text-center"><br><br>Reservation<br><br></h3>
        <img src="img/16.jpg" class="img-fluid rounded">
        <button type="button" onclick="window.location.href='reservation.php'" class="btn btn-outline-dark btn-block btn-lg">Make a reservation Now!</button>
            
    </div><br><br>
    
    <div class="header2">
    </div>
    
    
    
    <!--footer-->
    <footer class="footer" id="footer">
     <div class="container"><br>
      <div class="row">
        <div class="col-sm-12 text-center">
          <div class="social-icon">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-pinterest"></i></a>
            <a href="#"><i class="fa fa-rss"></i></a>
          </div>
        </div>
      </div>
     </div>
    </footer>
    <!--end of footer-->
    
    <!---end of body-->
    </body></html>