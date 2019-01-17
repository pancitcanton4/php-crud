<?php

include("dbconnection.php"); // include database connection file and open a connection

/* $_GET data
    id - get from URL query string using $_GET method */

if( isset($_GET['id']) ) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    /* delete record */
    $delete_data = mysqli_query($conn, "DELETE FROM student WHERE user_id=" . $id . ";");

    session_start(); // start a session

    if($delete_data) {
        // success response
        $_SESSION['response_message'] = "User has been successfully deleted.";
    } else {
        // failed response
        $_SESSION['response_message'] = "User deletion failed.";
    }

    header("Location: index.php"); // return to main page
}

?>