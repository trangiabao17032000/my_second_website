<div class="container" id="sanpham">
        <div class="row mt-3">
            <?php
                $search = isset($_GET["key"]) ? $_GET["key"]:null;
                $category = isset($_GET["category"]) ? $_GET["category"]:null;
                $pricemin = isset($_GET["pricemin"]) ? $_GET["pricemin"]:null;
                $pricemax = isset($_GET["pricemax"]) ? $_GET["pricemax"]:null;
                $link = "/product.php?url=product";
                if($search != null)
                {
                    $link = $link . "&key=" .$search;
                }
                if($category != null)
                {
                    $link = $link . "&category=" .$category;
                }
                if($pricemin != null)
                {
                    $link = $link . "&pricemin=" .$pricemin;
                }
                if($pricemax != null)
                {
                    $link = $link . "&pricemax=" .$pricemax;
                }
                if($pricemin == null)
                {
                    $pricemin = 0;
                }
                if($pricemax == null)
                {
                    $pricemax = 90000000000;
                }
                // Kết nối CSDL
                require 'DataProvider.php';
                $sql = "SELECT count(masp) AS total FROM sanpham WHERE tensp LIKE '%$search%' && maloaisp LIKE '%$category%' && giasp >= '$pricemin' && giasp <= '$pricemax' ";
                $result = DataProvider::executeQuery($sql);

                // $conn = mysqli_connect('localhost', 'root', '', 'doan');
                // if (!$conn) {
                //     die("Kết nối thất bại: " . mysqli_connect_error());
                // }        

                // $result = mysqli_query($conn, "SELECT count(masp) AS total FROM sanpham WHERE tensp LIKE '%$search%' 
                //     && maloaisp LIKE '%$category%' && giasp >= '$pricemin' && giasp <= '$pricemax' ");
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 9;
                $total_page = ceil($total_records / $limit);
                if ($current_page > $total_page)
                {
                    $current_page = $total_page;
                }
                else 
                    if ($current_page < 1)
                    {
                        $current_page = 1;
                    }
                $start = ($current_page - 1) * $limit;
                $sql = "SELECT * FROM sanpham WHERE tensp LIKE '%$search%' && maloaisp LIKE '%$category%' 
                     && giasp >= '$pricemin' && giasp <= '$pricemax' LIMIT $start, $limit";
                $result = DataProvider::executeQuery($sql);

                // $result = mysqli_query($conn,"SELECT * FROM sanpham WHERE tensp LIKE '%$search%' && maloaisp LIKE '%$category%' 
                //     && giasp >= '$pricemin' && giasp <= '$pricemax' LIMIT $start, $limit");

                if ($total_page != 0 &&mysqli_num_rows($result) > 0) 
                {
                    // Sử dụng vòng lặp while để lặp kết quả
                while($row =mysqli_fetch_array($result)) {
                $hinh=$row["masp"].".jpg";
            ?>
            <div class="card text-center mx-4 my-3"  id="<?php echo $row["masp"] ?>">
                <img class="card-img-top" style="height: 300px; width: 310px" src="./img/<?php echo $hinh?>" alt="Card image cap">
                <div class="card-body">
                    <a class="card-title" href="./productinformation.php?id=<?php echo $row["masp"]?>" >
                        <?php
                            $dem = 0;
                            for($i = 0; $i < strlen($row["tensp"]); $i++)
                            {
                                echo $row["tensp"][$i];
                                if($row["tensp"][$i] == " ")
                                {
                                    $dem++;
                                }
                                if($dem == 5)
                                {
                                    $dem ++;
                                    echo "<br>";
                                }
                            }
                            if($dem < 5)
                            {
                                //echo "dasdsa";
                                echo "<br>";
                                echo "<br>";
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
                    <a type="button" class="btn btn-primary text-white" name="shopping" href="./xuly.php?id=<?php echo $row["masp"];?>">Thêm vào giỏ hàng</a>
                </div>
            </div>
            <?php
                }
                echo "</div> </div>";
            ?>  
        
    <?php
        }
        else {
        echo "</div>";
    ?> 
    <div class="text-center">
        <img src="./img/xinloi.gif" class="rounded" alt="...">
        <h2 class="alert-danger" id="thongbao">
            <?php
                    echo 'Rất tiếc,.... không tìm thấy kết quả nào phù hợp ';       
            ?>
        </h2>
    </div>
    <?php
        echo "  </div>";
    ?>
    <?php
        }
    ?>

    <nav class="container">
        <ul class="pagination">
            <li class="page-item mx-1">
           <?php 

            if ($current_page > 1 && $total_page > 1)
            {
                echo '<li class="page-item ">';
                echo '<a class="page-link" href="' . $link . "&page=" ."1".'"> << </a>';
                echo '</li>';

                echo '<li class="page-item ">';
                //echo '<a class="page-link" href="/doan/product.php?url=product&page='.($current_page-1).'&key='.$search.
                //       '&category='.$category. '&pricemin='.$pricemin. '&pricemax='.$pricemax. '">Prev</a> ';
                echo '<a class="page-link" href="' . $link . "&page=" . ($current_page - 1) .'"> < </a>';
                echo '</li>';
            }  

            if($total_page != 1){
            for ($i = 1; $i <= $total_page; $i++){
                
                if ($i == $current_page){
                    echo '<li class="page-item active">';
                    echo '<a class="page-link">'.$i.'</a> ';
                    echo '</li>';
                }
                else{
                    echo '<li class="page-item">';
                    //echo '<a class="page-link" href="./product.php?url=product&page='.$i.'&key='.$search.
                    //'&category='.$category. '&pricemin='.$pricemin. '&pricemax='.$pricemax. '">'.$i.'</a>  ';
                    echo '<a class="page-link" href="' . $link . "&page=" . ($i) .'">' . $i . ' </a>';
                    echo '</li>';
                }
            }
            }   
 
            
            if ($current_page < $total_page && $total_page > 1)
            {
                echo '<li class="page-item">';
                //echo '<a class="page-link" href="./product.php?url=product&page='.($current_page+1).'&key='.$search.
                //    '&category='.$category. '&pricemin='.$pricemin. '&pricemax='.$pricemax. '">Next</a>  ';
                echo '<a class="page-link" href="' .  $link . "&page=" . ($current_page + 1) .'">  >  </a>';
                echo '</li>';

                echo '<li class="page-item">';
                echo '<a class="page-link" href="' .  $link . "&page=" . ($total_page) .'"> >> </a>';
                echo '</li>';
            }
           ?>
        </ul>
    </nav>