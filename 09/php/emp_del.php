<style>
  .box {
    border: solid 1px black;
  }
</style>
<?php
require_once("config.php");

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

<h3>Delete Employee</h3>
<?php
$sql = "SELECT * FROM employees LIMIT 10";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
?>
  <table>
    <tbody>
      <?php
      // output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
        $emp_no = $row['emp_no'];
        // echo "<form action=\"{$_SERVER['PHP_SELF']}\" method=\"POST\" id=\"form{$emp_no}\">";
        // echo "<input type='hidden' name='cmd' value='del' />";
        // echo "<input type='hidden' name='emp_no' value='{$emp_no}'/>";
        // echo "<input type='button' onclick='confirmDelete(\"form{$emp_no}\",\"{$row['first_name']}\")' value='Delete' />";
        // echo " [{$emp_no}]:  - {$row['first_name']} {$row['last_name']}";
        // echo "</form>"; 
      ?>
        <tr>
          <td class="box"><?php echo $row['first_name']; ?></td>
          <td class="box"><?php echo $row['last_name']; ?></td>
          <td class="box"><?php echo $row['birth_date']; ?></td>
          <td class="box"><?php echo $row['hire_date']; ?></td>
          <td class="box"><?php echo $row['gender']; ?></td>
        </tr>

      <?php
      }
      ?>
    </tbody>
  </table>
<?php
}

mysqli_close($conn);

// TODO Show list of departments
?>