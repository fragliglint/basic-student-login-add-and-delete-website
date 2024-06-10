<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    $_SESSION['message'] = "Please login to access the dashboard";
    header("Location: login.php");
    exit(0);
}
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Student</title>
</head>
<body>
<div class="container mt-5">
    <?php include('message.php'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Student
                        <a href="index.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $student_id = mysqli_real_escape_string($con, $_GET['id']);
                        $query = "SELECT * FROM students WHERE id='$student_id' ";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $student = mysqli_fetch_array($query_run);
                            ?>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="student_id" value="<?= $student['id']; ?>">
                                <div class="mb-3">
                                    <label>Full Name</label>
                                    <input type="text" name="name" value="<?= $student['name']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Email Address</label>
                                    <input type="email" name="email" value="<?= $student['email']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="<?= $student['phone']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Course</label>
                                    <input type="text" name="course" value="<?= $student['course']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
                                </div>
                            </form>
                            <?php
                        } else {
                            echo "<h4>No Such Id Found</h4>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="script.js"></script>

</body>
</html>
