<html lang="en">
<head>
       <style>
            * {
                margin:5px;
            }

            .recordlist {
                margin:10px;
            }
        </style>
</head>
<body>
    <!-- create form -->
    <form action="create.php" method="post">
        <?php
            session_start();
            if(isset($_SESSION['response_message'])) {
                echo $_SESSION['response_message'];
                unset($_SESSION['response_message']);
            }
        ?>
        <h3>Registration Form</h3>
        <p>FirstName: <input type="text" name="firstname" placeholder="First Name"></p>
        <p>LastName: <input type="text" name="lastname" placeholder="Last Name"></p>
        <p>Email: <input type="text" name="email" placeholder="Type your email"></p>
        <p>Address: <textarea name="address" placeholder="Type your address"></textarea></p>
        <input type="submit" name="savedata" value="Save Data" />
    </form>

    <!-- record list -->
    <table class="recordlist" border=1>
        <thead>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>Address</th>
            <th>Action</th>
        </thead>
        <tbody>

            <?php
            include 'retrieve.php';
            ?>
        </tbody>
    </table>
</body>
</html>