<?php
session_start();
error_reporting(0);

include('includes/header.php');
include('includes/navbar.php');

include('config.php');
if (strlen($_SESSION['admin']) == 0) {
  header('location:index.php');
} else {
?>
  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">

        <div class="table-responsive">

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th> ID </th>
                <th> UserName </th>
                <th>Email</th>
                <th>Pass</th>
                <th>EDIT </th>
                <th>DELETE </th>
              </tr>
            </thead>
            <tbody>
              <?php $sql = "SELECT * from `user`";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = 1;
              if ($query->rowCount() > 0) {
                foreach ($results as $result) {  ?>
                  <tr>
                    <td><?php echo htmlentities($cnt); ?></td>
                    <td><?php echo htmlentities($result->username); ?></td>
                    <td><?php echo htmlentities($result->email); ?></td>
                    <td><?php echo htmlentities($result->password); ?></td>
                    <td>
                      <form action="add-account.php?id=<?php echo htmlentities($result->id); ?>" method="post">
                        <input type="hidden" name="edit_id" value="">
                        <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                      </form>
                    </td>
                    <td>
                      <form action="add-account.php?id=<?php echo htmlentities($result->id); ?>" method="post">
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