<?php

include("dbconnection.php"); // include database connection file and open a connection

/* $_POST data
    savedata - input submit name attribute
    firstname - input text name attribute
    lastname - input text name attribute
    email - input text name attribute
    address - textarea name attribute */

if( isset($_POST['savedata']) ) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $insert_data = mysqli_query($conn, "INSERT INTO student ( firstname, lastname, email, address) VALUES( '" . $firstname . "','" . $lastname . "','" . $email . "','" . $address . "');");

    session_start(); // start a session

    if($insert_data) {
        // success response
        $_SESSION['response_message'] = "User has been successfully registered.";
    } else {
        // failed response
        $_SESSION['response_message'] = "User creation failed.";
    }

    header("Location: index.php"); // return to main page
}

?>