<!DOCTYPE html>
<!-- table.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Table</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #f4f6f9; }
        .table-container { max-width: 1100px; margin: auto; }
        .table thead th { vertical-align: middle; letter-spacing: 1px; }
    </style>
</head>

<body>
<div class="container table-container mt-5 p-4 shadow rounded-3 bg-white">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Employee List</h3>
        <a href="form.php" class="btn btn-primary">+ Add Employee</a>
    </div>

    <table class="table table-hover table-bordered align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php
            include 'conection.php';
            $select = "SELECT * FROM form";
            $result = mysqli_query($conn, $select);

            while ($row = mysqli_fetch_assoc($result)): 
        ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= htmlspecialchars($row['name']); ?></td>
                <td><?= $row['gender']; ?></td>
                <td><?= $row['position']; ?></td>
                <td class="fw-bold text-success">
                    $<?= number_format($row['salary']); ?>
                </td>
                <td>
                    <form action="delete.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <button type="submit" 
                                class="btn btn-outline-danger btn-sm" 
                                onclick="return confirm('Are you sure you want to delete this record?')">
                            Delete
                        </button>
                    </form>

                    <a href="formEdit.php?id=<?= $row['id']; ?>" class="btn btn-outline-primary btn-sm ms-1">
                        Edit
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>