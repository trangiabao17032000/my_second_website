<?php
	//$conn = mysqli_connect('localhost', 'root', '', 'doan');
	//$result = mysqli_query($conn, 'SELECT count(masp) AS total FROM sanpham');
	session_start();
    if(isset($_POST['dangnhap'])){
        $user=$_POST['taikhoan'];
        $pass=$_POST['matkhau'];
        // $conn = mysqli_connect('localhost', 'root', '', 'doan');
        // if (!$conn) {
        //     die("Kết nối thất bại: " . mysqli_connect_error());
        // } 
        // $sql = "SELECT taikhoan FROM taikhoan WHERE '$user'=taikhoan &&'$pass'=matkhau";
        // $result = mysqli_query($conn, $sql);
        require 'DataProvider.php';
        include("db.inc");
        $conn = mysqli_connect($hostName, $username, $password, $databaseName);
        $user = mysqli_real_escape_string($conn,$user);
        $pass = mysqli_real_escape_string($conn,$pass);
        $pass = md5($pass);
        $sql = "SELECT taikhoan FROM taikhoan WHERE taikhoan = '$user' && matkhau= '$pass' && trangthai IS NULL";
        $result = DataProvider::executeQuery($sql);
        if(mysqli_num_rows($result) > 0)
        {
            $row =mysqli_fetch_array($result);
            $_SESSION['username'] = $row["taikhoan"];
?>
            <script type="text/javascript">
                alert("Bạn đã đăng nhập thành công");
                window.location="./index.php";
            </script>
<?php
        }
        else
        {
?>
            <script type="text/javascript">
                alert("Đăng nhập thất bại");
                history.back();
            </script>
<?php
        }
    }
    if(isset($_POST['dangxuat']))
    {
    	unset($_SESSION['username']);
        unset($_SESSION['cart']);
        unset($_SESSION['chondiachi']);
    	header('location:index.php');
    }

    if(isset($_GET["id"]))
        {
            require 'DataProvider.php';
            include("db.inc");
            $conn = mysqli_connect($hostName, $username, $password, $databaseName);
            $id = $_GET["id"];
            $pass = mysqli_real_escape_string($conn,$id);
            $sql = "SELECT * FROM sanpham WHERE masp = '$id'";
            $result = DataProvider::executeQuery($sql);
            if(mysqli_num_rows($result) > 0)
            {
                $data =mysqli_fetch_array($result);
            }

            if(!empty($_SESSION["cart"]))
            {
                $cart = $_SESSION["cart"];
                if(array_key_exists($id, $_SESSION["cart"]))
                {
                    $cart[$id] = array(
                    'slsp' => (int)$cart[$id]["slsp"]+1, 
                    'giasp'=>$data[3],
                    'tensp' =>$data[1],
                    'masp' =>$data[0]
                    );
                }
                else
                {
                    $cart[$id] = array(
                    'slsp' => 1, 
                    'giasp'=>$data[3],
                    'tensp' =>$data[1],
                    'masp' =>$data[0]
                    );
                }
            }
            else
            {
                $cart[$id] = array(
                    'slsp' => 1, 
                    'giasp'=>$data[3],
                    'tensp' =>$data[1],
                    'masp' =>$data[0]
                );
            }
            $_SESSION["cart"] = $cart;
?>
            <script type="text/javascript">
                history.back();
                alert("Bạn đã thêm sản phẩm vào giỏ hàng");
            </script>
<?php
        }

    if(isset($_GET["action"])&&isset($_GET["msp"]))
    {
        $id = $_GET["msp"];
        $cart = $_SESSION["cart"];
        if($_GET["action"] == "increase")
        {
            $cart[$id]["slsp"]++;
            $_SESSION["cart"] = $cart;
?>
            <script type="text/javascript">
                history.back();
            </script>
<?php           
        }
        if($_GET["action"] == "decrease")
        {
            
            if($cart[$id]["slsp"] > 1)
            {
                $cart[$id]["slsp"]--;
                $_SESSION["cart"] = $cart;
?>
            <script type="text/javascript">
                history.back();
            </script>
<?php
            }
            else
            {
?>
            <script type="text/javascript">
                history.back();
            </script>
<?php
            }
        }
        if($_GET["action"] == "delete")
        {
            unset($cart[$id]);
            $_SESSION["cart"] = $cart;
?>
            <script type="text/javascript">
                history.back();
            </script>
<?php
        }
        if($_GET["action"] == "change")
        {
            $sl = isset($_GET["soluong"]) ? $_GET['soluong'] : $cart[$id]["slsp"];
            $sl = (int)$sl;
            if(is_string($sl))
            {
                $sl = (int) 1;
            }
            if($sl <= 0)
            {
                $sl = 1;
            }
            $cart[$id]["slsp"] = $sl;
            $_SESSION["cart"] = $cart;
            header("location:./cart.php");
        }
    }
?>

<?php
    if(isset($_POST['dangky']))
    {
        include("db.inc");
        $conn = mysqli_connect($hostName, $username, $password, $databaseName);
        $taikhoan = $_POST['taikhoan'];
        $matkhau = $_POST['matkhau'];
        $diachi = $_POST['diachi'];
        $dienthoai = $_POST['dienthoai'];
        $hoten = $_POST['hoten'];
        $taikhoan = mysqli_real_escape_string($conn,$taikhoan);
        $matkhau = mysqli_real_escape_string($conn,$matkhau);
        $diachi = mysqli_real_escape_string($conn,$diachi);
        $dienthoai = mysqli_real_escape_string($conn,$dienthoai);
        $hoten = mysqli_real_escape_string($conn,$hoten);
        $matkhau = md5($matkhau);
        require 'DataProvider.php';
        $sql = "SELECT taikhoan FROM taikhoan WHERE '$taikhoan'= taikhoan";
        $result = DataProvider::executeQuery($sql);
        if(mysqli_num_rows($result) > 0)
        {
            echo 
            ' <script type="text/javascript">
                alert("Tài khoản đã tồn tại");
                window.location="./dangky.php";
                </script>';
        }
        else
        {
            $sql = "SELECT * FROM taikhoan";
            $result = DataProvider::executeQuery($sql);
            $makh = mysqli_num_rows($result) + 1;
            if($makh < 10)
            {
                $makh = "KH000" . $makh;
            }
            if($makh >= 10 && $makh <= 99)
            {
                $makh = "KH00" . $makh; 
            }
            $trangthai = "NULL";
            $sql = "INSERT INTO taikhoan VALUES (";
            $sql = $sql . "'" . $taikhoan . "'";
            $sql = $sql . "," . "'" . $makh . "'";
            $sql = $sql . "," . "'" . $matkhau . "'";
            $sql = $sql . "," . "'" . $dienthoai . "'";
            $sql = $sql . "," . "'" . $hoten . "'";
            $sql = $sql . "," . "'" . $diachi . "'";
            $sql = $sql . "," . $trangthai ;
            $sql = $sql . ")";
            $result = DataProvider::executeQuery($sql);
            $_SESSION['username'] = $taikhoan;
            echo '
            <script type="text/javascript">
                alert("Bạn đã đăng ký thành công");
                window.location="./index.php";
            </script>
            ';
        }
    }
?>
