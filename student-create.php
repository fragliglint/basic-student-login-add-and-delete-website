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
    <link rel="stylesheet" href="style.css">
    <title>Add Student</title>
</head>
<body>
<div class="container mt-5">
    <?php include('message.php'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Student
                        <a href="index.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                            <div class="invalid-feedback">
                                Please enter the full name.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control" required>
                            <div class="invalid-feedback">
                                Please enter a phone number.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Course</label>
                            <input type="text" name="course" class="form-control" required>
                            <div class="invalid-feedback">
                                Please enter the course name.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Upload Profile Picture</label>
                            <input type="file" name="profile_picture" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="save_student" class="btn btn-primary">Save Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</body>
</html>
