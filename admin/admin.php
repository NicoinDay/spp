<?php
session_start();
if (empty($_SESSION['id_petugas'])) {
    echo "<script>
    alert('Sorry you are not logged in');
    window.location.assign('../index2.php');
    </script>";
}
if ($_SESSION['level'] != 'admin') {
    echo "<script>
    alert('sorry you are not an admin session');
    window.location.assign('../index2.php');
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - SPP Payment Application</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">
<h3>School Tuition Payment Application</h3>
        <div class="alert alert-info">
            You're logged in as the <b>ADMINISTRATOR</b> of the SPP payment application
        </div>

        <a href="admin.php" class="btn btn-primary"> Administrator</a>
        <a href="admin.php?url=spp" class="btn btn-primary"> SPP</a>
        <a href="admin.php?url=kelas" class="btn btn-primary">Class</a>
        <a href="admin.php?url=siswa" class="btn btn-primary">Student</a>
        <a href="admin.php?url=petugas" class="btn btn-primary">Operator</a>
        <a href="admin.php?url=pembayaran" class="btn btn-primary">Paying</a>
        <a href="admin.php?url=laporan" class="btn btn-primary">Payment History</a>
        <a href="admin.php?url=logout" class="btn btn-primary">Logout</a>


<div class="card mt-2">
            <div class="card-body">
                <!-- isi web -->
                <?php
                $file = @$_GET['url'];
                if (empty($file)) {
                    echo "<h4>Welcome To the Administrations Page</h4>";
                    echo "The SPP payment application is used to make it easier to record student payments at schools";
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
