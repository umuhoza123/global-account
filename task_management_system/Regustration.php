<!-- W3hubs.com - Download Free Responsive Website Layout Templates designed on HTML5 
   CSS3,Bootstrap,Tailwind CSS which are 100% Mobile friendly. w3Hubs all Layouts are responsive 
   cross browser supported, best quality world class designs. -->

   <?php
session_start();

// Connect to the database (Replace 'your_db_host', 'your_db_username', 'your_db_password', and 'your_db_name' with your actual database credentials)
$mysqli = new mysqli('127.0.0.1', 'root', '', 'tms_db');

// Check connection
if ($mysqli->connect_errno) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and retrieve form data
    $name = $mysqli->real_escape_string($_POST['name']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $tin = $mysqli->real_escape_string($_POST['tin']);
    $company_name = $mysqli->real_escape_string($_POST['company_name']);
    $momo = $mysqli->real_escape_string($_POST['momo']);
    $phone = $mysqli->real_escape_string($_POST['phone']);
    $country = $mysqli->real_escape_string($_POST['country']);
    $district = $mysqli->real_escape_string($_POST['district']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $new_password = $mysqli->real_escape_string($_POST['new_password']);

 

    // Prepare and execute the statement using placeholders
    $sql = "INSERT INTO `system_newclient`(`name`, `email`, `tin`, `company_name`, `momo`, `phone`, `country`, `district`, `password`, `new_password`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssssssssss", $name, $email, $tin, $company_name, $momo, $phone, $country, $district, $password, $new_password);

    if ($stmt->execute()) {
        // Set the session variable for the success message
        $_SESSION['registration_success'] = true;

        // Simulate progress (you can customize the percentage based on the actual steps completed)
        $progress = 30; // Example: 30% completed after inserting data into the database

        // Redirect to myaccount.html with a success flag and progress value
        header("Location: myaccount.php?success=1&progress=$progress&email=$email&name=$name");
        exit(); // Make sure to add the exit() function to stop further script execution
    } else {
        // Set the session variable for the error message
        $_SESSION['registration_error'] = true;

        // Redirect to myaccount.html with an error flag
        header("Location: Regustration.php?error=1&email=$email&name=$name");
        exit();
    }

    $stmt->close();

    // Close the database connection
    $mysqli->close();
}
?>





   <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <title>Registration Form</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            height: 100vh;
            font-family: "Nunito Sans";
        }

        .form-control {
            line-height: 2;
        }

        .bg-custom {
            background-color: #7BB9DC;
        }

        .btn-custom {
            background-color: #33313f;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #33313f;
            color: #fff;
        }

        label {
            color: #fff;
        }

        a,
        a:hover {
            color: #fff;
            text-decoration: none;
        }

        a,
        a:hover {
            text-decoration: none;
        }

        @media(max-width: 932px) {
            .display-none {
                display: none !important;
            }
        }

        .done {
            color: white;
            font-size: 48px;
            /* Increase the font size as desired */
            font-family: "Arial", sans-serif;
            /* Change the font family to your preferred style */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            /* Add a subtle text shadow for a beautiful effect */
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="row m-0 h-100">
        <div class="col p-0 text-center d-flex justify-content-center align-items-center display-none">
            <img src="./img/undraw_access_account_re_8spm (1).svg" class="w-100">
        </div>
        <div class="col p-0 bg-custom d-flex justify-content-center align-items-center flex-column w-100">
            <form action="" method="post">
                <div class="m-5 text-center done">
                    <h1> Welcome to Ishyiga software
                    </h1>

                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Full name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="username"
                        required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">TIN:</label>
                    <input type="text" class="form-control" id="tin" name="tin" placeholder="Tin Number" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Company Name:</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="name of company"
                        required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="email" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Momo</label>
                    <input type="text" class="form-control" id="momo" name="momo" placeholder="momo code">
                </div>
                <!-- <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Momo</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="cofirmPassword"
                        required> -->
                <!-- </div> -->
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="078XXXXXXXX"
                        required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Country:</label>
                    <input type="text" class="form-control" id="country" name="country"
                        placeholder="e.g:Rwanda" required>
                </div>
                
                <button type="submit" class="btn btn-custom btn-lg btn-block mt-3">Submit</button>
                <!-- <input type="submit" value="Submit"> -->
                <!-- <button type="button" class="btn btn-custom btn-lg btn-block mt-3">Register
                        Now</button> -->
                <p class="text-center">
                    if it is not first click here to continue to complete profile
                    <a href="login.php">Back</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>