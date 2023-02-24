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
            <th>Email </th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total </th>
            <th>Date </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
        <?php $sql = "SELECT * from `cart`";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = 1;
              if ($query->rowCount() > 0) {
                foreach ($results as $result) {  
                  $price = rtrim(htmlentities($result->price), " /");
                  $quantity = rtrim(htmlentities($result->quantity), " /");
                  $total = rtrim(htmlentities($result->total), " /");
                  ?>
          <tr>
            <td><?php echo htmlentities($cnt); ?></td>
            <td><?php echo htmlentities($result->idcart); ?></td>
            <td><?php echo $price; ?></td>
            <td><?php echo $quantity; ?></td>
            <td><?php echo $total; ?></td>
            <td><?php echo htmlentities($result->date); ?></td>
            <td>
                <form action="dele-bill-cart.php?dele=cart&id=<?php echo htmlentities($result->id); ?>" method="post">
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
