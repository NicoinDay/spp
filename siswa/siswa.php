<?php
session_start();
if (empty($_SESSION['nisn'])) {
    echo "<script>
    alert('Sorry you are not logged in');
    window.location.assign('../index.php');
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student - SPP Payment Application</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">

        <h3>School Tuition Payment Application</h3>
        <div class="alert alert-info">
            You're logged in as a student named <b> <?=$_SESSION['nama']?></b> in the SPP payment application
        </div>
        <a href="siswa.php" class="btn btn-primary">Student Payment History</a>
        <a href="siswa.php?url=logout" class="btn btn-primary"> Logout</a>

        <div class="card mt-2">
            <div class="card-body">
                <!-- isi web -->
                <?php
                $file = @$_GET['url'];
                if (empty($file)) {
                    echo "<h4>Welcome To the Students Page</h4>";
                    echo "The SPP payment application is used to make it easier to record student payments at schools";
                    echo "<hr>";
                    include 'history-pembayaran.php';
                } else {
                    include $file . '.php';
                }
                ?>
            </div>
        </div>

    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>