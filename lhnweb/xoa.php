<?php 
    session_start();
    include('connect.php');
    if(isset( $_SESSION['dangnhap']['username'])){
        $username = $_SESSION['dangnhap']['username'];
        $id = $_GET['id'];
        $sqlx = "DELETE FROM theodoi WHERE id = '$username' AND matruyen = '$id'";
        $queryx = mysqli_query($conn, $sqlx);
        if($queryx){
            header('location:theodoi.php');
        }
    }
    
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    test
</body>
</html> -->