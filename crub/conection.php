<!-- //conection.php
<?php
 //$conn = mysqli_connect('localhost','root','','db_test');
//  if($conn){
//     echo "<h1>Connected</h1>";
//  }else{
//     echo "<h1>Not Connected</h1>";
//  }
?> -->




<?php
// conection.php
$conn = mysqli_connect('localhost', 'root', '', 'db_test');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>