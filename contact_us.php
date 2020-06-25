<?php
include 'database.php';
$data = new Databases;
$success_message = '';

//validation
$name_error = '';
$email_error = '';
$message_error = '';
$output_error = '';




if (isset($_POST["submit"])) {
    if (empty($_POST["cus_name"])) {
        $name_error = "<p>Place Enter Name</p>";
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $_POST["cus_name"])) {
            $name_error = "<p>Only Letters and whitespace allowed</p>";
        }
    }

    if (empty($_POST["email"])) {
        $email_error= "<p>Place Enter Email</p>";
    } else {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email_error = "<p>Invalid Email formate</p>";
        }
    }

    if (empty($_POST["message"])) {
        $message_error = "<p>Place Enter Message</p>";
    }

    if ($name_error == "" && $email_error == "" && $message_error == "") {
        $insert_data = array(
            'cus_name' => mysqli_real_escape_string($data->con, $_POST['cus_name']),
            'email' => mysqli_real_escape_string($data->con, $_POST['email']),
            'message' => mysqli_real_escape_string($data->con, $_POST['message'])
        );
        if ($data->insert('contact_us', $insert_data)) {
            $success_message = 'Record Inserted';
        }
    }
}
?> 




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Contact Us</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <style>
            .bs-example{
                margin: 20px;        
            }
        </style>
    </head>
    <body>
        <div class="container text-center">
            <h3>Contact Us</h3>
        </div>
        <div class="bs-example">
            <form  method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="cus_name" class="form-control"  id="cus_name" placeholder="name">
                    <span class="text-danger"><?php echo $name_error; ?></span> 
                </div>

                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" >
                    <span class="text-danger"><?php echo $email_error; ?></span>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" rows="5" id="message" placeholder="Message" ></textarea>
                    <span class="text-danger"><?php echo $message_error; ?></span> 
                </div>

                <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Submit">
                <span class="text-success">  
<?php
if (isset($success_message)) {
    echo $success_message;
}
?>  
                </span>  

            </form>
        </div>
    </body>
</html> 