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
        $nname = $_POST['nameProduct'];
        $price = $_POST['price'];
        $sale = $_POST['sale'];
        
        move_uploaded_file(
            $_FILES["imageProduct"]["tmp_name"],
            "uploads/" . basename($_FILES["imageProduct"]["name"])
        );

        $pimage = basename($_FILES["imageProduct"]["name"]);

        if($pimage == null){
            $pimage = htmlentities($result->image);
        }

        $categories = $_POST['categories'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        $title = $_POST['title'];
        $update_at = date("Y-m-d H:i:s");
        $sql = "UPDATE `product` SET `name`=:nname,`image`=:pimage, `price`=:price,`categories`=:categories,`size`=:size,`color`=:color,
        `title`=:title,`sale`=:sale,`update_at`=:update_at WHERE `id`= :id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':nname', $nname, PDO::PARAM_STR);
        $query->bindParam(':price', $price, PDO::PARAM_STR);
        $query->bindParam(':sale', $sale, PDO::PARAM_STR);
        $query->bindParam(':pimage', $pimage, PDO::PARAM_STR);
        $query->bindParam(':categories', $categories, PDO::PARAM_STR);
        $query->bindParam(':size', $size, PDO::PARAM_STR);
        $query->bindParam(':color', $color, PDO::PARAM_STR);
        $query->bindParam(':title', $title, PDO::PARAM_STR);
        $query->bindParam(':update_at', $update_at, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Product Updated Successfully";
    }

    $id = intval($_GET['id']);
    $sql = "SELECT * FROM `product` WHERE `id`=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {    ?>
            <?php
            $uname = htmlentities($result->name);
            $pprice = htmlentities($result->price);
            $ssale = htmlentities($result->sale);
            $iimage = htmlentities($result->image);
            $ccategories = htmlentities($result->categories);
            $ssize = htmlentities($result->size);
            $ccolor = htmlentities($result->color);
            $ttitle = htmlentities($result->title);

            if (isset($_POST['Reset'])) {
                $uname = "";
                $pprice = "";
                $ssale = "";
                $iimage = "";
                $ccategories = "";
                $ssize = "";
                $ccolor = "";
                $ttitle = "";

                $msg = "Product Reset Successfully";
            }

            if (isset($_POST['Delete'])) {
                $sql = "DELETE FROM `product` WHERE `id`=:id";
                $query = $dbh->prepare($sql);
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();

                $uname = "";
                $pprice = "";
                $ssale = "";
                $iimage = "";
                $ccategories = "";
                $ssize = "";
                $ccolor = "";
                $ttitle = "";

                $msg = "Product Delete Successfully";
            }

            if (isset($_POST['Save'])) {
                $nname = $_POST['nameProduct'];
                $price = $_POST['price'];
                $sale = $_POST['sale'];
                
                move_uploaded_file(
                    $_FILES["imageProduct"]["tmp_name"],
                    "uploads/" . basename($_FILES["imageProduct"]["name"])
                );

                $pimage = basename($_FILES["imageProduct"]["name"]);

                $categories = $_POST['categories'];
                $size = $_POST['size'];
                $color = $_POST['color'];
                $title = $_POST['title'];
                $created_at = date("Y-m-d H:i:s");
                $sql = "INSERT INTO `product`(`name`, `price`, `image`, `categories`, `size`, `color`, `title`, `sale`, `created_at`) 
                VALUES (:nname, :price, :pimage, :categories, :size, :color, :title, :sale, :created_at)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':nname', $nname, PDO::PARAM_STR);
                $query->bindParam(':price', $price, PDO::PARAM_STR);
                $query->bindParam(':sale', $sale, PDO::PARAM_STR);
                $query->bindParam(':pimage', $pimage, PDO::PARAM_STR);
                $query->bindParam(':categories', $categories, PDO::PARAM_STR);
                $query->bindParam(':size', $size, PDO::PARAM_STR);
                $query->bindParam(':color', $color, PDO::PARAM_STR);
                $query->bindParam(':title', $title, PDO::PARAM_STR);
                $query->bindParam(':created_at', $created_at, PDO::PARAM_STR);
                $query->execute();

                $uname = "";
                $pprice = "";
                $ssale = "";
                $iimage = "";
                $ccategories = "";
                $ssize = "";
                $ccolor = "";
                $ttitle = "";

                $msg = "Product Insert Successfully";
            }

            if ($error) {
            ?><div class="errorWrap text-danger"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
            else if ($msg) { ?><div class="succWrap text-success"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
            <?php
            ?>

            <form method="POST" enctype="multipart/form-data">

                <div class="modal-body">

                    <div class="form-group">
                        <label> NameProduct </label>
                        <input type="text" name="nameProduct" class="form-control" placeholder="Enter NameProduct" value="<?php echo $uname ?>">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" class="form-control" placeholder="Enter Price" value="<?php echo $pprice ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Sale</label>
                                <input type="number" name="sale" class="form-control" placeholder="Enter Sale" value="<?php echo $ssale ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Product Images</label>
                        <div class="col-sm-8">
                            <img src="uploads/<?php echo $iimage; ?>" width="200">
                        </div>
                        <input type="file" class="form-control-file" name="imageProduct" id="imageProduct">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Categories</label>
                                <?php
                                $options = array('Men', 'Women', 'Children');
                                echo "<select class='custom-select' name='categories' >";
                                foreach ($options as $option) {
                                    if ($ccategories == $option) {
                                        echo "<option value='$option' selected = 'selected'>$option</option>";
                                    } else {
                                        echo "<option value='$option' >$option</option>";
                                    }
                                }
                                echo "</select>";
                                ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Size</label>
                                <?php
                                $optionss = array('Small', 'Medium', 'Large', 'Extra Large');
                                echo "<select class='custom-select' name='size' >";
                                foreach ($optionss as $option) {
                                    if ($ssize == $option) {
                                        echo "<option value='$option' selected = 'selected'>$option</option>";
                                    } else {
                                        echo "<option value='$option' >$option</option>";
                                    }
                                }
                                echo "</select>";
                                ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Color</label>
                                <?php
                                $optionsss = array('Red', 'Green', 'Blue', 'Purple');
                                echo "<select class='custom-select' name='color' >";
                                foreach ($optionsss as $option) {
                                    if ($ccolor == $option) {
                                        echo "<option value='$option' selected = 'selected'>$option</option>";
                                    } else {
                                        echo "<option value='$option' >$option</option>";
                                    }
                                }
                                echo "</select>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Title" value="<?php echo $ttitle ?>">
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