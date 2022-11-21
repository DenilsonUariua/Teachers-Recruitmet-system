<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- add logo to the browser tab -->
    <link rel="icon" href="./images/eduhirelogo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./style.css" />
    <title>Users</title>
</head>
<style>
    body {
        background-color: darkorange;
    }
</style>

<body>
    <!-- Navbar  -->
    <?php
    include_once 'header.php';
    ?>
    <!-- end of navbar -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Admin Dashboard</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="list-group">
                                    <a href="adminDashboard.php" class="list-group-item active">Dashboard</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        // get all the employer_requests from the db
        $sql = "SELECT * FROM users";
        // display in table
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table table-striped table-hover'>
            <thead>
                <tr>
                    <th scope='col'>Username</th>
                    <th scope='col'>Role</th>
                    <th scope='col'>Phone number</th>
                    <th scope='col'>Status</th>
                    <th scope='col'>Action</th>
                </tr>
            </thead>
            <tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row['username'] . "</td>
                    <td>" . $row['role'] . "</td>
                    <td>" . $row['phone_number'] . "</td>
                    <td>" . $row['status'] . "</td>
                    <td>
                        <a href='userUnblock.php?username=" . $row['username'] . "' class='btn btn-success'>Approve</a>
                        <a href='userBlock.php?username=" . $row['username'] . "' class='btn btn-danger'>Block</a>
                    </td>
                </tr>";
            }
            echo "</tbody>
            </table>";
        } else {
            echo "No requests";
        }
        ?>
    </div>
</body>

</html>