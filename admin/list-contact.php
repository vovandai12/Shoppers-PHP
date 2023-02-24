<?php
session_start();
error_reporting(0);

include('includes/header.php');
include('includes/navbar.php');

include('config.php');
if (strlen($_SESSION['admin']) == 0) {
  header('location:index.php');
} else {
    
    
if ($error) {
?><div class="errorWrap text-danger"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
else if ($msg) { ?><div class="succWrap text-success"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
            
  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">

        <div class="table-responsive">

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th> ID </th>
                <th> FirstName </th>
                <th>LastName</th>
                <th>Email</th>
                <th>Subject </th>
                <th>Message </th>
                <th>Date</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $id = intval($_GET['id']);
                $sql = "DELETE FROM `contact` WHERE `id`=:id";
                $query = $dbh->prepare($sql);
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();
                header('location:list-contact.php');
           
              $sql = "SELECT * from `contact`";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = 1;
              if ($query->rowCount() > 0) {
                foreach ($results as $result) {  ?>
                  <tr>
                    <td><?php echo htmlentities($cnt); ?></td>
                    <td><?php echo htmlentities($result->firstname); ?></td>
                    <td><?php echo htmlentities($result->lastname); ?></td>
                    <td><?php echo htmlentities($result->email); ?></td>
                    <td><?php echo htmlentities($result->subject); ?></td>
                    <td><?php echo htmlentities($result->message); ?></td>
                    <td><?php echo htmlentities($result->date); ?></td>
                    <td>
                      <form method="post" action="list-contact.php?id=<?php echo htmlentities($result->id); ?>">
                        <input type="hidden" name="delete_id" value="">
                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                      </form>
                    </td>
                  </tr>
              <?php $cnt = $cnt + 1;
                }
              } ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>

  </div>

<?php
}
include('includes/scripts.php');
include('includes/footer.php');
?>