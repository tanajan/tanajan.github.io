<?php
session_start();
include('server.php');
include('processForm.php');
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
        .form-div {
            margin-top: 100px;
            border: 1px solid #e0e0e0;
            padding-top: 15px;
        }

        #profileDisplay {
            display: block;
            width: 60%;
            margin: 10px auto;
            border-radius: 50%;
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
                    <a class="nav-link active" href="/Admin/add.php">Add</a>
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
    <div class="container-fluid" style="padding-left: 10%; padding-right: 10%; padding-top: 2.5%; margin-bottom: 5%;">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">
                <form action="add.php" method="post" enctype="multipart/form-data">
                    <h3 class="text-center">Create Cat Profile</h3>

                    <?php
                    if (!empty($msg)) : ?>

                        <div class="alert <?php echo $css_class; ?>">
                            <?php echo $msg; ?> 
                        </div>

                    <?php endif; ?>


                    <div class="form-group text-center">
                        <img src="../image/catimg/catdefault.jpg" onclick="triggerClick()" id="profileDisplay">
                        <label for="CatprofileImage">Profile Image</label>
                        <input type="file" name="CatprofileImage" onchange="displayImage(this)" id="CatprofileImage" style="display:none;">
                    </div>
                    <div class="form-group">
                        <label for="cname">Cat name</label>
                        <textarea name="cname" id="cname" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="breed">Breed</label>
                        <textarea name="breed" id="breed" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <!-- <label for="sex">Sex</label>
                        <div class="row">

                            <div class="col-md-6">
                                <p class="text-center">M</p>
                                <input type="radio" name="sex" value="M" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <p class="text-center">F</p>
                                <input type="radio" name="sex" value="F" class="form-control">
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <textarea name="color" id="color" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" name="dob" value="<?php echo date("Y-m-d"); ?>">
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea name="desc" id="desc" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="savecat" class="btn btn-primary btn-block">Save Cat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="script.js">


    </script>

</body>

</html>