<!DOCTYPE html>
<!-- formEdit.php -->
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #020617;
        }
        .card-animated {
            width: 800px;
            height: 600px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            border-radius: 20px;
        }
        .card-animated::before {
            content: "";
            position: absolute;
            width: 400px;
            height: 190%;
            background: linear-gradient(180deg, #ff7a00, #ffae00);
            animation: rotBGimg 4s linear infinite;
        }
        .card-animated::after {
            content: "";
            position: absolute;
            inset: 5px;
            background: #07182e;
            border-radius: 15px;
            z-index: 0;
        }
        @keyframes rotBGimg {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .card-animated h2,
        .card-animated form {
            position: relative;
            z-index: 2;
            width: 80%;
            color: white;
        }
        .card-animated .form-label {
            color: #fff;
        }
    </style>
</head>
<?php
    include 'conection.php';
    $id = $_GET['id'];
    $select = "SELECT * FROM form WHERE id = $id";
    $ex = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ex);
?>
<body class="p-4">
    <a href="table.php"><button type="button" class="btn btn-primary fs-5">Show</button></a>
    <div class="card-animated shadow">
        <h2 class="text-center mb-4">Edit Employee</h2>

        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?=$row['id']?>">
            
            <div class="mb-2">
                <label class="form-label">Employee Name</label>
                <input type="text" name="name" value="<?=$row['name']?>" class="form-control" placeholder="Employee Name....." required />
            </div>

            <div class="mb-2">
                <label class="form-label">Gender</label>
                <select name='gender' class="form-control" required>
                    <option disabled>---Other---</option>
                    <option value="male" <?=$row['gender']=='male'?'selected':''?>>Male</option>
                    <option value="female" <?=$row['gender']=='female'?'selected':''?>>Female</option>
                </select>
            </div>

            <div class="mb-2">
                <label class="form-label">Employee Position</label>
                <select name='position' class="form-control" required>
                    <option disabled>---Position---</option>
                    <option value="Manager" <?=$row['position']=='Manager'?'selected':''?>>Manager</option>
                    <option value="Supervisor" <?=$row['position']=='Supervisor'?'selected':''?>>Supervisor</option>
                    <option value="Accountant" <?=$row['position']=='Accountant'?'selected':''?>>Accountant</option>
                    <option value="Developer" <?=$row['position']=='Developer'?'selected':''?>>Developer</option>
                    <option value="Designer" <?=$row['position']=='Designer'?'selected':''?>>Designer</option>
                    <option value="Staff" <?=$row['position']=='Staff'?'selected':''?>>Staff</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Salary</label>
                <input name='salary' type="number" class="form-control" value="<?=$row['salary']?>" placeholder="Enter Your Salary...." required />
            </div>

            <button name='update' type="submit" class="btn btn-success mx-auto d-flex text-center">
                Update
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>