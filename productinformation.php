<?php
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    // $conn = mysqli_connect('localhost', 'root', '', 'doan');
    // if (!$conn) 
    // {
    //     die("Kết nối thất bại: " . mysqli_connect_error());
    // }
    // $result = mysqli_query($conn, "SELECT * FROM sanpham WHERE masp = '$id'");
    require 'DataProvider.php';
    $sql = "SELECT * FROM sanpham WHERE masp = '$id'";
    $result = DataProvider::executeQuery($sql);
    $row =mysqli_fetch_array($result);
    $img = "./img/" . $row["masp"] . ".jpg  ";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $row["tensp"];?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">       
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/jquery.bootstrap-touchspin.css" rel="stylesheet">
    <script type="text/javascript" src="./js/js.js"></script>
    <script type="text/javascript" src="./js/jquery.bootstrap-touchspin.js"></script>
</head>
<?php
    include("top.php");
?>
    <div class="container my-4" style="font-size: 20px;height: 65vh;">
        <div class="row">
            <div class="col-sm-4"><img src="<?php echo $img; ?>" style="height: 400px; width: 350px;"></div>
            <div class="col-sm-8">
                <p class="text-primary" style="font-size: 30px; "><?php echo $row["tensp"]?><p> 
                <hr style="border: 1px solid gray;">
                <p class="text-danger font-weight-bold" style="font-size: 25px;">
                    <?php
                        $du;
                            $so=$row["giasp"];
                            $tiente=""; $dem=0;
                            while($so>1)
                            {
                                if($dem==3)
                                {
                                    $tiente=".".$tiente;
                                    $dem=0; 
                                }
                                else{
                                    $du=$so%10;
                                    $dem++;
                                    $tiente=$du.$tiente;
                                    $so/=10;
                                }
                            }

                            echo $tiente." đ";
                    ?>    
                </p>
                <div id ="break" style="text-align:justify; width: 100%; margin-right:0">
                    <?php echo $row['motasp'];?>
                </div>
                <div class="row justify-content-center my-4">
                    <a href="./xuly.php?id=<?php echo $row['masp'];?>" class="btn btn-primary bg-primary my-4" style="font-size: 25px;">
                    <i class="fas fa-shopping-cart text-white">
                        Thêm vào giỏ
                    </i>
                </a>
                </div>
            </div>
        </div>
    </div>
<?php
    include("foot.php");
?>
<style type="text/css">
    #break{
        word-break: break-all;
        width: 714px;
    }
</style>