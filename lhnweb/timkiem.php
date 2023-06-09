<?php
    include('connect.php');
    session_start();

    if(isset($_POST['tim'])){
        $name = $_POST['name'];
    }
    else {
        $name = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/timkiem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Trang Chủ</title>
</head>
<body>
    <div id="header">
        <nav class="container">
            <div class = "brand">
                <span>
                    <a href="index.php"><img class = "logo" src="anh/backgr/logo.png" alt="Lỗi Ảnh"></a>
                </span>
            </div>
            <div class= "navbar">
                <div class = "searchbox">
                    <form method="post" name="truyen" action="timkiem.php">
                        <input class= "search" type="text" name = "name" placeholder = "Tìm Truyện Tại Đây Nè..."/>
                        <button class = "button" type = "submit" name = "tim"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <ul id ="header-menu">
                    <li>
                        <a href="https://mail.google.com/mail/u/0/#inbox">Liên hệ Với Chúng Tôi</a>
                    </li>
                    <li>
                        <a href="">Hồ Sơ</a>
                        <ul class="sub-menu">
                            <?php
                            if(isset($_SESSION['dangnhap']['username'])){
                                ?>
                                <li><a href="toi.php"><?php echo "Tài Khoản ".$_SESSION['dangnhap']['username'];?></a></li>                            
                                <li><a href="dangxuat.php">Đăng Xuất</a>
                                <i class="fa-solid fa-arrow-right-from-bracket" style="color: #ebedef;"></i>
                                </li>
                                <?php
                            }else{
                                ?>
                                <li><a href="dangnhap.php">Đăng Nhập</a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>            
                </ul>
            </div>
        </nav>
    </div>
    <nav class= "nav">
        <ul id = header-menu>
            <li><a href="index.php">Home</a></li>
            <li><a href="">Hot</a></li>
            <li><a href="">Thể Loại</a>
                <ul class="sub-menu">
                    <?php
                        $sql1 = "select * from truyen";
                        $result1 = mysqli_query($conn, $sql1);
                        
                        $row2 = mysqli_fetch_array($result1)
                    ?>
                    <li><a href="theloai.php?theloai=<?=$row2['theloai']?>">Manhua</a></li>
                    <li><a href="theloai.php?theloai=<?=$row2['theloai']='manhwa';?>">Manhwa</a></li>
                    <li><a href="theloai.php?theloai=<?=$row2['theloai']='manga';?>">Manga</a></li>
                    <li><a href="theloai.php?theloai=<?=$row2['theloai']='codai';?>">Cổ Đại</a></li>
                    <li><a href="theloai.php?theloai=<?=$row2['theloai']='xuyenkhong';?>">Xuyên Không</a></li>
                    <li><a href="theloai.php?theloai=<?=$row2['theloai']='dothi';?>">Đô Thị</a></li>
                    <li><a href="theloai.php?theloai=<?=$row2['theloai']='tinhcam';?>">Tình Cảm</a></li>
                    <li><a href="theloai.php?theloai=<?=$row2['theloai']='hocduong';?>">Học Đường</a></li>
                    <li><a href="theloai.php?theloai=<?=$row2['theloai']='tutien';?>">Tu Tiên </a></li>
                    <li><a href="theloai.php?theloai=<?=$row2['theloai']='hanhdong';?>">Hành Động</a></li>
                </ul>
            </li>
            <li><a href="">BXH</a></li>
            <li><a href="theodoi.php">Theo Dõi</a></li>  
        </ul>
    </nav>
    <?php
        $sql = "select * from truyen where name like '%$name%' ";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result)){
            ?>
            <a href="truyen.php?id=<?=$row['id']?>">
                <table class= "table">
                    <tr>
                        <td><img src="anh\truyen\<?php echo $row['anh']?>" alt="loi anh"></td>
                    </tr>
                    <tr>
                        <td><a href="truyen.php?id=<?=$row['id']?>" class= "tentr"><?php echo $row['name']?></a></td>
                    </tr>
                </table>
            </a>
        <?php
            // echo $row['name'];
            // echo $row
        }
    ?>
    </body>
</html>
