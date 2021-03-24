<?php
include 'processForm.php';
include 'server.php';

$sql = "SELECT * FROM cat";

$result = mysqli_query($conn, $sql);
$cats = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
                    <a class="nav-link active" href="/Admin/main.php">List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Admin/add.php">Add</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Admin/request.php">Request</a>
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
    $id = "";
    $name = "";
    $breed = "";
    $color = "";
    $dob = "";
    $sex = "M";
    $desc = "";
    ?>
    <?php
    if (isset($_POST['cmd']) && $_POST['cmd'] == 'save') {
        $id = $_POST['id'];
        $name = $_POST['catname'];
        $breed = $_POST['breed'];
        $color = $_POST['color'];
        // $dob = $_POST['dob'];
        $sex = $_POST['sex'];
        $desc = $_POST['desc'];

        $sql = "UPDATE cat SET
        name = '$name',
        breed = '$breed',
        color = '$color',
        sex = '$sex',
        description = '$desc'
        WHERE id = '$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Cat profile Update successfully !";
        } else {
            echo "Error : " . $sql;
        }
    }

    if (isset($_POST['cmd']) && $_POST['cmd'] == 'update') {
        $catid = $_POST['id'];
        $sql = "SELECT * FROM cat WHERE id = $catid";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            $name = $row['name'];
            $breed = $row['breed'];
            $color = $row['color'];
            $sex = $row['sex'];
            $desc = $row['description'];
        }
    }
    ?>

    <?php
    if (isset($_POST['cmd']) && $_POST['cmd'] == 'del') {
        $catid = $_POST['catid'];
        $sql = "DELETE FROM cat WHERE id = $catid";

        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_connect_error();
        }
    }
    ?>

    <div class="container-fluid" style="margin-top:2.5%; margin-bottom:2.5%;">
        <div class="row">
            <div class="col-12 offset-md-12 form-div">
                <table class="table table-bordered">
                    <thead>
                        <th>
                            #
                        </th>
                        <th>
                            Cat Image
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Breed
                        </th>
                        <th>
                            Sex
                        </th>
                        <th>
                            Color
                        </th>
                        <th>
                            Date of Birth
                        </th>
                        <th>
                            Age
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            edit
                        </th>
                        <th>
                            delete
                        </th>
                    </thead>
                    <tbody>
                        <?php foreach ($cats as $cat) : ?>
                            <?php
                            $catdob = $cat['dob'];
                            $dob = new DateTime($catdob);
                            $now = new DateTime();
                            $difference = $now->diff($dob);
                            $age = $difference->y;
                            ?>
                            <tr>
                                <td style="width: 7%;"><?php echo $cat['id']; ?> </td>
                                <td style="width: 5%;"> <img src="../image/catimg/<?php echo $cat['profile_img']; ?>" width="80px  " height="80px"> </td>
                                <td style="width: 7%;"><?php echo $cat['name']; ?> </td>
                                <td style="width: 10%;"><?php echo $cat['breed']; ?> </td>
                                <td style="width: 5%"><?php echo $cat['sex']; ?> </td>
                                <td style="width: 10%"><?php echo $cat['color']; ?> </td>
                                <td style="width: 8%;"><?php echo $cat['dob']; ?> </td>
                                <td style="width:5%"><?php echo $age ?> </td>
                                <td style="width: 30%;"><?php echo $cat['description']; ?> </td>
                                <td style="width: 5%;">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="formUpdate<?php echo $cat['id']; ?>">
                                        <input type="hidden" name="id" value="<?php echo $cat['id']; ?>" />
                                        <input type="hidden" name="cmd" value="update" />
                                        <button type="submit" form="formUpdate<?php echo $cat['id']; ?>">
                                            <img src="../image/edit_icon.png" style="width: 20px; height:20px">
                                        </button>
                                    </form>
                                </td>
                                <td style="width: 5%;">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form<?php echo $cat['id']; ?>">
                                        <input type="hidden" name="catid" value="<?php echo $cat['id']; ?>" />
                                        <input type="hidden" name="cmd" value="del" />
                                    </form>
                                    <button onclick="confirmDelete('form<?php echo $cat['id']; ?>', '<?php echo $cat['name']; ?>')">
                                        <img src="../image/bin-removebg-preview.png" style="width: 20px; height:20px">
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 style=" background-color: #BCE0F0;"> Update Section </h3>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="margin-left: 2%;">
                    <input type="hidden" name="cmd" value="save" />

                    <table style="margin-left: 2%;">
                        <tr>
                            <th>Cat Id</th>
                            <td><input type="text" name="id" value="<?php echo $id ?>"></td>
                        </tr>
                        <tr>
                            <th>Cat Name</th>
                            <td><input type="text" name="catname" value="<?php echo $name ?>"></td>
                        </tr>
                        <tr>
                            <th>Breed</th>
                            <td><input type="text" name="breed" value="<?php echo $breed ?>"></td>
                        </tr>
                        <tr>
                            <th>Color</th>
                            <td><input type="text" name="color" value="<?php echo $color ?>"></td>
                        </tr>
                        <tr>
                            <th>Sex</th>
                            <td>
                                <input type="radio" name="sex" value="M" <?php echo ($sex == 'M') ? "checked" : ""; ?>>Male<br />
                                <input type="radio" name="sex" value="F" <?php echo ($sex == 'F') ? "checked" : ""; ?>>Female
                            </td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>
                                <textarea name="desc" style="width: 800px; height:300px"><?php echo $desc ?></textarea>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <input type="submit" value="UPDATE" />
                </form>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(formId, catname) {
            if (confirm(`Are you sure to delete ${catname}?`)) {
                // alert(`Delete ${formId}`);
                document.getElementById(formId).submit();
            }
        }
    </script>
</body>

</html>