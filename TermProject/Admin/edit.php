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
        * {
            box-sizing: border-box;
        }

        input[type=text],
        select,
        textarea {
            width: 30%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #a8dee0;">
        <a class="navbar-brand" href="/Admin/main.html">
            <img src="/image/caticon.png" width="30" height="30" class="d-inline-block align-top"
                alt="Need Hooman Icon">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
    <div class="container-fluid" style="margin-top: 5%; margin-left: 5%; margin-right: 5%;">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <form>
                        <input type="button" value="Back" onclick="history.back()">
                    </form>

                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="/image/cat01.jpg" alt="Cat01" style="width: 300px; height: 300px;">
                <a href="#"><button>Upload Pic</button></a>
            </div>
            <div class="col-md-6">
                <form>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="firstname" placeholder="Your name..">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="country">Sex</label>
                        </div>
                        <div class="col-75">
                            <select id="country" name="country">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Age</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="lname" name="lastname" placeholder="3 months">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Color</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="lname" name="lastname" placeholder="tri color">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="subject">Description</label>
                        </div>
                        <div class="col-75">
                            <textarea id="subject" name="subject" placeholder="Write something.."
                                style="height:200px"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <a href="/Admin/main.html">
                            <button style="background-color: #a8dee0;">Save</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>