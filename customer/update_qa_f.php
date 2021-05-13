<?php
session_start();
include "../db_conn.php";
// initializing variables
$QA = "";
$errors = array();

if (isset($_POST['edit_QA'])) {
    // echo "OK";
    // receive all input values from the form
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $QA = mysqli_real_escape_string($db, $_POST['QA']);


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($QA)) {
        // array_push($errors, "House name is required");
        header("Location: ./update_qa.php?id=$id&error=Q/A is required");
    } else {
        $query = "UPDATE Q_A  SET QA = '$QA'
                                WHERE id = '$id'";
        $result = mysqli_query($db, $query);
        // var_dump($query);
        // var_dump($result);
        // mysqli_query($db, $query);
        // $_SESSION['c_username'] = $c_username;
        // $_SESSION['success'] = "You are now logged in";
        if ($result) {
            header("Location: ./customer_profile.php?success=successfully update");
        } else {
            header("Location: ./customer_profile.php?error=unknown error occurred&$user_data");
        }
        // header('location: ../sys_dashboard.php');
    }
} else {
    header("Location: ./customer_profile.php");
    //var_dump($_POST);
    // echo "No";
}