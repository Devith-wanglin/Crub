<?php
// START SESSION
// This opens a session - like creating a temporary memory that lasts while you browse
// We use this to save messages like "Delete was successful!"
session_start();
//delete.php

// INCLUDE DATABASE CONNECTION
// This brings in the connection.php file which connects to MySQL database
// Without this, we can't talk to the database
include 'conection.php';

// CHECK IF ID WAS SENT FROM THE FORM
// isset() checks if 'id' exists in the POST data
// POST data comes from the form when user clicks "Delete" button
if (isset($_POST['id'])) {
    
    // STORE THE ID IN A VARIABLE
    // Get the employee ID from the form submission
    // Example: If deleting employee #5, then $id = 5
    $id = $_POST['id'];

    // CREATE DELETE SQL COMMAND
    // This is the SQL query that will delete the employee record
    // "DELETE FROM form" = delete from the 'form' table
    // "WHERE id = $id" = only delete the row where id matches
    // Example: "DELETE FROM form WHERE id = 5"
    $delete = "DELETE FROM form WHERE id = $id";

    // EXECUTE THE DELETE QUERY
    // mysqli_query() sends the SQL command to the database
    // $conn = database connection
    // $delete = the SQL command we created above
    // Returns TRUE if successful, FALSE if failed
    if (mysqli_query($conn, $delete)) {
        
        // SAVE SUCCESS MESSAGE IN SESSION
        // $_SESSION is like a temporary storage box
        // We store 'delete_success' = true so we can show a message on table.php
        // This value will be available on the next page
        $_SESSION['delete_success'] = true;
    }

    // REDIRECT BACK TO TABLE PAGE
    // header() sends the browser to a different page
    // "Location: table.php" = go to table.php
    // This refreshes the employee list so deleted employee disappears
    header("Location: table.php");
    
    // STOP THE SCRIPT
    // exit() stops PHP from running any more code
    // This is important after header() to prevent errors
    exit();
}
?>