<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form | PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(45deg, rgb(124, 178, 121),rgb(56, 50, 50));
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-container {
            background: #fff;
            box-shadow: 0px 4px 20px rgba(2, 2, 2, 0.94);
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-wrap: wrap;
            width: 80%;
            max-width: 1200px;
        }
        .form-left, .form-right {
            padding: 30px;
            width: 100%;
            max-width: 50%;
            box-sizing: border-box;
        }
        .form-right {
            background: rgb(104, 107, 71);
            color: #fff;
        }
        .form-control, .form-select {
            border-radius: 8px;
        }
        .btn {
            border-radius: 20px;
            padding: 10px 20px;
        }
        .form-check-label a {
            color: #fff;
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            .form-left, .form-right {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php
    if (isset($_POST['create'])) {
      $title = $_POST['title'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $birthday = $_POST['birthday'];
      $gender = $_POST['gender'];
      $description = $_POST['description'];
      $address = $_POST['address'];
      $additionalinfo = $_POST['additionalinfo'];
      $zipcode = $_POST['zipcode'];
      $place = $_POST['place'];
      $country = $_POST['country'];
      $code = $_POST['code'];
      $phonenumber = $_POST['phonenumber'];
      $email = $_POST['email'];

  
      try {
            $sql = "INSERT INTO users (title, firstname, lastname, birthday, gender, description, address, additionalinfo, zipcode, place, country, code, phonenumber, email) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$title, $firstname, $lastname, $birthday, $gender, $description, $address, $additionalinfo, $zipcode, $place, $country, $code, $phonenumber, $email]);
        
            if ($result) {
                echo "Successfully saved.";
            } else {
                echo "Failed to save: " . implode(":", $stmtinsert->errorInfo());
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        
    }
    ?>

    <div class="form-container">
        <div class="form-left">
            <h4 class="mb-4">General Information</h4>
            <form action="registration.php" method="post" id="registrationForm">
                <div class="mb-3">
                    <label for="title" class="form-label"><b>Title</b></label>
                    <select class="form-select" id="title" name="title" required>
                        <option value="mr">Mr</option>
                        <option value="mrs">Mrs</option>
                        <option value="ms">Ms</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="firstname" class="form-label"><b>First Name</b></label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label"><b>Last Name</b></label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="birthday" class="form-label"><b>Birthday</b></label>
                        <input type="date" class="form-control" id="birthday" name="birthday" required>
                    </div>
                    <div class="col">
                        <label for="gender" class="form-label"><b>Gender</b></label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label"><b>Description</b></label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
        </div>

        <div class="form-right">
            <h4 class="mb-4">Contact Details</h4>
                <div class="mb-3">
                    <label for="address" class="form-label"><b>Address</b></label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="additionalinfo" class="form-label"><b>Additional Information</b></label>
                    <input type="text" class="form-control" id="additionalinfo" name="additionalinfo">
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="zipcode" class="form-label"><b>Zip Code</b></label>
                        <input type="number" class="form-control" id="zipcode" name="zipcode" required>
                    </div>
                    <div class="col">
                        <label for="place" class="form-label"><b>Place</b></label>
                        <select class="form-select" id="place" name="place" required>
                            <option value="">Select Place</option>
                            <option value="kaluthara">Kaluthara</option>
                            <option value="horana">Horana</option>
                            <option value="beruwala">Beruwala</option>
                            <option value="aluthgama">Aluthgama</option>
                            <option value="moragalla">Moragalla</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="country" class="form-label"><b>Country</b></label>
                        <select class="form-select" id="country" name="country" required>
                            <option value="">Select Country</option>
                            <option value="srilanka">Sri Lanka</option>
                            <option value="india">India</option>
                            <option value="uk">United Kingdom</option>
                            <option value="australia">Australia</option>
                            <option value="japan">Japan</option>
                        </select>
                    </div>
                <div class="row mb-2">
                    <div class="col-4">
                        <label for="code" class="form-label"><b>Code+</b></label>
                        <input type="number" class="form-control" id="code" name="code" required>
                    </div>
                    <div class="col-8">
                        <label for="phonenumber" class="form-label"><b>Phone Number</b></label>
                        <input type="number" class="form-control" id="phonenumber" name="phonenumber" required>
                    </div>
                </div>
                <div class="mb-3">
                        <label for="email" class="form-label"><b>Email</b></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="terms" required>
                    <label class="form-check-label" for="terms">
                        I accept the <a href="#">Terms and Conditions</a>.
                    </label>
                </div>
                <div class="row mb-3">
                  <div class="col text-center">
                      <button type="submit" class="btn btn-light me-3" id="register" name="create">Submit</button>
                      <a href="userlist.php" class="btn btn-light" id="userListButton">User List</a>
                  </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#registrationForm').on('submit', function(e) {
                e.preventDefault();

                if (this.checkValidity()) {
                    var formData = {
                        title: $('#title').val(),
                        firstname: $('#firstname').val(),
                        lastname: $('#lastname').val(),
                        birthday: $('#birthday').val(),
                        gender: $('#gender').val(),
                        description: $('#description').val(),
                        address: $('#address').val(),
                        additionalinfo: $('#additionalinfo').val(),
                        zipcode: $('#zipcode').val(),
                        place: $('#place').val(),
                        country: $('#country').val(),
                        code: $('#code').val(),
                        phonenumber: $('#phonenumber').val(),
                        email: $('#email').val()
                    };

                    $.ajax({
                        type: 'POST',
                        url: 'process.php',
                        data: formData,
                        success: function(response) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Successfully Registered.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'userlist.php';
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'There were errors while saving the data.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Validation Error!',
                        text: 'Please fill all required fields.',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    </script>      
</body>
</html>
