<?php
session_start();
if (empty($_SESSION['id_petugas'])) {
    echo "<script>
    alert('Sorry you are not logged in');
    window.location.assign('../index2.php');
    </script>";
}
if ($_SESSION['level'] != 'petugas') {
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
    <title>Operator - SPP Payment Application</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">

        <h3>School Tuition Payment Application</h3>
        <div class="alert alert-info">
        You are logged in as <b><?=$_SESSION['nama_petugas']?></b> of the SPP payment application
        </div>
        <a href="petugas.php" class="btn btn-primary">Operator</a>
        <a href="petugas.php?url=pembayaran" class="btn btn-primary">Paying</a>
        <a href="petugas.php?url=logout" class="btn btn-primary"> Logout</a>

        <div class="card mt-2">
            <div class="card-body">
                <!-- isi web -->
                <?php
                $file = @$_GET['url'];
                if (empty($file)) {
                    echo "<h4>Welcome To the Operation Page.</h4>";
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