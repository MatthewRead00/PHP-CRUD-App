<?php
// Include config file
require_once "dbinfo.php";
 
// Define variables and initialize with empty values
$image = "";
$fName = "";
$lName = "";
$email = "";
$phone = "";

$image_err = "";
$fName_err = "";
$lName_err = "";
$email_err = "";
$phone_err = "";
                            

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate Image
    $target = "images/".basename($_FILES['image']['name']);

    $input_image = $_FILES['image']['name'];
    if(empty($input_image)){
        $image_err = "*Error. Please include an image.";     
    } else{
        $image = $input_image;
    }

    move_uploaded_file($file_tmp, "images/" . $input_image);

    // Validate First Name
    $input_fName = trim($_POST["fName"]);
    if(empty($input_fName)){
        $fName_err = "*Error. Please enter your first name.";     
    } else{
        $fName = $input_fName;
    }

    // Validate Last Name
    $input_lName = trim($_POST["lName"]);
    if(empty($input_lName)){
        $lName_err = "*Error. Please enter your last name.";     
    } else{
        $lName = $input_lName;
    }

    // Validate Email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "*Error. Please enter your email address.";
    } else {
        $email = $input_email;
    }

    // Validate Phone Number
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "*Error. Please enter your phone number.";     
    } else if (!preg_match('/^[0-9]{10}+$/', $input_phone)) {
        $phone_err = "*Error. Please enter a valid phone number.";  
    } else {
        $phone = $input_phone;
    }
    
    // Check input errors before inserting in database
    if(empty($image_err) && empty($fName_err) && empty($lName_err) && empty($email_err) && empty($phone_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO contact_info (image, fName, lName, email, phone) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_image, $param_fName, $param_lName, $param_email, $param_phone);
            
            // Set parameters
            $param_image = $image;
            $param_fName = $fName;
            $param_lName = $lName;
            $param_email = $email;
            $param_phone = $phone;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="mt-5">Add Contact:</h2>
                    <p>Please fill this form and submit to add a contact to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Image:</label>
                            <input type="file" name="image" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $image; ?>">
                            <span class="invalid-feedback"><?php echo $image_err;?></span>



                            <!--Move image into folder code-->
                            <?php
                                /*$image_file = $_FILES['image']['name'];*/
                                
                                /*if ( isset( $_POST["Submit"] ) ) {
                                    move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image_file);
                                }*/



                                /*if(isset($_FILES['image']['name'])){
                                    $file_name = $_FILES['image']['name'];
                                    $file_tmp = "uploads/$file_name";
                                    move_uploaded_file($file_tmp, "uploads/" . $file_name);
                                        echo "Stored in: " . "uploads/" . $_FILES["image"]["name"];
                                }*/
                            ?>
                            

                        </div>
                        <div class="form-group">
                            <label>First Name:</label>
                            <input type="text" name="fName" class="form-control <?php echo (!empty($fName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fName; ?>">
                            <span class="invalid-feedback"><?php echo $fName_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Last Name:</label>
                            <input type="text" name="lName" class="form-control <?php echo (!empty($lName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lName; ?>">
                            <span class="invalid-feedback"><?php echo $lName_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Email Address:</label>
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Phone Number:</label>
                            <input type="phone" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                            <span class="invalid-feedback"><?php echo $phone_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>