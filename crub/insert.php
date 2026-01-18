<!-- insert.php -->
<?php


    include 'conection.php'; 

    if(isset($_POST['btnSumit'])){
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];
        
        $insert = "INSERT INTO form (name, gender, position, salary) VALUES ('$name', '$gender', '$position', '$salary')";
        $execute = mysqli_query($conn, $insert);
        
      if($execute){
        // Beautiful Logic: Alert the user, then clear the form by redirecting
        echo "<script>
                alert('Success! Employee data has been saved.');
                window.location.href = 'form.php'; 
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    }
?>