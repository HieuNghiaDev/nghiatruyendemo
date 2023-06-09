<?php 
    session_start();
    include('connect.php');
    $id = $_GET['id'];
    $sql = "select * from truyen where id = '".$id."'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/doctruyen.css">
    <title>Document</title>
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
                                <li><a href="toi.php"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['dangnhap']['username'];?></a></li>                            
                                <li><a href="dangxuat.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng Xuất </a>
                                
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
    <form action="">
        <div class="noidung">
            <?php
                if(isset($_SESSION['dangnhap']['username'])){
                ?>
                <table>
                    <tr class="tentr"> 
                        <td class="tentr"><a href="" class= "tentr"><?php echo $row['name']?></a></td>
                    </tr>
                </table>
                <?php
                    $sql = "select * from chap where machap = '2' and id = '".$id."'";
                    $query = mysqli_query($conn, $sql);
                }
            ?>
             <img src="anh\truyen\<?php echo $row['anh']?>" alt="loi anh">
        </div>
    </form>
</body>
</html>