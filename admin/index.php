<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');

include('config.php');
if (isset($_POST['login_btn'])) {
    $email = $_POST['email'] ?? " ";
    $pass = $_POST['password'] ?? " ";
    $sql = "SELECT `username`, `email`, `pass` FROM `admin` WHERE email=:email AND pass=:pass";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':pass', $pass, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $_SESSION['admin'] = $_POST['email'];
        echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
    } else {
        echo "<script>alert('Wrong email or password. Maybe the account doesn't exist yet.');</script>";
    }
}

?>


<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                                </div>

                                <form class="user" method="post">

                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email Address...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                    </div>

                                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                                    <hr>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>




<?php
include('includes/scripts.php');
include('includes/footer.php');
?>