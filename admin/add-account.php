<?php
session_start();
error_reporting(0);

include('includes/header.php');
include('includes/navbar.php');

include('config.php');
if (strlen($_SESSION['admin']) == 0) {
    header('location:index.php');
} else {
    $id = intval($_GET['id']);
    if (isset($_POST['Update'])) {
        $user = $_POST['userName'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $sql = "UPDATE `user` SET `username`=:user,`email`=:email,`password`=:pass WHERE `id`=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':user', $user, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':pass', $pass, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "User Updated Successfully";
    }

    $id = intval($_GET['id']);
    $sql = "SELECT * FROM `user` WHERE `id`=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {    ?>
            <?php
            $uuser = htmlentities($result->username);
            $eemail = htmlentities($result->email);
            $ppass = htmlentities($result->password);

            if (isset($_POST['Reset'])) {
                $uuser = "";
                $eemail = "";
                $ppass = "";

                $msg = "User Reset Successfully";
            }

            if (isset($_POST['Delete'])) {
                $sql = "DELETE FROM `user` WHERE `id`=:id";
                $query = $dbh->prepare($sql);
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();

                $uuser = "";
                $eemail = "";
                $ppass = "";

                $msg = "User Delete Successfully";
            }

            if ($error) {
            ?><div class="errorWrap text-danger"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
            else if ($msg) { ?><div class="succWrap text-success"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
            <?php
            ?>
            <form action="" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> UserName </label>
                        <input type="text" name="userName" class="form-control" placeholder="Enter UserName" value="<?php echo $uuser ?>">
                    </div>

                    <div class="form-group">
                        <label> Email </label>
                        <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $eemail ?>">
                    </div>

                    <div class="form-group">
                        <label>PassWorld</label>
                        <input type="password" name="pass" class="form-control" placeholder="Enter PassWorld" value="<?php echo $ppass ?>">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="Delete" class="btn btn-warning">Delete</button>
                    <button type="submit" name="Update" class="btn btn-success">Update</button>
                    <button type="submit" name="Reset" class="btn btn-info">Reset</button>
                    <button type="submit" name="Save" class="btn btn-primary">Save</button>
                </div>
            </form>

<?php
        }
    }
}
include('includes/scripts.php');
include('includes/footer.php');
?>