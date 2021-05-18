<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang Chủ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <link rel="stylesheet" href="./css/all.css" type="text/css">
    <script type="text/javascript" src="./js/js.js"></script>
</head>

<body>
    <?php
		include("top.php");
		require 'DataProvider.php';
		$sql = "SELECT *  FROM sanpham";
		$result = DataProvider::executeQuery($sql);
	?>

    <div id="bottomtop" style="font-size: 25px;color: #007bff;">
        <p style="margin-top:2%;margin-left: 42%;font-family: Arial;">Sản Phẩm Bán Chạy</p>
    </div>

    <div class="container">
        <div class="row mt-3">
            <?php
				$sl=0;
				while($row =mysqli_fetch_array($result)){
					$hinh=$row["masp"].".jpg";

			?>
            <div class="card text-center mx-3 my-3">
                <img class="card-img-top" src="./img/<?php echo $hinh?>" style="height: 300px; width: 310px">
                <div class="card-body">
                    <a class="card-title" href="./productinformation.php?id=<?php echo $row["masp"]?>">
                        <?php
	    					$dem = 0;
                            for($i = 0; $i < strlen($row["tensp"]); $i++)
                            {
                                echo $row["tensp"][$i];
								// xuống dòng tình bày cho đẹp
                                if($row["tensp"][$i] == " ")
                                {
                                    $dem++;
                                }
                                if($dem == 5)
                                {
                                    $dem ++;
									// echo $dem;
                                    echo "<br>";
                                }
                            }
	    					//echo $row["tensp"];
	    				?>
                    </a>
                    <p class="card-text text-danger">
                        <?php
	    					$du;
	    					$so=$row["giasp"];
	    					$tiente=""; $dem=0;
						    while($so>1)
						    {
						    	if($dem==3 || $dem == 6)
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
	    					$sl++;

	    				?>
                    </p>
                    <a href="./xuly.php?id=<?php echo $row["masp"];?>" class="btn btn-primary">Thêm vào giỏ hàng</a>
                </div>
            </div>
            <?php
  					if($sl==6)
	    			{
	    				break;
	    			}
				}
			?>
        </div>
    </div>
    <?php
		include("foot.php");
	?>

</body>

</html>