<?php
include('databse.php');
include('techleftdash.php');
if (isset($_SESSION['user'])) {
    $driver = $_SESSION['user'];
    $sql = "SELECT * FROM `book now` WHERE assigneddriver='$driver'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['response'])) {
    // Get the ID and response from the form
    $response = mysqli_real_escape_string($conn, $_POST['response']);
    $id = $_POST['id'];  // Get the 'id' from the form submission
    // Update the response for the given ID
    $sql1 = "UPDATE `book now` SET `response` = '$response' WHERE id = '$id'";
    $result3 = mysqli_query($conn, $sql1);   
}
?>
<title>REQUEST</title>
<style>
          .infodash table  td{
            padding:5px;}
            .infodash table th{
                padding:3px;}
</style>
<div class="infodash">
    <div class="dashbox1">
        <h3>REQUESTS</h3>
    </div>
    <table style="border-collapse: collapse;">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>MOBILE</th>
            <th>LOCATION</th>
            <th>VEHICLE TYPE</th>
            <th>DATE</th>
            <th>ADD RESPONSE</th>
            <th>STATUS</th>
        </tr>
        <?php
        while ($data = mysqli_fetch_assoc($result)) {  
            ?>
            <tr>
                <td><?php echo $data['id'] ?></td>
                <td><?php echo $data['NAME'] ?></td>
                <td><?php echo $data['EMAIL'] ?></td>
                <td><?php echo $data['mobile'] ?></td>
                <td><?php echo $data['LOCATION'] ?></td>
                <td><?php echo $data['VEHICLE TYPE'] ?></td>
                <td><?php echo $data['date'] ?></td>
                <td>
                    <form method="POST" action="techrequest.php">
                        <!-- Hidden input to pass the ID of this specific row -->
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">     
                        <!-- Dropdown for selecting the response -->
                        <select name="response" id="response">
                            <option value="">ADD RESPONSE</option>
                            <option value="ON THE WAY">ON THE WAY</option>
                            <option value="COMPLETED">COMPLETED</option>
                        </select>
                        <input type="submit" name="add" id="responsebtn" value="ADD">
                    </form>
                </td>
                <td><?php echo $data['response'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
