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
$option = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="/script.js"></script>
    <link rel="stylesheet" href="style.css">
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
                <li class="nav-item active">
                    <a class="nav-link" href="/Register_System/index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Register_System/contact.php">Contact</a>
                </li>
                <li class="nav-item">
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
    <?php
    $catlist = array();
    $counter = 0;
    $maxcolumns = 3;
    ?>
    <?php
    if (isset($_POST['cmd']) && $_POST['cmd'] == 'adopt') {
        $catid = $_POST['catid'];
        $userid = $_POST['userid'];
        $sqluserid = "SELECT id FROM user WHERE username = '$userid'";
        $resultuser = mysqli_query($conn, $sqluserid);
        $row = mysqli_fetch_assoc($resultuser);
        $userid = $row['id'];
        $status = 0;

        $sql = "INSERT INTO request (userId,catId,status) VALUES ('$userid','$catid','$status')";

        if (mysqli_query($conn, $sql)) {
            echo "Request Success !";
        } else {
            echo "Request Error " . mysqli_connect_error();
        }
    }
    ?>
    <div class="homeheader">
        <h3>Welcome to NeedHooman</h3>
    </div>
    <h4 style="text-align:center;">We are cat adoption website that seek for kind master</h4>

    <div class="homecontent">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <?php
        if (isset($_POST['breed'])) {
            $breedselect = $_POST['breed'];
            if ($breedselect == 'all') {
                $option = 0;
            } else {
                // $sql = "SELECT * FROM cat WHERE breed = '$breedselect'";
                $option++;
            }
        }
        ?>

        <!-- logged in user information -->
        <?php if (isset($_SESSION['username'])) : ?>
            <?php
            if ($option == 0) {
                $sql = "SELECT * FROM cat";
            } else {
                $sql = "SELECT * FROM cat WHERE breed = '$breedselect'";
            }

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($catlist, $row['id']);
                    $counter++;
                }
            }
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <h2>Breed</h2>
                <?php
                // $sql = "SELECT * FROM cat";
                // $result = mysqli_query($conn, $sql);
                ?>
                <select name="breed">
                    <option value="all">- breed -</option>
                    <option value="American Short Hair">American Short Hair</option>
                    <option value="American Curl">American Curl</option>
                    <option value="Scottish Fold">Scottish Fold</option>
                    <option value="Persian">Persian</option>
                    <option value="Exotic">Exotic</option>
                    <option value="Maine Coon">Maine Coon</option>
                    <option value="Mixed">Mixed</option>
                </select>
                <br>
                <input type="submit" value="Search" />
            </form>
            <h3> Cat List </h3>
            <table class="table table-bordered">
                <thead>
                    <th style="background-color: lightcoral;
            text-align: center;
            border: 1px solid skyblue;">
                        Cat
                    </th>
                    <th style="background-color: lightskyblue;
            text-align: center;
            border: 1px solid skyblue;">
                        Cat Description
                    </th>
                    <th style="background-color: lightcoral;
            text-align: center;
            border: 1px solid skyblue;">
                        Cat
                    </th>
                    <th style="background-color: lightskyblue;
            text-align: center;
            border: 1px solid skyblue;">
                        Cat Description
                    </th>
                    <th style="background-color: lightcoral;
            text-align: center;
            border: 1px solid skyblue;">
                        Cat
                    </th>
                    <th style="background-color: lightskyblue;
            text-align: center;
            border: 1px solid skyblue;">
                        Cat Description
                    </th>
                </thead>
                </tbody>
                <?php
                $rank = 0;
                while (true) {
                    for ($column = 1; $column <= $maxcolumns; $column++) {
                        if (!isset($catlist[$rank])) {
                            return;
                        }
                        if ($option == 0) {
                            $sql = "SELECT * FROM cat WHERE id = '$catlist[$rank]'";
                        } else {
                            echo "This is fine for " . $catlist[$rank];
                            $sql = "SELECT * FROM cat WHERE id ='$catlist[$rank]' AND breed = '$breedselect'";
                        }
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $catdob = $row['dob'];
                        $dob = new DateTime($catdob);
                        $now = new DateTime();
                        $difference = $now->diff($dob);
                        $age = $difference->y;

                        if ($column == 1) {
                            echo "<tr>";
                        }
                ?>

                        <td bgcolor="lightblue">
                            <img src="../image/catimg/<?php echo $row['profile_img']; ?>" width="100px  " height="100px">
                            <br>
                            <?php echo $row['name'] . "<br>" . ($age <= 1 ? "Less than a year" : $age . " years ") . "<br>" . $row['breed'] . "<br> " . ($row['sex'] == 'M' ? "Male" : "Female") ?>

                        </td>
                        <td style="width: 20%; background-color: #a8dee0;">
                            <?php echo $row['description'] ?>
                            <br>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="formNew<?php echo $row['id']; ?>">
                                <input type="hidden" name="catid" value="<?php echo $row['id']; ?>" />
                                <input type="hidden" name="userid" value="<?php echo $_SESSION['username']; ?>" />
                                <input type="hidden" name="cmd" value="adopt" />
                                <button onclick="confirmAdopt('form<?php echo $row['id']; ?>', '<?php echo $row['name']; ?>')">
                                    Adopt!
                                </button>
                            </form>

                        </td>
                <?php
                        if ($column == $maxcolumns) {
                            echo    "</tr>";
                        }

                        $rank++;
                    }
                }
                ?>
                </tbody>
            </table>

        <?php endif ?>
    </div>
    <script>
        function confirmAdopt(formId, catname) {
            if (confirm(`Are you sure to adopt ${catname}?`)) {
                document.getElementById(formId).submit();
            }
        }
    </script>
</body>

</html>