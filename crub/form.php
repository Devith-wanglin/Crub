
<!DOCTYPE html>
<!-- form.php -->
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Animated Form Card</title>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />

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

        /* rotating border */
        .card-animated::before {
            content: "";
            position: absolute;
            width: 400px;
            height: 190%;
            background: linear-gradient(180deg, #ff7a00, #ffae00);
            animation: rotBGimg 4s linear infinite;
        }

        /* inner background */
        .card-animated::after {
            content: "";
            position: absolute;
            inset: 5px;
            background: #07182e;
            border-radius: 15px;
            z-index: 0;
        }

        @keyframes rotBGimg {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
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

<body class="p-4">
    <div class="card-animated shadow">
        <h2 class="text-center mb-4">Complete Form</h2>

        <form action="insert.php" method="post">
            <div class="mb-2">
                <label class="form-label">Employee Name</label>
                <input type="text" name="name" class="form-control" placeholder="Employee Name....." />
            </div>

            <div class="mb-2">
                <label class="form-label">Gender</label>
                <select name='gender' class="form-control">
                    <option disabled selected>---Other---</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>

            <div class="mb-2">
                <label class="form-label">Employee Position</label>
                <select name='position' class="form-control" required>
                    <option disabled selected>---Position---</option>
                    <option>Manager</option>
                    <option>Supervisor</option>
                    <option>Accountant</option>
                    <option>Developer</option>
                    <option>Designer</option>
                    <option>Staff</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Salary</label>
                <input name='salary'
                    type="number"
                    class="form-control"
                    placeholder="Enter Your Salary...."
                />
            </div>

            <button name='btnSumit' type="submit" class="btn btn-success  mx-auto d-flex text-center">
                Submit
            </button>
            <div class="text-center"><a href="table.php"><button type="button" class="btn btn-primary rounded-3 mt-4 w-75 ml-5 fw-bold">Show</button></a></div>
    
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
