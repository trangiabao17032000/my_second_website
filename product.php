<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sản Phẩm</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/jquery.bootstrap-touchspin.css" rel="stylesheet">
    <script type="text/javascript" src="./js/js.js"></script>
</head>
	<?php
    $category =  isset($_GET['category']) ? $_GET['category'] : null;
    $pricemin =  isset($_GET['pricemin']) ? $_GET['pricemin'] : null;
    $pricemax =  isset($_GET['pricemax']) ? $_GET['pricemax'] : null;
		include("top.php");
    ?>
    <div class="container">
        <ul class="nav justify-content-center nav-pills mt-3" style="font-size: 23px;">
          <?php
            $conn = mysqli_connect('localhost', 'root', '', 'vourcher');
                if (!$conn)
                {
                    die("Kết nối thất bại: " . mysqli_connect_error());
                }
                $result = mysqli_query($conn, "SELECT * FROM loaisp");
                while($row = mysqli_fetch_array($result)) 
                {
                  echo '<li class="nav-item mx-3">';
                  echo '<a class="nav-link ';
                  if ($category == $row["maloaisp"]) echo'disabled ';
                  echo '"href="./product.php?url=product&category='. $row["maloaisp"] .'">';
                  echo $row["tenloaisp"];
                  echo '</a>';
                }
          ?>
        </ul>
         <hr style="border: 0.5px dashed gray">
    </div>

    <div class="container">
      <form class="form-group" method="_GET" action="product.php">
        <input type="text" name="key" class="mx-4" placeholder="Tên sản phẩm">
        <select class="mx-3" name="category">
          <option value="">Loại sản phẩm</option>
          <?php
                $conn = mysqli_connect('localhost', 'root', '', 'vourcher');
                if (!$conn)
                {
                    die("Kết nối thất bại: " . mysqli_connect_error());
                }
                $result = mysqli_query($conn, "SELECT * FROM loaisp");
                while($row = mysqli_fetch_array($result)) 
                {
                  echo '<option value="'.$row["maloaisp"] . '"';
                  if($category == $row["maloaisp"]) echo "selected";
                  echo '>' . $row["tenloaisp"] ;
                  echo '</option>';
                }
          ?>
        </select>
        <label class="ml-5 mr-2">Giá sản phẩm từ</label>
        <input type="text" name="pricemin" size="10" value="<?php echo $pricemin?>">
        <label class="ml-3 mr-2">đến</label>
        <input type="text" name="pricemax" size="10" value="<?php echo $pricemax?>">
        <button type="submit" class="ml-5 btn btn-outline-primary">
          <i class="fa fa-filter">
          </i>
        </button>
      </form>
    </div>

    <?php
        include("sanphamphantrang.php");
		include("foot.php");
	?>
</html>