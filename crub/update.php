<?php
// update.php
// INCLUDE DATABASE CONNECTION FILE
// This brings in conection.php which has the MySQL connection ($conn)
// Without this, we can't communicate with the database
include 'conection.php';

// GET ALL DATA FROM THE EDIT FORM
// When user submits the edit form, all data comes through $_POST
// $_POST is an array that holds form data sent via POST method

$id = $_POST['id'];           // Get employee ID (which record to update)
$name = $_POST['name'];       // Get updated employee name
$gender = $_POST['gender'];   // Get updated gender (Male/Female)
$position = $_POST['position']; // Get updated position (Manager, Developer, etc.)
$salary = $_POST['salary'];   // Get updated salary amount

// CREATE UPDATE SQL QUERY
// UPDATE = SQL command to modify existing records
// form = table name
// SET = specifies which columns to change
// WHERE id = $id = only update THIS specific employgit ee
// Example: "UPDATE form SET name = 'John', gender = 'male', position = 'Manager', salary = '5000' WHERE id = 5"
$update = "UPDATE form SET name = '$name', gender = '$gender', position = '$position', salary = '$salary' WHERE id = $id";

// EXECUTE THE UPDATE QUERY
// mysqli_query() sends the SQL command to the database
// $conn = database connection
// $update = the SQL UPDATE command we created
// Returns TRUE if successful, FALSE if failed
$execute = mysqli_query($conn, $update);

// CHECK IF UPDATE WAS SUCCESSFUL
if($execute){
    // IF SUCCESSFUL: Show alert and redirect
    
    // JAVASCRIPT ALERT
    // alert() = shows a popup message to the user
    // This confirms the update worked
    echo "<script>
            alert('Success! Employee data has been updated.');
            
            // REDIRECT TO TABLE PAGE
            // window.location.href changes the page
            // Sends user back to employee list with updated data
            window.location.href = 'table.php'; 
          </script>";
}
// NOTE: There's no error handling if update fails
// Better to add an else block for error messages
?>