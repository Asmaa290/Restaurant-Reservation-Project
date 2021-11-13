
<html lang="en"><head>
<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">    <!--favicon-->
<title>MonkaS. Restaurant</title>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet" type="text/css">     <!--style.css document-->
  <link href="css/font-awesome.min.css" rel="stylesheet">     <!--font-awesome-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">  <!--bootstrap-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><script data-dapp-detection="">!function(){let e=!1;function n(){if(!e){const n=document.createElement("meta");n.name="dapp-detected",document.head.appendChild(n),e=!0}}if(window.hasOwnProperty("ethereum")){if(window.__disableDappDetectionInsertion=!0,void 0===window.ethereum)return;n()}else{var t=window.ethereum;Object.defineProperty(window,"ethereum",{configurable:!0,enumerable:!1,set:function(e){window.__disableDappDetectionInsertion||n(),t=e},get:function(){if(!window.__disableDappDetectionInsertion){const e=arguments.callee;e&&e.caller&&e.caller.toString&&-1!==e.caller.toString().indexOf("getOwnPropertyNames")||n()}return t}})}}();</script>  <!--googleapis jquery-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  <!--font-awesome-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>                          <!--bootstrap-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>           <!--bootstrap-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>            <!--bootstrap-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>                      <!--ajax-->
   
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

</style>
<script language='javascript'>
                function deleteRow(r) {
                    var i = r.parentNode.parentNode.rowIndex;
                    document.getElementById('myTable').deleteRow(i);
                  }
                </script>

</head>


<body>

<?php

        session_start();
        $dbhost="localhost";
        $dbuser="root";
        $dbpass="";
        $db="project";
        $conn=new mysqli($dbhost,$dbuser,$dbpass,$db);
     

        if(isset($_POST['view-res'])){
            $user=$_SESSION['id'] ;
           // $reservat=$_SESSION['RI'] ;

            echo "<div class='container' style='margin-top:80px;'>";
            echo "<h3 class='text-center'>"."<br>"."View Reservations"."<br>"."</h3>";
            
            echo "<p class='text-white bg-dark text-center'>"."Here you can check your reservation history"."</p>"."<br>";
            
            echo "<table id ='myTable' class='table table-hover table-responsive-sm text-center'>";
            echo "<thead>";
            echo "<tr >";
            echo "<th scope='col'>"."Full Name"."</th>";
            echo "<th scope='col'>"."Reservation Date"."</th>";
            echo "<th scope='col'>"."Guests"."</th>";
            echo "<th scope='col'>"."Telephone"."</th>";
            echo "<th class='table-danger' scope='col' > "."<pre>"."       "."</pre>"."</th>";
            echo "</tr>";
            echo "</thead>";
            echo "</table>";
            echo "</div>"; 

            $sql = "SELECT IDR FROM reservationid WHERE IDU =' $user'";
            $query = mysqli_query($conn,$sql);
            if($query->num_rows > 0) {
                 
                  while($row = mysqli_fetch_assoc($query)){
                 $s=$row['IDR'];
                 $sql2 = "SELECT * FROM reservation WHERE RID = '$s' ";
                 $query2 = mysqli_query($conn,$sql2);
                 $row2 = mysqli_fetch_row($query2);

                echo "<div class='container'>";
                echo "<table class='table table-hover table-responsive-sm text-center'>"; 
                echo "<tbody>";
                echo "<tr>";
                echo "<form method='POST'>";
                echo "<td></td>";
                echo "<td></td>";
               
               
                
                echo "<td >".$row2[1]."</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                  
                
                echo "<td >".$row2[2]."</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                
                
                
                
                echo "<td>".$row2[3]."</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                
                
                
                
                echo "<td>".$row2[4]."</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                
             
              echo "<td><a href='delete.php?rn=$row2[0]' style='margin-left:20x;'class='btn-danger btn    text-capitalize '>Cancel</td>";
                
                echo "</form>"; 
                echo "</tr>";
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
              
        
               
              }
               
                /*
                $sql = "SELECT IDR FROM reservationid WHERE IDU =' $user'";
                $query = mysqli_query($conn,$sql);
                if($query->num_rows > 0) {
                     
                      while($rowd = mysqli_fetch_assoc($query)){
                     $s=$rowd['IDR'];
                     $sql3 = "SELECT * FROM reservation WHERE RID = '$s' ";
                     $query3 = mysqli_query($conn,$sql3);
                     $row3 = mysqli_fetch_row($query3);
                     if()
                     $sql4 = "DELETE FROM reservation WHERE RID = $row3['RID']";
                */
            }
            
            
              if(isset($_POST['update-submit'])){
                header('location:Reservation.php');
                
            }
        }


             
    

        if(isset($_POST['logout-submit'])){
            header('location:index.php');
           }

           if(isset($_POST['new-res'])){
            header('location:Reservation.php');
           }


?>




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
                
        
                    <form  class="navbar-form navbar-right" method="post">
                    <button  type="submit" name="new-res" class="btn btn-outline">New Reservation</button>
                    </form> 
                    
                    <form  method="post">
                    <button type="submit" name=" view-res"  class="btn btn-outline" style='margin-left:20px;'>View Reservations</button>
                    </form> 
        
                  
                    <form class="navbar-form navbar-right" method="post">
                    <button type="submit" name="logout-submit" class="btn btn-outline-dark" style='margin-left:580px;'>Logout</button>
                    </form>              
            </div>
        </div>
</nav>

        

<br><br>
<br><br>



</body></html>



