<?php
$msg = "";
$css_class = "";

include('server.php');


if (isset($_POST['savecat'])) {

    $cname = $_POST['cname'];
    $profileName = time() . '_' . $_FILES['CatprofileImage']['name'];
    $breed = $_POST['breed'];
    $sex = "M";
    $color = $_POST['color'];
    $dob = $_POST['dob'];
    $desc = $_POST['desc'];

    $target = '../image/catimg/' . $profileName;

    if (move_uploaded_file($_FILES['CatprofileImage']['tmp_name'], $target)) {
        $sql = "INSERT INTO cat (name,breed,sex,color,dob,description,profile_img) VALUES ('$cname','$breed','$sex','$color','$dob','$desc','$profileName')";
        if (mysqli_query($conn, $sql)) {
            $msg =  "Image Uploaded Success and saved to Database";
            $css_class = "alert-success";
        } else {
            $msg =  "Database Error: Failed to upload";
            $css_class = "alert-danger";
        }  
    } else {
        $msg =  "Failed to upload";
        $css_class = "alert-danger";
    }
}
