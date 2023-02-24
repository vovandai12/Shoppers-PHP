<?php
session_start();
error_reporting(0);

include('includes/header.php');

include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
?>

  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-md-9 order-2">

          <div class="row">
            <div class="col-md-12 mb-5">
              <div class="float-md-left mb-4">
                <h2 class="text-black h5">Shop All</h2>
              </div>
              <div class="d-flex">
                <div class="dropdown mr-1 ml-md-auto">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Latest
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    <a class="dropdown-item" href="shop.php?function=Men">Men</a>
                    <a class="dropdown-item" href="shop.php?function=Women">Women</a>
                    <a class="dropdown-item" href="shop.php?function=Children">Children</a>
                  </div>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                    <a class="dropdown-item" href="shop.php">Relevance</a>
                    <a class="dropdown-item" href="shop.php?function=AZ">Name, A to Z</a>
                    <a class="dropdown-item" href="shop.php?function=ZA">Name, Z to A</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="shop.php?function=LOW">Price, low to high</a>
                    <a class="dropdown-item" href="shop.php?function=HIGH">Price, high to low</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-5">
            <?php
            if(isset($_GET['function'])){
              $function = $_GET['function'];
              switch ($function){
                case 'Men':{
                  $sql = "SELECT * from `product` WHERE `categories` LIKE 'Men'";
                  break;
                }
                case 'Women':{
                  $sql = "SELECT * from `product` WHERE `categories` LIKE 'Women'";
                  break;
                }
                case 'Children':{
                  $sql = "SELECT * from `product` WHERE `categories` LIKE 'Children'";
                  break;
                }
                case 'Red':{
                  $sql = "SELECT * from `product` WHERE `color` LIKE 'Red'";
                  break;
                }
                case 'Green':{
                  $sql = "SELECT * from `product` WHERE `color` LIKE 'Green'";
                  break;
                }
                case 'Blue':{
                  $sql = "SELECT * from `product` WHERE `color` LIKE 'Blue'";
                  break;
                }
                case 'Purple':{
                  $sql = "SELECT * from `product` WHERE `color` LIKE 'Purple'";
                  break;
                }
                case 'AZ':{
                  $sql = "SELECT * from `product` ORDER BY `name` ASC";
                  break;
                }
                case 'ZA':{
                  $sql = "SELECT * from `product` ORDER BY `name` DESC";
                  break;
                }
                case 'LOW':{
                  $sql = "SELECT * from `product` ORDER BY `price` ASC";
                  break;
                }
                case 'HIGH':{
                  $sql = "SELECT * from `product` ORDER BY `price` DESC";
                  break;
                }
                default:{
                  $sql = "SELECT * from `product`";
                  break;
                }
              }
            }else{
              $sql = "SELECT * from `product`";
            }
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
              foreach ($results as $result) {  ?>
                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                  <div class="block-4 text-center border">
                    <figure class="block-4-image">
                      <a href="shop-single.php?id=<?php echo htmlentities($result->id); ?>">
                        <img src="images/<?php echo htmlentities($result->image); ?>" alt="Image placeholder" class="img-fluid"></a>
                    </figure>
                    <div class="block-4-text p-4">
                      <h3><a href="shop-single.php?id=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->name); ?></a></h3>
                      <p class="mb-0"><?php echo htmlentities($result->title); ?></p>
                      <p class="text-primary font-weight-bold">$<?php echo htmlentities($result->price); ?></p>
                    </div>
                  </div>
                </div>
            <?php $cnt = $cnt + 1;
              }
            } ?>
          </div>
          <div class="row" data-aos="fade-up">
            <div class="col-md-12 text-center">
              <div class="site-block-27">
                <ul>
                  <li><a href="#">&lt;</a></li>
                  <li class="active"><span>1</span></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&gt;</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 order-1 mb-5 mb-md-0">
          <div class="border p-4 rounded mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
            <ul class="list-unstyled mb-0">
              <?php
              $sql = "SELECT COUNT(*) FROM `product` WHERE `categories` LIKE 'Men'";
              $query = $dbh->prepare($sql);
              $query->execute();
              $number_of_rows = $query->fetchColumn();
              ?>
              <li class="mb-1"><a href="shop.php?function=Men" class="d-flex"><span>Men</span> <span class="text-black ml-auto">(<?php echo $number_of_rows; ?>)</span></a></li>
              <?php
              $sql = "SELECT COUNT(*) FROM `product` WHERE `categories` LIKE 'Women'";
              $query = $dbh->prepare($sql);
              $query->execute();
              $number_of_rows = $query->fetchColumn();
              ?>
              <li class="mb-1"><a href="shop.php?function=Women" class="d-flex"><span>Women</span> <span class="text-black ml-auto">(<?php echo $number_of_rows; ?>)</span></a></li>
              <?php
              $sql = "SELECT COUNT(*) FROM `product` WHERE `categories` LIKE 'Children'";
              $query = $dbh->prepare($sql);
              $query->execute();
              $number_of_rows = $query->fetchColumn();
              ?>
              <li class="mb-1"><a href="shop.php?function=Children" class="d-flex"><span>Children</span> <span class="text-black ml-auto">(<?php echo $number_of_rows; ?>)</span></a></li>

            </ul>
          </div>

          <div class="border p-4 rounded mb-4">
            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
              <div id="slider-range" class="border-primary"></div>
              <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
            </div>

            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
              <label for="s_sm" class="d-flex">
                <?php
                $sql = "SELECT COUNT(*) FROM `product` WHERE `size` LIKE 'Small'";
                $query = $dbh->prepare($sql);
                $query->execute();
                $number_of_rows = $query->fetchColumn();
                ?>
                <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">Small (<?php echo $number_of_rows; ?>)</span>
              </label>
              <label for="s_md" class="d-flex">
                <?php
                $sql = "SELECT COUNT(*) FROM `product` WHERE `size` LIKE 'Medium'";
                $query = $dbh->prepare($sql);
                $query->execute();
                $number_of_rows = $query->fetchColumn();
                ?>
                <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">Medium (<?php echo $number_of_rows; ?>)</span>
              </label>
              <label for="s_lg" class="d-flex">
                <?php
                $sql = "SELECT COUNT(*) FROM `product` WHERE `size` LIKE 'Large'";
                $query = $dbh->prepare($sql);
                $query->execute();
                $number_of_rows = $query->fetchColumn();
                ?>
                <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">Large (<?php echo $number_of_rows; ?>)</span>
              </label>
            </div>

            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
              <a href="shop.php?function=Red" class="d-flex color-item align-items-center">
              <?php
                $sql = "SELECT COUNT(*) FROM `product` WHERE `color` LIKE 'Red'";
                $query = $dbh->prepare($sql);
                $query->execute();
                $number_of_rows = $query->fetchColumn();
                ?>
                <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Red (<?php echo $number_of_rows; ?>)</span>
              </a>
              <a href="shop.php?function=Green" class="d-flex color-item align-items-center">
              <?php
                $sql = "SELECT COUNT(*) FROM `product` WHERE `color` LIKE 'Green'";
                $query = $dbh->prepare($sql);
                $query->execute();
                $number_of_rows = $query->fetchColumn();
                ?>
                <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Green (<?php echo $number_of_rows; ?>)</span>
              </a>
              <a href="shop.php?function=Blue" class="d-flex color-item align-items-center">
              <?php
                $sql = "SELECT COUNT(*) FROM `product` WHERE `color` LIKE 'Blue'";
                $query = $dbh->prepare($sql);
                $query->execute();
                $number_of_rows = $query->fetchColumn();
                ?>
                <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Blue (<?php echo $number_of_rows; ?>)</span>
              </a>
              <a href="shop.php?function=Purple" class="d-flex color-item align-items-center">
              <?php
                $sql = "SELECT COUNT(*) FROM `product` WHERE `color` LIKE 'Purple'";
                $query = $dbh->prepare($sql);
                $query->execute();
                $number_of_rows = $query->fetchColumn();
                ?>
                <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Purple (<?php echo $number_of_rows; ?>)</span>
              </a>
            </div>

          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="site-section site-blocks-2">
            <div class="row justify-content-center text-center mb-5">
              <div class="col-md-7 site-section-heading pt-4">
                <h2>Categories</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                <a class="block-2-item" href="#">
                  <figure class="image">
                    <img src="images/women.jpg" alt="" class="img-fluid">
                  </figure>
                  <div class="text">
                    <span class="text-uppercase">Collections</span>
                    <h3>Women</h3>
                  </div>
                </a>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                <a class="block-2-item" href="#">
                  <figure class="image">
                    <img src="images/children.jpg" alt="" class="img-fluid">
                  </figure>
                  <div class="text">
                    <span class="text-uppercase">Collections</span>
                    <h3>Children</h3>
                  </div>
                </a>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                <a class="block-2-item" href="#">
                  <figure class="image">
                    <img src="images/men.jpg" alt="" class="img-fluid">
                  </figure>
                  <div class="text">
                    <span class="text-uppercase">Collections</span>
                    <h3>Men</h3>
                  </div>
                </a>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
<?php
}
include('includes/footer.php');
?>