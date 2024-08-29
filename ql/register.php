<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //$college_id = $_POST['college_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $contact_number1 = $_POST['contact_number1'];
    $contact_number2 = $_POST['contact_number2'];
    $college = $_POST['college'];
    $street = $_POST['street'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $image = $_FILES["image"]["name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);

    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quiz";

    try {
        // Create a PDO instance
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set PDO to throw exceptions on error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL query to insert data
        $sql = "INSERT INTO registration ( first_name, last_name, email, password, gender, dob, contact_number1, contact_number2, college, street, city, state, pincode, image_path) 
                VALUES ( :first_name, :last_name, :email,:password, :gender, :dob, :contact_number1, :contact_number2, :college, :street, :city, :state, :pincode, :target_file)";

        // Prepare the statement
        $stmt = $pdo->prepare($sql);
       // $stmt->bindParam(':college_id', $college_id);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $pwd);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':contact_number1', $contact_number1);
        $stmt->bindParam(':contact_number2', $contact_number2);
        $stmt->bindParam(':college', $college);
        $stmt->bindParam(':street', $street);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':pincode', $pincode);
        
        $stmt->bindParam(':target_file', $target_file);
        $stmt->execute();

        // Check if the directory exists, if not create it
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            //header("Location: display.php?email=" . $email);
            //header("Location: start.php");
            echo "<body style='background-image: url(s);'>
            <div class='container' align='center'>
            <h1 align='center''>Successful.</h1>
            <h1 align='center' '>You have been registered successfully.....</h1>
            <a href='registereduser_details.php' class='ctn' align='center' color='green'>Let's start</a>
            </div>
            </body>";
        
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } catch (PDOException $e) {
        die("Error: Could not insert data. " . $e->getMessage());
        //echo"Email id already redisterd !....";
    }

    // Close the PDO connection
    $pdo = null;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>User Registration</title>
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="css/reg_style.css">
    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://www.google.com/recaptcha/api.js?render=6Lerz7kUAAAAAFviVfTF2XuO7qlmNZaScpGY0NDw"> </script>
    <script src = "scripts/captcha.js"></script>
  </head>
  <style>
    .pdc{
  padding: 7px;
  border-radius: 15px;
  font-weight: 800;
  font-size: 14px;
}
    </style>
  <body>
    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
            <div class="register-left">
              <img src="img\news2.jpg">
              <h1>welcome to online Quiz</h1><br><br>
              <h4>if already registered check here</h4>
              <button type="button" class="btn btn-primary"> <a href='registereduser_details.php' class ='ctn' align='center' color='green'>let's start</a></button>
 
            </div>
            </div>

            <div class="<col-md-6 register-right">
              <h2>Register Here</h2>
              <form action="" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                  
                    <input class="pdc" type="text" id="firstname" name="first_name" placeholder="User First Name" required>
                </div>
                <div class="form-group">
                   
                    <input class="pdc" type="text" id="lastname" name="last_name" placeholder="User Last Name" required>
                </div>
                <div class="form-group">
                  
                    <input class="pdc" type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                  
                    <input class="pdc" type="password" id="password" name="password" placeholder="favorite programminglanguage name" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label><br>
                    <input class="pdc" type="radio" name="gender" value="male"> Male
                    <input type="radio" name="gender" value="female"> Female
                </div>
                <div class="form-group">
                    
                    <input class="pdc" type="date" id="dob" name="dob" placeholder="Date of Birth" required>
                </div>
                <div class="form-group">
                    <input class="pdc" type="number" id="contact1" name="contact_number1" placeholder="Contact Number 1" required>
                </div>
                <div class="form-group">
        
                    <input class="pdc" type="number" id="contact2" name="contact_number2" placeholder="Contact Number 2" required>
                </div>
                <div class="form-group">
                   
                    <input class="pdc" type="text" id="college" name="college" placeholder="College Name" required >
                </div>
                
                <div class="form-group">
                   
                    <input class="pdc" type="text" id="street" name="street"placeholder="Street Address" required>
                </div>
                <div class="form-group">
                    
                    <input class="pdc" type="text" id="state" name="state" placeholder="State"required>
                </div>
                <div class="form-group">
                   
                    <input class="pdc" type="text" id="city" name="city" placeholder="City"required>
                </div>
                <div class="form-group">
                    
                    <input class="pdc" type="number" id="pincode" name="pincode"placeholder="Pincode:" required pattern="[0-9]{6}" title="Pincode must be 6 digits">
                </div>
                <div class="form-group">
                    <label for="image">Upload Image:</label><br>
                    <input class="pdc" type="file" id="image" name="image" accept="image/*" required>
                </div>
                <br><br>
                <button class="pdc sbt"  >submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>



</body>
</html>

