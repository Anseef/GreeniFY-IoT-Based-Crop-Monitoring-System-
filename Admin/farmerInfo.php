<?php 
    session_start();
    include "../connection.php";
    if (isset($_SESSION['farmID'])) {
        $currentFarmID =$_SESSION['farmID'];
        $farmerQuery = "SELECT * FROM signup WHERE farmID = $currentFarmID";
        $farmerResult = mysqli_query($conn, $farmerQuery);
        if (mysqli_num_rows($farmerResult) > 0) {
            echo "
                <tr>
                    <th>NAME</th>
                    <th>CONTACT</th>
                    <th>DATE OF JOINED</th>
                </tr>";
            while ($farmerData = mysqli_fetch_assoc($farmerResult)) {
                echo "
                <tr>
                    <td>".$farmerData['username']."</td>
                    <td>".$farmerData['mobilenumber']."</td>
                    <td>".$farmerData['DOJ']."</td>
                    <td>
                        <form action='' method='post'>
                            <input type='hidden' name='userId' value='".$farmerData['id']."'>
                            <button type='submit' name='removeBtn'>Remove</button>
                        </form>
                    </td>
                </tr>";
            }
        }else{
            echo "<span>No Farmers Working</span>";
        }
        if(isset($_POST['removeBtn'])){
            $userID = $_POST['userId'];
            $deleteQuery = "DELETE FROM signup WHERE id = $userID";
            if (mysqli_query($conn, $deleteQuery)) {
            // Row deleted successfully
            header("refresh:0");
            } else {
            // Handle any errors if the deletion fails
            echo "Error: " . mysqli_error($conn);
            }
        }
    }
?>
