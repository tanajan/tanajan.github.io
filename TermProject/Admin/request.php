<?php
include 'server.php';

$sql = "SELECT * FROM request";
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
    <title>Home Page</title>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <style>
        input[type=text] {
            width: 35%;
            padding: 12px 20px;
            margin: 8px 10px 10px 10px;
            box-sizing: border-box;
        }

        input[type=email] {
            width: 150px;
            padding: 12px 20px;
            margin: 8px 10px 10px 10px;
            box-sizing: border-box;
        }
    </style>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #a8dee0;">
        <a class="navbar-brand" href="/Admin/main.html">
            <img src="/image/caticon.png" width="30" height="30" class="d-inline-block align-top" alt="Need Hooman Icon">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/Admin/main.php">List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Admin/add.php">Add</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/Admin/request.php">Request</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="/Register_System/login.php" class="nav-link">Log out</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<body>
    <?php
    $reqid = "";
    $userid = "";
    $catid = "";
    $status = 0;
    ?>
    <?php
    if (isset($_POST['cmd']) && $_POST['cmd'] == 'approve') {
        $id = $_POST['id'];
        
        $sql = "UPDATE request SET
        status = 1
        WHERE req_id = '$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Request approved successfully !";
        } else {
            echo "Error : " . $sql;
        }
    }

    if (isset($_POST['cmd']) && $_POST['cmd'] == 'deny') {
        $id = $_POST['id'];
        
        $sql = "UPDATE request SET
        status = 2
        WHERE req_id = '$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Request Denied successfully !";
        } else {
            echo "Error : " . $sql;
        }
    }
    ?>
    <h3 style="font-size: 36px;">Request</h3>
    <br>

    <table style="margin: 3%; width: 80%;" class="table table-bordered">
        <thead>
            <th>Request Id</th>
            <th>User Id</th>
            <th>Cat Id</th>
            <th>Status</th>
            <th colspan="2"></th>
        </thead>
        <tbody>
            <?php foreach ($requests as $request) : ?>
                <tr>
                    <td><?php echo $request['req_id']; ?></td>
                    <td><?php echo $request['userId']; ?></td>
                    <td><?php echo $request['catId']; ?></td>
                    <td><?php echo ($request['status'] == 0) ? "Pending" : (($request['status'] == 1) ? "Approved" : "Denied"); ?></td>
                    <td>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="formUpdate<?php echo $request['req_id']; ?>">
                            <input type="hidden" name="id" value="<?php echo $request['req_id']; ?>" />
                            <input type="hidden" name="cmd" value="approve" />
                            <button type="submit" form="formUpdate<?php echo $request['req_id']; ?>">
                                <img src="../image/agree_icon.png" style="width: 20px; height:20px">
                            </button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form<?php echo $request['req_id']; ?>">
                            <input type="hidden" name="id" value="<?php echo $request['req_id']; ?>" />
                            <input type="hidden" name="cmd" value="deny"/>
                            <button type="submit" form="form<?php echo $request['req_id']; ?>">
                                <img src="../image/denied_icon.jpg" style="width: 20px; height:20px">
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</body>

</html>