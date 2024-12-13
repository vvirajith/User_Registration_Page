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
            <form action="registration.php" method="post">
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
                      <button type="button" class="btn btn-light" id="userListButton" data-bs-toggle="modal" data-bs-target="#userListModal">User List</button>

                  </div>
                </div>

    
        </div>
    </div>


    <div class="modal fade" id="userListModal" tabindex="-1" aria-labelledby="userListModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userListModalLabel">User List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">
                        
                    </tbody>
                </table>
            </div>
          </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
       $(function(){
            $('#register').click(function(){

                  var valid = this.form.checkValidity();

                  if(valid){

                  var title = $('#title').val();
                  var firstname = $('#firstname').val();
                  var lastname = $('#lastname').val();
                  var birthday = $('#birthday').val();
                  var gender = $('#gender').val();
                  var description = $('#description').val();
                  var address = $('#address').val();
                  var additionalinfo = $('#additionalinfo').val();
                  var zipcode = $('#zipcode').val();
                  var place = $('#place').val();
                  var country = $('#country').val();
                  var code = $('#code').val();
                  var phonenumber = $('#phonenumber').val();
                  var email = $('#email').val();
      
                        e.preventDefault();

                        $.ajax({
                             type: 'POST',
                             url: 'process.php',
                             data: {title: title, firstname: firstname, lastname: lastname, birthday: birthday, gender: gender, description: description, address: address, additionalinfo: additionalinfo, zipcode: zipcode, place: place, country: country, code: code, phonenumber: phonenumber, email: email},

                             success: functional(data){

                             Swal.fire({
                                'title': 'Successful',
                                'text': 'Succesfullly Registred.',
                                'type': 'success'

                                })

                             },
                             error: functional(data){
                              Swal.fire({
                                'title': 'Errors',
                                'text': 'There were errors while saving the data.',
                                'type': 'error'

                                })
                             },
                        });
                        
                  }else{
                        ;
                  }

            });
            
            
       }); 

       $(document).ready(function () {
            $('#userListButton').click(function () {
        
               $.ajax({
                   url: 'fetch_users.php', 
                   type: 'GET',
                   success: function (response) {
                       const users = JSON.parse(response); 
                       let rows = '';
                       users.forEach(user => {
                        rows += `
                        <tr>
                            <td>${user.id}</td>
                            <td>${user.firstname} ${user.lastname}</td>
                            <td>${user.email}</td>
                            <td>${user.phonenumber}</td>
                            <td>
                                <button class="btn btn-primary btn-sm editUser" data-id="${user.id}">Edit</button>
                                <button class="btn btn-danger btn-sm deleteUser" data-id="${user.id}">Delete</button>
                            </td>
                        </tr>`;
                });
                $('#userTableBody').html(rows); 
            },
            error: function () {
                alert('Failed to fetch user data.');
            }
        });
        $(document).on('click', '.deleteUser', function () {
            const userId = $(this).data('id');
            if (confirm('Are you sure you want to delete this user?')) {
             $.ajax({
                url: 'delete_user.php',
                type: 'POST',
                data: { id: userId },
                success: function () {
                   alert('User deleted successfully.');
                   $('#userListButton').trigger('click'); 
                },
                error: function () {
                   alert('Failed to delete user.');
                }
            });
           }
        });

    });
});

    </script>      
</body>
</html>
