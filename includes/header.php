<?php
session_start();
include("functions/functions.php");
include("includes/db.php");
include('js/drop_down_menu.php');
if (isset($_SESSION['email'])) {
  $get_user = "SELECT * FROM `user` where `email`='" . $_SESSION['email'] . "'";
  $row_user = $con->query($get_user);
  $user_id = $row_user->fetch_assoc();

  $get_cart = "SELECT * FROM `cart` where `user_id` = '" . $user_id['id'] . "'";
  $row_cart = $con->query($get_cart);
  $total_item = 0;
  if ($row_cart->num_rows > 0) {
    while ($row = $row_cart->fetch_assoc()) {
      $total_item += $row['quantity'];
    }
  }
  $_SESSION['total_item'] = $total_item;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="styles/style.css" media="all"> -->
  <title>Kuka - Đồ ăn nhanh</title>
  <!-- <link rel="stylesheet" href="styles/style.css" media="all"> -->
  <link rel="stylesheet" href="./styles/style.css" media="all">

  <!-- <script src="/js/jquery-3.6.0.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    // alert("as");
  </script>
</head>

<body>
  <!-- Main container bắt đầu từ đây -->
  <div class="main_wrapper">
    <div class="header_wrapper">
      <div class="header_logo">
        <a href="index.php">
          <img width="35%"
            src="https://jollibee.com.vn/static/version1699974795/frontend/Jollibee/default/vi_VN/images/logo.png"
            alt="">

          <!-- <img style="margin-left: 70px;" id="logo" src="images/ls.png"> -->
        </a>
      </div>
      <!--/.header_logo-->
      <div id="form">
        <form method="get" action="results.php" enctype="multipart/form-data" style="width:600px">
          <input id="searchInput" type="text" name="user_query" autocomplete="off" placeholder="Tìm kiếm..."
            style="border-radius: 40px">
          <input id="searchButton" type="submit" name="search" value="Search" style="border-radius: 40px">
        </form>
      </div>
      <div class="cart">
        <ul>
          <li class="dropdown_header_cart">
            <div id="notification_total_art" class="shopping_cart">
              <a href="cart.php"> <i class="fa-solid fa-cart-shopping" id="cart_image"></i></a>
              <div class="noti_cart_number">
                <p class="total_item">0</p>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="register_login">
        <div class="login"><button type="submit" class="custom-btn btn-15"><a href="login.php">ĐĂNG NHẬP</a></button>
        </div>
        <div class="register"><button type="submit" class="custom-btn btn-16"><a href="register.php">ĐĂNG
              KÝ</a></button></div>
      </div>
      <div id="profile">
        <ul>
          <li class="dropdown_header">
            <div class="dropdown">

              <a><img src="upload-files/<?php echo $user_id['image']; ?>" alt=""></a>

              <div class="dropdown-content">
                <a href="my_account.php?action=edit_account">Cài đặt Tài khoản</a>
                <a href="logout.php">Đăng xuất</a>
                <a href="admin_area/index.php?action=view_pro" id="admin_area">Quản trị website</a>
              </div>

            </div>

          </li>
        </ul>
      </div>
    </div>
    <nav class="skew-menu">
      <ul>
        <!-- <li class="hover_li" style="color: initial;" onmouseover="this.style.color='black'"
          onmouseout="this.style.color='initial'">
          <a href="index.php">Trang Chủ</a>
        </li>
        <li class="hover_li" style="background-color: white;" onmouseover="this.style.color='black'" onmouseout="this.style.color='initial'">
    <a href="index.php">Trang Chủ</a>
</li> -->

        <li class="skew-menu_li"><a class="skew-menu_a" href="index.php">Trang Chủ</a></li>
        <li class="skew-menu_li"><a class="skew-menu_a" href="all_products.php">Tất Cả Sản Phẩm</a></li>
        <li class="skew-menu_li"><a class="skew-menu_a" href="my_account.php">Tài Khoản</a></li>
        <li class="skew-menu_li"><a class="skew-menu_a" href="cart.php">Giỏ Hàng</a></li>
        <!-- <li class="skew-menu_li"><a class="skew-menu_a" href="notifications.php">Thông Báo</a></li> -->
        <li class="skew-menu_li"><a class="skew-menu_a" href="contact.php">Hỗ Trợ</a></li>
      </ul>
    </nav>
    <script type="text/javascript">
      $(document).ready(function () {
        // $("div#profile").hide();
      })
    </script>
    <?php
    // Kiểm tra xem phiên đăng nhập đã được tạo hay chưa
    if (isset($_SESSION['email'])) {
      // Ẩn phần tử chứa nút "Đăng Nhập" và "Đăng Ký"
      echo "<script>$('div.register_login').hide()</script>";
      // Kiểm tra xem người dùng có phải là admin hay không
      $account_info = "SELECT * FROM `user` where `email`='" . $_SESSION['email'] . "'";
      $result = $con->query($account_info);
      $row = $result->fetch_assoc();
      if ($row['role'] != "admin") {
        // Nếu người dùng không phải là admin, hiển thị phần tử có id là 
        echo ("<script>$('div#profile').show();</script>");
        // Ẩn liên kết đến trang quản trị
        echo "<script>$('a#admin_area').hide();</script>";
      }
    } else {
      // Nếu người dùng chưa đăng nhập, ẩn phần tử có id là 'profile'
      echo ("<script>$('div#profile').hide();</script>");
    }

    ?>

    <style>
      /* .main_wrapper{
    width: 100%;
    height: auto;
    margin: auto;
    background: #FCFDFE;
    display: flex;
    flex-direction: column;
} */

      .header_wrapper {
        width: 100%;
        height: 60px;
        margin: auto;
        background: #c00000;
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
      }

      .header_logo {
        float: left;
        /* width: 150px; */
      }

      #cart_image {
        line-height: 45px;
        color: #fff;
        font-size: 20px;
      }

      #form {
        float: left;
        width: 35%;
        padding-left: 100px;
      }

      #form input {
        padding: 8px;
      }

      #form input[type="submit"] {
        border-radius: 4px;
        outline: none;
      }

      #form input[type="submit"]:hover {
        background-color: #fff;
        cursor: pointer;
        border-radius: 4px;
        outline: none;
      }

      #form input[type="text"]:focus {
        /* width: 500px;  */
        background-color: #fff;
      }

      #form input[type=text] {
        width: 450px;
        box-sizing: border-box;
        border: 1px solid #900000;
        border-radius: 4px;
        outline: none;
        padding: 12px 14px;
        margin-left: 40px;
        transition: 0.6s ease-in-out;
      }

      #fonttable {
        font-family: Arial, Helvetica, sans-serif;
      }

      #searchButton {
        border: 1px solid #900000;
        border-radius: 35px 0 0 35px;
      }


      .cart {
        float: left;
        margin: 5px 10px 0px 15px;
        cursor: pointer;
        height: 35px;
        position: relative;
        top: 0px;
        right: 20px;
        width: 60px;
        text-align: center;
        z-index: 1000;
      }

      .cart img {
        width: 30px;
      }

      .cart .noti_cart_number {
        color: #fff;
        position: absolute;
        top: 0px;
        left: 44px;
        font-size: 12px;
      }

      .custom-btn {
        width: 90px;
        height: 30px;
        border: 1.5px solid #000;
        font-family: 'Lato', sans-serif;
        font-weight: 500;
        background: #fff;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        font-size: 12px;
        margin-top: 5px;
        border-radius: 5px;
      }

      .custom-btn a {
        text-decoration: none;
        font-size: 12px;
        color: black;
      }

      /* 15 */
      .btn-15 {

        font-weight: 600;
        z-index: 1;
        /* background: #88C6ED; */
        margin-right: 5px;
        border-radius: 5px;
        color: #c00000;

      }

      .btn-15:after {
        position: absolute;
        content: "";
        width: 0;
        height: 100%;
        top: 0;
        right: 0;
        z-index: -1;
        /* background: #e0e5ec; */
        transition: all 0.3s ease;
        border-radius: 5px;


      }

      .btn-15:hover {
        color: #c00000;
      }

      .btn-15:hover:after {
        left: 0;
        width: 100%;
      }

      .btn-15:active {
        top: 2px;
      }

      /* 16 */
      .btn-16 {
        color: black;
        z-index: 1;
        /* background: #88C6ED; */
        margin-left: 5px;
        font-weight: 600;
      }

      .btn-16:after {
        position: absolute;
        content: "";
        width: 0;
        height: 100%;
        top: 0;
        left: 0;
        direction: rtl;
        z-index: -1;
        background: #e0e5ec;
        transition: all 0.3s ease;
        border-radius: 5px;
      }

      .btn-16:hover {
        color: #000;
      }

      .btn-16:hover:after {
        left: auto;
        right: 0;
        width: 100%;
      }

      .btn-16:active {
        top: 2px;
      }

      /*kết thúc css login register*/


      .skew-menu {
        height: fit-content;
        display: inline-flex;
        background-color: rgba(0, 0, 0, .2);
        -webkit-backdrop-filter: blur(10px);
        backdrop-filter: blur(10px);
        align-items: center;
        padding: 10px 10px;
        justify-content: center;
        background: #c00000;
      }

      /* .skew-menu ul{
  display:inline-block;
  margin:0;
  padding:0;
  list-style:none;
  transform:skew(-25deg);
} */

      /* .skew-menu ul li {
        list-style: none;
        color: white;
        font-family: sans-serif;
        font-weight: bold;
        padding: 12px 16px;
        margin: 0 8px;
        position: relative;
        cursor: pointer;
        white-space: nowrap;
        float: left;
        text-transform: uppercase;
        font-weight: bolder;
        transition: all 0.3s linear;

      }

      .skew-menu li::before {
        content: " ";
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        z-index: -1;
        transition: .2s;
        border-radius: 25px;

      }

      .skew-menu li:hover::before {
        background: #fff;
        box-shadow: 0px 1px 5px 0px black;
        transform: scale(1.2);
        color: #000;
      }

      .skew-menu ul:hover::before {
        background: linear-gradient(to bottom, #e8edec, #d2d1d3);
        box-shadow: 0px 1px 2px 0px #d2d1d3;
        transform: scale(1.2);
        color: #000;
      }

      .skew-menu a {
        text-decoration: none;
        color: #fff;
        display: block; 
      }

      .skew-menu .hover_li:hover {
        color: #000;
      }

      .skew-menu a:hover {
        color: #000;
      } */

      /* .skew-menu a:first-child{
    border-radius:7px 0 0 7px;
  }
  
.skew-menu a:last-child{
    border-right:none;
    border-radius:0 7px 7px 0;
  }
  
.skew-menu a:hover{
    color:tomato;
  }
  
 .skew-menu a{
    display:block;
    padding:1em 2em;
    color: inherit;
    text-decoration:none;
    transform:skew(25deg);
  } */

      .skew-menu_li {
        list-style: none;
        cursor: pointer;
        position: relative;
        white-space: nowrap;
        float: left;
        padding: 12px 16px;
      }

      .skew-menu_a {
        transition: all .1s linear;
        fonts-size: 16px;
        font-weight: bold;
        padding: 12px 16px;
        margin: 0 8px;
        cursor: pointer;
        text-transform: uppercase;
        text-decoration: none;
        color: white;
      }
      .skew-menu_a:hover {
        background-color: white;
        border-radius: 7px;
        color: red;
      }
      .skew-menu a{
  /* text-decoration: none; */
  color: #fff;
  /* display: block; */
}


      #profile {
        float: left;
        height: 40px;
        line-height: 40px;
        position: relative;
        padding-right: 118px;
      }

      #profile ul {
        list-style: none;
        position: relative;
      }

      #profile ul a {
        line-height: 30px;
        color: black;
        text-decoration: none;
      }

      #profile ul li ul {
        position: absolute;
        white-space: nowrap;
        background: #fff;
        z-index: 11;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 15px;
        box-shadow: rgba(0, 0, 0, 0.15) 2.4px 2.4px 3.2px;
        padding: 20px;
        border-radius: 0px 10px 10px 10px;
        margin-left: 45px;
        display: none;
      }


      /*bat dau button thanh toan*/
    </style>