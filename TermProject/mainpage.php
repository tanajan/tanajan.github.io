<?php
include('./Admin/server.php');
$sexdefault = "M";
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
                    <a class="nav-link" href="/mainpage.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact.html">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/account.html">Account</a>
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
    <div>
        <br>
    </div>
    <div class="container-fluid" style="margin-left: 5%;">
        <div class="row">
            <div class="col-md-2">
                <h1 style="font-size: 25px;">Sex</h1>
            </div>
            <div class="col-md-4">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                    <?php
                    // sex
                    $sex = (empty($_GET['sex'])) ? $sexdefault : $_GET['sex'];

                    $sql = "SELECT * FROM cat";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        $counter = 0;
                        echo '<select name="sex">';
                        while ($row = mysqli_fetch_assoc($result)) {
                            $selected = ($row['sex'] == $sex) ? "selected" : "";
                            echo "<option value=\"{$row['sex']}\" $selected>{$row['sex']}</option>";
                            $counter++;
                        }
                        echo '</select>';
                    } else {
                        echo "0 results";
                    }
                    ?>
                    <input type="submit" value="Search" />
                    <!-- <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="firstmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            - Gender -
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="firstmenu">
                            <li><a href="#" data-value="- Gender -">- Gender -</a></li>
                            <li><a href="#" data-value="Male">Male</a></li>
                            <li><a href="#" data-value="Female">Female</a></li>
                        </ul>
                    </div> -->
            </div>
            <div class="col-md-6">

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <h1 style="font-size: 25px;">Age</h1>
            </div>
            <div class="col-md-4">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="secondmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        - Age -
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="secondmenu">
                        <li><a href="#" data-value="action">- Age -</a></li>
                        <li><a href="#" data-value="another action">less than 6 months</a></li>
                        <li><a href="#" data-value="something else here">6 months to 1 year</a></li>
                        <li><a href="#" data-value="separated link">more than 1 year</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <h1 style="font-size: 25px;">Breed</h1>
            </div>
            <div class="col-md-4">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="thirdmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        - Breed -
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="thirdmenu">
                        <li><a href="#" data-value="action">- Breed -</a></li>
                        <li><a href="#" data-value="another action">Scottish fold</a></li>
                        <li><a href="#" data-value="something else here">American curl</a></li>
                        <li><a href="#" data-value="separated link">American short-hair</a></li>
                        <li><a href="#" data-value="separated link">Persian</a></li>
                        <li><a href="#" data-value="separated link">Maine coon</a></li>
                        <li><a href="#" data-value="separated link">Bengal</a></li>
                        <li><a href="#" data-value="separated link">Exotic</a></li>
                        <li><a href="#" data-value="separated link">Others</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">

            </div>
            <!-- <div class="input-group">
                <button type="submit" name="filter_cat" class="btn">Search</button>
            </div> -->
            <div class="col-md-4">
                <a href="/mainpage2.html" class="btn btn-outline-success btn-lg active" role="button" aria-pressed="true">Search</a>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>
    <hr>
    <h2 style="padding-left:2.5%; padding-right:2.5%">List of Cats</h2>
    <!-- Item showed -->
    <div class="container-fluid" style="padding-left: 10%; padding-right: 0%; padding-top: 5%;">
        <?php
            $sql = "SELECT * FROM cat";
            
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                echo "[{$row['id']}]: - {$row['name']} {$row['sex']} <br>";
                $counter++;
            }
            echo "$counter results";
        } else {
            echo "0 result";
        }
        
        mysqli_close($conn);
        ?>
    </div>
</body>

</html>