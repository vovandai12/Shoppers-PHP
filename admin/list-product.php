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
                <th> Name </th>
                <th>Price/Sale</th>
                <th>Image</th>
                <th>Categories/Size/Color</th>
                <th>Title</th>
                <th>Created/Update</th>
                <th>View</th>
                <th>EDIT </th>
                <th>DELETE </th>
              </tr>
            </thead>
            <tbody>
              <?php $sql = "SELECT * from `product`";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = 1;
              if ($query->rowCount() > 0) {
                foreach ($results as $result) {  ?>
                  <tr>
                    <td><?php echo htmlentities($cnt); ?></td>
                    <td><?php echo htmlentities($result->name); ?></td>
                    <td>
                      <?php echo htmlentities($result->price); ?> /
                      <?php echo htmlentities($result->sale); ?>
                    </td>
                    <td>
                      <img src="uploads/<?php echo htmlentities($result->image); ?>" alt="" style="width: 150px; height: 150px;">
                    </td>
                    <td>
                      <?php $categories = htmlentities($result->categories);
                      if ($categories == 'Men') {
                      ?><i class="fas fa-male" style="font-size: 40px;"></i>
                      <?php        }
                      if ($categories == 'Women') {
                      ?><i class="fas fa-female" style="font-size: 40px;"></i>
                      <?php        }
                      if ($categories == 'Children') {
                      ?><i class="fas fa-baby" style="font-size: 40px;"></i>
                      <?php        }
                      ?>
                      /<?php echo htmlentities($result->size); ?> /
                      <?php $color = htmlentities($result->color);
                      if ($color == 'Red') {
                      ?><p style="background-color: red; height: 40px; width: 40px; border-radius: 100%;"></p>
                      <?php        }
                      if ($color == 'Green') {
                      ?><p style="background-color: green; height: 40px; width: 40px; border-radius: 100%;"></p>
                      <?php        }
                      if ($color == 'Blue') {
                      ?><p style="background-color: blue; height: 40px; width: 40px; border-radius: 100%;"></p>
                      <?php        }
                      if ($color == 'Purple') {
                      ?><p style="background-color: purple; height: 40px; width: 40px; border-radius: 100%;"></p>
                      <?php        }
                      ?>
                    </td>
                    <td><?php echo htmlentities($result->title); ?></td>
                    <td>
                      <?php echo htmlentities($result->created_at); ?> / 
                      <?php echo htmlentities($result->update_at); ?>
                    </td>
                    <td><?php echo htmlentities($result->view); ?></td>
                    <td>
                      <form action="add-product.php?id=<?php echo htmlentities($result->id); ?>" method="post">
                        <input type="hidden" name="edit_id" value="">
                        <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                      </form>
                    </td>
                    <td>
                      <form action="add-product.php?id=<?php echo htmlentities($result->id); ?>" method="post">
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