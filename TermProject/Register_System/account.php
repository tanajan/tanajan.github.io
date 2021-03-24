<?php
session_start();
include('server.php');

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}

$userid = $_SESSION['username'];
$sqluserid = "SELECT id FROM user WHERE username = '$userid'";
$resultuser = mysqli_query($conn, $sqluserid);
$row = mysqli_fetch_assoc($resultuser);
$userid = $row['id'];

$sql = "SELECT * FROM request WHERE userId = '$userid'";
$result = mysqli_query($conn, $sql);
$requests = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./Register_System/style.css">
    <script src="/script.js"></script>
    <title>My Request Page</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #a8dee0;">
        <a class="navbar-brand" href="#">
            <img src="/image/caticon.png" width="30" height="30" class="d-inline-block align-top" alt="Need Hooman Icon">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/Register_System/index.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Register_System/contact.php">Contact <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/Register_System/account.php">My Request</a>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?php if (isset($_SESSION['username'])) : ?>
                        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong><a href="index.php?logout='1'" style="color:red;" class="nav-link">Logout</a></p>
                    <?php endif ?>
                </li>
            </ul>
        </div>
    </nav>
</header>

<body>

    <div class="container-fluid">
        <div class="row">
            <?php if (isset($_SESSION['username'])) : ?>
                <table style="margin: 3%; width: 80%;" class="table table-bordered">
                    <thead>
                        <th>Request Id</th>
                        <th>Cat Name</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        <?php foreach ($requests as $request) : ?>
                            <?php 
                            $catid = $request['catId'];
                            $sqlcat = "SELECT * FROM cat WHERE id = $catid";
                            $resultcat = mysqli_query($conn,$sqlcat);
                            $rowcat = mysqli_fetch_assoc($resultcat);
                        ?>
                            <tr>
                                <td><?php echo $request['req_id']; ?></td>
                                <td><?php echo $rowcat['name']; ?></td>
                                <td style="background-color: <?php echo ($request['status'] == 0) ? "#FFF666" : (($request['status'] == 1) ? "#00FF00" : "#F08080") ?>;">
                                <?php echo ($request['status'] == 0) ? "Pending" : (($request['status'] == 1) ? "Approved" : "Denied"); ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>

            <?php endif ?>
        </div>
    </div>
</body>

</html>