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
    <title>Contact Page</title>
    <style type="text/css">
        /* Set the size of the div element that contains the map */
        #map {
            height: 400px;
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
        }
    </style>
    <script>
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            const uluru = {
                lat: -25.344,
                lng: 131.036
            };
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: uluru,
            });
            // The marker, positioned at Uluru
            const marker = new google.maps.Marker({
                position: uluru,
                map: map,
            });
        }
    </script>
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
                <li class="nav-item active">
                    <a class="nav-link" href="/Register_System/contact.php">Contact <span class="sr-only">(current)</span></a>
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
    <div class="container-fluid" style="margin: 10px 10px 10px 10px">
        <?php if (isset($_SESSION['username'])) : ?>
            <br>
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <h1>Contact Us</h1>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <h3>Need Hooman Co.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <p>Line : @needhooman</p>
                    <br>
                    <p>Phone : 091-2345678</p>
                    <br>
                    <p>Address : 15/1 M.1 Soi Pramae Pak kret Nontaburi, Thailand 11120</p>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13277.616709982225!2d100.55336840926253!3d13.947825355923303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e283c4873b4f6d%3A0xa02cfb5c7972d7c!2z4Lih4Li54Lil4LiZ4Li04LiY4Li04Lia4LmJ4Liy4LiZ4Liq4LiH4LmA4LiE4Lij4Liy4Liw4Lir4LmM4Liq4Lix4LiV4Lin4LmM4Lie4Li04LiB4Liy4Lij!5e0!3m2!1sth!2sth!4v1613386841408!5m2!1sth!2sth" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        <?php endif ?>
    </div>
</body>

</html>