<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Form</title>
</head>
<header>
    <a href="report.php">
        <button>See all report </button></a>

</header>

<body>
    <?php
    require_once("config.php");
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (isset($_POST['cmd']) && $_POST['cmd'] == 'add') {
        // Add new employee
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $arrive = $_POST['arrive'];
        $depart = $_POST['depart'];
        $reason = $_POST['reason'];
        if (empty($name)) {
            echo "Error: Name cannot be null";
        } else if (empty($phone)) {
            echo "Error: Phone number cannot be null";
        } else if (empty($arrive)) {
            echo "Error: Arrive time need to be specific";
        } else if (empty($depart)) {
            echo "Error: Departure time need to be specific";
        } else if (empty($reason)) {
            echo "Error: Reason cannot be null";
        } else {
            $sql = "INSERT INTO request (name,phone,arrive,depart,reason)
            VALUES ('$name','$phone','$arrive','$depart','$reason')";

            if ($conn->query($sql) === TRUE) {
                echo "Success<br/>$sql<br/>";
            } else {
                echo "Error: " . $sql . "<br/>" . $conn->error;
            }
        }
    }
    ?>
    <br>
    <h3 style="margin-left: 2%;">New Request</h3>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="margin-left: 2%;">
        <input type="hidden" name="cmd" value="add" />
        <table>
            <tr>
                <th>Name</th>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td><input type="text" name="phone"></td>
            </tr>
            <tr>
                <th>Arrival time</th>
                <td><input type="datetime-local" name="arrive"></td>
            </tr>
            <tr>
                <th>Departure time</th>
                <td><input type="datetime-local" name="depart"></td>
            </tr>
            <tr>
                <th>Reason</th>
                <td><input type="text" name="reason"></td>
            </tr>
        </table>
        <input type="submit" value="Create" />
    </form>
</body>

</html>