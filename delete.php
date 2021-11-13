
<?php
include ('veiw.php');
// session_start();
 $dbhost="localhost";
 $dbuser="root";
 $dbpass="";
 $db="project";
 $conn=new mysqli($dbhost,$dbuser,$dbpass,$db);
 $reservation = $_GET['rn'];
 $delet = "DELETE FROM reservation WHERE RID = '$reservation'";
 $query3 = mysqli_query($conn,$delet);
// header('location:veiw.php');

 $user=$_SESSION['id'] ;
 // $reservat=$_SESSION['RI'] ;

  echo "<div class='container' style='margin-top:20px;'>";
  echo "<h3 class='text-center'>"."<br>"."View Reservations"."<br>"."</h3>";
  
  echo "<p class='text-white bg-dark text-center'>"."Here you can check your reservation history"."</p>"."<br>";
  
  echo "<table id ='myTable' class='table table-hover table-responsive-sm text-center'>";
  echo "<thead>";
  echo "<tr >";
  echo "<th scope='col'>"."Full Name"."</th>";
  echo "<th scope='col'>"."Reservation Date"."</th>";
  echo "<th scope='col'>"."Guests"."</th>";
  echo "<th scope='col'>"."Telephone"."</th>";
  echo "<th class='table-danger' scope='col' > "."<pre>"."            "."</pre>"."</th>";
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
     
      
      echo "<td >".$row2[1]."</td>";
      echo "<td></td>";
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
      echo "<td></td>";
      echo "<td></td>";
      
      
      
      
      echo "<td>".$row2[4]."</td>";
      echo "<td></td>";
      echo "<td></td>";
      echo "<td></td>";
      
   
    echo "<td><a href='delet.php?rn=$row2[0]' style='margin-left:4px;'class='btn-danger btn    text-capitalize ' >Cancel</td>";
   
}
     
} 

 ?>