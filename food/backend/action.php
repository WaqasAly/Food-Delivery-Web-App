<?php
include_once("database.php");
include_once("userCRUD.php");
session_start();
$email = $_SESSION['email'];

if (isset($_POST["signUp"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $person = "customer";

    $query2 = "Select * from credentials where email='$email'";
    $res2 = db::getRecord($query2);

    if ($password != $cpassword) {
        echo "<script> alert('password and confirm password are not same')</script>";
        echo "<script>location='../register.php'</script>";
    } elseif ($res2 != null) {
        echo "<script> alert('email already exists')</script>";
        echo "<script>location='../register.php'</script>";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query3 = "INSERT INTO credentials(fname,lname,email,password,person) VALUES ('$fname','$lname','$email','$password','$person')";
        $res3 = db::insertRecord($query3);
        $adress = "0";
        $query = "SELECT * FROM credentials WHERE email = '$email'";
        $res = db::getRecord($query);
        if ($res != null) {
            $id = $res['id'];
            $query1 = "INSERT INTO customer(user_id,adress) VALUES ('$id','$adress')";
            $res1 = db::insertRecord($query1);
        }
        if ($res3 != null) {
            echo "<script>location='../login.php'</script>";
        } else {
            echo "<script >alert('Server error')</script>";
            echo "<script>location='../register.php'</script>";
        }
    }
}
if (isset($_POST["login"])) {
    /*save data of form in var*/
    $email = $_POST["email"];
    $password = $_POST["password"];


    if (userCrud::checkUser($email, $password) == 1) {
        $_SESSION["email"] = $email;
        $temp = userCrud::getPerson($email);
        if ($temp == "admin") {
            echo "<script>location='../../foodAdmin/dashboard.php'</script>";
        } elseif ($temp == "rider") {
            echo "<script>location='../../foodAdmin/driverHome.php'</script>";
        } else {
            echo "<script>location='../index.php'</script>";
        }
    } else {
        echo "<script>alert('wrong email or password')</script>";
        echo "<script>location='login.php?status=1'</script>";
    }
}
if (isset($_POST["submitAdress"])) {
    if ($_POST["adress"] != null) {
        $adress = htmlspecialchars($_POST['adress'], ENT_QUOTES);
        $query = "SELECT * FROM credentials WHERE email = '$email'";
        $res = db::getRecord($query);
        $id = $res['id'];
        $query = "UPDATE customer SET adress='$adress' WHERE user_id='$id'";
        $res = db::insertRecord($query);

        echo "<script>location='../userAccount.php?status=1'</script>";

    }

}
if (isset($_POST['contact'])) {

    // Output messages
    $responses = [];
    // Check if the form was submitted
    if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['subject'], $_POST['message'])) {
        // Process form data

        // Assign POST variables

        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
        $phone = htmlspecialchars($_POST['phone'], ENT_QUOTES);
        $address = htmlspecialchars($_POST['subject'], ENT_QUOTES);
        $my_msg = htmlspecialchars($_POST['message'], ENT_QUOTES);

        if (strlen($name) == 0 || strlen($email) == 0 || strlen($phone) == 0 || strlen($my_msg) == 0) {

            $responses[] = 'Error! Please Fill All Fields!';
        }
        // Validate email adress
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $responses[] = 'Email is not valid!';
        }
        // First name must contain only alphabet characters.
//if (!preg_match("/^([a-zA-Z' ]+)$/", $full_name)) {
//	$responses[] = 'Your name must contain only letters and spaces!';
//}

        // If there are no errors
        if (!$responses) {
            // Where to send the mail? It should be your email address
            $to = 'ubf16371@gmail.com';
            // Mail from
            $from = $email;
            // Mail subject
            $subject = $name . ' ' . 'Inquiry Message Received';
            // Mail headers
            $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $email . "\r\n" . 'Return-Path: ' . $email . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n" . 'Message: ' . "\r\n" . $my_msg;
            // Capture the email template file as a string
            ob_start();

            $emailfilepath = $_SERVER['DOCUMENT_ROOT'];
            $emailfilepath .= "../email-template.php";

            $email_template = ob_get_clean();
            // Try to send the mail
            if (mail($to, $subject, $email_template, $headers)) {
                // Success
                $responses[] = 'Thank you! Your Inquiry is Received.';
            } else {
                // Fail; problem with the mail server...
                $responses[] = 'Message could not be sent! Please check your mail server settings!';
            }
        }
    }
    echo "<script>location='../contact_us.php'</script>";
}


?>