<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Form</title>
</head>
<style>
.box {
    border: solid 1px black;
}

.center {
    margin-left:auto;
    margin-right:auto;
}
</style>
<body>
<?php
require_once("config.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<?php
if (isset($_POST['cmd']) && $_POST['cmd'] == 'del') {
  // Delete employee
  $id = $_POST['id'];
  $sql = "DELETE FROM request WHERE id = $id";

  if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_connect_error();
  }
}
?>
<a href="index.php">
<button>Request ! </button></a>
<br>
<h3>Report Form</h3>
<?php
$sql = "SELECT * FROM request";
$result = mysqli_query($conn,$sql);

?>
<?php
if (mysqli_num_rows($result) > 0) {
    ?>
<table style="margin-left: 2%;">
<thead style="background-color: #ECE4D0;">
        <td class="box">
            Request Id
        </td>
        <td class="box">
            Name
        </td>
        <td class="box">
            Phone
        </td>
        <td class="box">
            Arrival Time
        </td>
        <td class="box">
            Departure Time
        </td>
        <td class="box">
            Reason
        </td>
        <td class="box">
            create At
        </td>
    </thead>
    <tbody>
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
           <tr>
                <td class="box">
                <?php echo $row['id']; ?>  
                </td>

                <td class="box">
                <?php echo $row['name']; ?>  
           </td>
                <td class="box">
                <?php echo $row['phone']; ?>  
           </td>
                <td class="box">
                <?php echo $row['arrive']; ?>  
           </td>
                <td class="box">
                <?php echo $row['depart']; ?>  
           </td>
                <td class="box">
                <?php echo $row['reason']; ?>  
           </td>
                <td class="box">
                <?php echo $row['createAt']; ?>  
           </td>
           <td>
           <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form<?php echo $row['id']; ?>">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                    <input type="hidden" name="cmd" value="del" />
                </form>
                <button onclick="confirmDelete('form<?php echo $row['id']; ?>', '<?php echo $row['name']; ?>')">
                    <img src="../images/bin-removebg-preview.png" style="width: 20px; height:20px">
                </button>
                
           </td>
           <?php
            } ?>
    </tbody>
</table>
<?php
}
?>
<script>
function confirmDelete(formId, name) {
    if (confirm(`Are you sure to delete ${name}?`)) {
        // alert(`Delete ${formId}`);
        document.getElementById(formId).submit();
    }
}
</script>
</body>
</html>