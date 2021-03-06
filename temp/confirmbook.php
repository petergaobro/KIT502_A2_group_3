<?php include('booking_server.php');
// session_start();
// include "../db_conn.php";

// $house_city = "";
// $house_checkin = "";
// $house_checkout = "";
// $house_guest = "";

// $b_first_name = "";
// $b_last_name = "";
// $b_email = "";
// $b_mobile = "";
// $errors = array();

// if (isset($_GET['id'])) {

//     function validate($data)
//     {
//         $data = trim($data);
//         $data = stripslashes($data);
//         $data = htmlspecialchars($data);
//         return $data;
//     }

//     $id = validate($_GET['id']);

//     $sql = "SELECT * FROM house WHERE id=$id";
//     $result = mysqli_query($db, $sql);
//     if (mysqli_num_rows($result) > 0) {
//         $row = mysqli_fetch_assoc($result);
//     } else {
//         header("Location: ../login_book.php");
//     }
// }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Booking confirm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>

<body>
    <div class="header">
        <h2>Booking confirm</h2>
    </div>
    <form method="post" action="booking_server.php">

        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>

        <input type="text" name="id" value="<?php echo $id; ?>" ; hidden>
        <div class="input-group">
            <label>City</label>
            <input type="text" name="house_city" value="<?= $row['house_city'] ?>">
        </div>

        <div class="input-group">
            <label>Check in date</label>
            <input type="text" name="house_checkin" value="<?= $row['house_checkin'] ?>">
        </div>

        <div class="input-group">
            <label>Check out date</label>
            <input type="text" name="house_checkout" value="<?= $row['house_checkout'] ?>">
        </div>
        <div class="input-group">
            <label>Guest</label>
            <input type="number" name="house_guest" value="<?= $row['house_guest'] ?>">
        </div>

        <div class="input-group">
            <label>First name</label>
            <input type="text" name="b_first_name" value="<?php echo $b_first_name; ?>">
        </div>
        <div class="input-group">
            <label>Last name</label>
            <input type="text" name="b_last_name" value="<?php echo $b_last_name; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="b_email" value="<?php echo $b_email; ?>">
        </div>
        <div class="input-group">
            <label>Mobile</label>
            <input type="text" name="b_mobile" value="<?php echo $b_mobile; ?>">
        </div>
        <div class="input-group">

            <!-- <button type="submit" class="btn btn-primary" name="edit_cust">Update</button> -->
            <button type="submit" class="btn btn-primary" name="confirm_book">Confirm</button>
            <a href="./review.php" class="link-primary">Review</a>
        </div>
    </form>
</body>

</html>