<?php
    include("dbconnection.php");
?>
<!-- create form -->
<form action="update.php" method="post">
    <?php
        session_start();
        if(isset($_SESSION['response_message'])) {
            echo $_SESSION['response_message'];
            unset($_SESSION['response_message']);
        }
    ?>
    <?php
        if(isset($_GET['id']) && $_GET['id'] != 0) {
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $get_user_info = mysqli_query($conn, "SELECT * FROM student WHERE user_id=" . $id); // get user with id =1
            $row = mysqli_fetch_row($get_user_info); // get user data and pass to array
    ?>

    <!-- This form will show if the above code is true -->
    <h3>Edit User Information</h3>
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <p>FirstName: <input type="text" name="firstname" placeholder="First Name" value="<?php echo $row[1]; ?>"></p>
    <p>LastName: <input type="text" name="lastname" placeholder="Last Name" value="<?php echo $row[2]; ?>"></p>
    <p>Email: <input type="text" name="email" placeholder="Type your email" value="<?php echo $row[3]; ?>"></p>
    <p>Address: <textarea name="address" placeholder="Type your address"><?php echo $row[4]; ?></textarea></p>
    <input type="submit" name="savedata" value="Update Data" />

    <?php
        }
    ?>
    <a href="index.php">Back to Main Page</a>
</form>