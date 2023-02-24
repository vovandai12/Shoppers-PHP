<?php
session_start();
error_reporting(0);

include('includes/header.php');

include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $ssubject = $_POST['subject'];
    $mmessage = $_POST['message'];
    $ddate = date("Y-m-d H:i:s");
    $sql = "INSERT INTO `contact`(`firstname`, `lastname`, `email`, `subject`, `message`, `date`) 
      VALUES (:firstname, :lastname, :email, :ssubject, :mmessage, :ddate)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':ssubject', $ssubject, PDO::PARAM_STR);
    $query->bindParam(':mmessage', $mmessage, PDO::PARAM_STR);
    $query->bindParam(':ddate', $ddate, PDO::PARAM_STR);
    $query->execute();
    $msg = "Your comment was sent up ... !!!";
  }
?>

  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Contact</strong></div>
      </div>
    </div>
  </div>
  <div class="site-section">
    <div class="container">
      <div class="row">
        <?php if ($error) { ?>
          <div class="errorWrap text-danger"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
        <?php } else if ($msg) { ?>
          <div class="succWrap text-success"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
        <?php } ?>
        <div class="col-md-12">
          <h2 class="h3 mb-3 text-black">Get In Touch</h2>
        </div>
        <div class="col-md-7">

          <form method="POST" action="">

            <div class="p-3 p-lg-5 border">
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="firstname" name="firstname">
                </div>
                <div class="col-md-6">
                  <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="lastname" name="lastname">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_subject" class="text-black">Subject </label>
                  <input type="text" class="form-control" id="subject" name="subject">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_message" class="text-black">Message </label>
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <input class="btn btn-primary btn-lg btn-block" type="submit" value="Send Message" name="submit">
                </div>
              </div>
            </div>

          </form>

        </div>
        <div class="col-md-5 ml-auto">
          <div class="p-4 border mb-3">
            <span class="d-block text-primary h6 text-uppercase">New York</span>
            <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
          </div>
          <div class="p-4 border mb-3">
            <span class="d-block text-primary h6 text-uppercase">London</span>
            <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
          </div>
          <div class="p-4 border mb-3">
            <span class="d-block text-primary h6 text-uppercase">Canada</span>
            <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
          </div>

        </div>
      </div>
    </div>
  </div>
<?php
}
include('includes/footer.php');
?>