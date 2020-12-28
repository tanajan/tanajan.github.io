<!DOCTYPE html>
<html>
<body>
<?php

$userList = array(
    array( "u" => "jack", "p" => "jack123"),
    array( "u" => "jane", "p" => "jane123")
);

$user = $_POST['user'];
$password = $_POST['password'];
$isLoggedIn = FALSE;
foreach($userList as $rec) {
    if ($user == $rec['u'] && $password == $rec['p']) {
        $isLoggedIn = True;
        break;
    }
}

if ($isLoggedIn) {
    echo "Login Success";
} else {
    echo "Login Failed";
}

?>
</body>
</html>