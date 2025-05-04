<?php
include('databse.php');
include('leftdash.php');

$sql = "SELECT * FROM `book now`";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the booking ID and driver ID from the form submission
    if (isset($_POST["driver_id"]) && isset($_POST["booking_id"])) {
        $driverid = $_POST['driver_id'];
        $booking_id = $_POST['booking_id'];

        // Update the booking with the selected driver
        $sql = "UPDATE `book now` SET `assigneddriver` = '$driverid' WHERE `id` = '$booking_id'";
        $result3 = mysqli_query($conn, $sql);
    }

   
}

?>

<style>
      
      .infodash table th{
          padding:12px;}
          .infodash table td{
              padding:10px;}
      </style>

<title>ASSIGN REQUEST</title>
<div class="infodash">
    <div class="dashbox1">
        <h3> ASSIGN REQUESTS</h3>
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
            <th>ASSIGN</th>
        </tr>

        <?php
        while ($data = mysqli_fetch_assoc($result)) {
        ?>

        <tr>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['NAME']; ?></td>
            <td><?php echo $data['EMAIL']; ?></td>
            <td><?php echo $data['mobile']; ?></td>
            <td><?php echo $data['LOCATION']; ?></td>
            <td><?php echo $data['VEHICLE TYPE']; ?></td>
            <td><?php echo $data['date']; ?></td>

            <td>
                <form method="POST" action="assign.php">
                    <select id="assigndriver" name="driver_id">
                        <option value="">ASSIGN
                        </option>

                        <?php
                        // Fetch available drivers
                        $sql2 = "SELECT * FROM `driver`";
                        $result2 = mysqli_query($conn, $sql2);
                        while ($data2 = mysqli_fetch_assoc($result2)) {
                    
                        ?>
                        <option value="<?php echo $data2['driverid']; ?>"><?php echo $data2['driverid']; ?></option>
                        <?php
                        }
                        ?>
                    </select>

                    <!-- Hidden input to pass booking ID -->
                    <input type="hidden" name="booking_id" value="<?php echo $data['id']; ?>">
                    
                    <input type="submit" id="assignsubmit" value="ASSIGN">
                    
    
                </form>
            </td>
        </tr>

        <?php
        }
        ?>
    </table>
</div>
