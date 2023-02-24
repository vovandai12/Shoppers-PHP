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
            <th>ID</th>
            <th>Nation</th>
            <th>Name</th>
            <th>Companyname</th>
            <th>Address </th>
            <th>Country / Zip</th>
            <th>Email </th>
            <th>Phone</th>
            <th>Note </th>
            <th>Status</th>
            <th>Date </th>
            <th>DELETE</th>
          </tr>
        </thead>
        <tbody>
        <?php $sql = "SELECT * from `bill`";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = 1;
              if ($query->rowCount() > 0) {
                foreach ($results as $result) {
                  ?>
          <tr>
            <td><?php echo htmlentities($cnt); ?></td>
            <td><?php echo htmlentities($result->nation); ?></td>
            <td><?php echo htmlentities($result->firstname)." ".htmlentities($result->lastname); ?></td>
            <td><?php echo htmlentities($result->companyname); ?></td>
            <td><?php echo htmlentities($result->address); ?></td>
            <td><?php echo htmlentities($result->country); ?> / <?php echo htmlentities($result->zip); ?></td>
            <td><?php echo htmlentities($result->email); ?></td>
            <td><?php echo htmlentities($result->phone); ?></td>
            <td><?php echo htmlentities($result->note); ?></td>
            <td><?php echo htmlentities($result->status); ?></td>
            <td><?php echo htmlentities($result->date); ?></td>
            <td>
                <form action="dele-bill-cart.php?dele=bill&id=<?php echo htmlentities($result->id); ?>" method="post">
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
