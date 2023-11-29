<?php
use MongoDB\Driver\Query;

session_start();
include "includes/db.php";
if (isset($_SESSION['email'])) {
    // echo($_SESSION['email']);
    $sql = "SELECT * FROM `user` where `email`='" . $_SESSION['email'] . "' and `password`='" . $_SESSION['password'] . "'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    if (!isset($_SESSION['email']) && $row['role'] != 'admin' && $row['password'] != $_SESSION['password']) {
        echo ("<script>window.open('login.php','_self')</script>");
    } else {

        ?>

        <?php include('../includes/db.php'); ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Trang Admin</title>
            <link rel="stylesheet" href="styles/desktop.css" type="text/css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="../js/jquery-3.6.0.js"></script>
        </head>

        <body>
            <div class="container">
                <div id="header">
                    <div class="navbar-header">

                        <!-- <a class="admin_name">
                            <img style="color: #fff" width="10%" src="https://jollibee.com.vn/static/version1699974795/frontend/Jollibee/default/vi_VN/images/logo.png" alt=""> 
                        </a> -->
                        <!-- <ul class="dropdown-navbar-right"> -->

                        <!-- <li> -->
                        <a class="icon_home" href="../index.php" style="text-decoration: none;">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            &nbsp;


                            <!-- <p style="margin-left: -16px;">Website</p> -->
                        </a>
                        <?php
if (isset($_SESSION['email'])) {
    echo '<span style="color: #fff;">' . $_SESSION['email'] . '</span>';
} else {
    // echo '<span style="color: #fff;">' . $_SESSION['name'] . '</span>';
}
?>

                        <!-- </li> -->
                        <!-- </ul> -->

                    </div>
                    <!--/.navbar-header-->
                    <div class="navbar-right-header">

                        <ul class="dropdown-navbar-right">
                            <li>

                                <a><i class="fa fa-user"></i>&nbsp;<i class="fa fa-caret-down"></i></a>
                                <ul class="subnavbar-right">
                                    <li><a href="../my_account.php?action=edit_account">Chỉnh sửa thông tin</a></li>
                                    <li><a href="login.php">Đăng xuất</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="dropdown-navbar-right">
                            <li>
                                <a><i class="fa fa-bell"></i>&nbsp;<i class="fa fa-caret-down"></i></a>
                                <ul class="subnavbar-right">
                                    <li><a>Thông Báo</a></li>

                                </ul>
                            </li>
                        </ul>

                    </div>
                    <!--/.navbar-right-header-->
                </div>
                <!--/.header-->
                <div id="body_container">
                    <div id="left_sidebar">
                        <div class="left_sidebar_box" id="left_sidebar_box">
                            <ul class="left_sidebar_first_level" id="red_color">
                                <!-- <li><a  target="_blank" class="my_web"><i class="fa fa-dashboard"></i> Quản trị web</a></li> -->
                                <li>
                                    <!--i class="arrow fa fa-angle-left"></i>-->
                                    <a class="title_edit_admin" href="#"><i class="fa fa-th-large"></i> &nbsp;Sản phẩm </a>
                                    <ul class="left_sidebar_second_level">

                                        <li><a href="index.php?action=add_pro">Thêm Sản phẩm</a></li>
                                        <li><a href="index.php?action=view_pro">Quản lý Sản Phẩm</a></li>
                                    </ul>
                                    <!--/.left_sidebar_second_level-->
                                </li>

                                <li>
                                    <a class="title_edit_admin" href="#"><i class="fa fa-plus"></i> &nbsp;Thể loại Sản phẩm</a>
                                    <ul class="left_sidebar_second_level">
                                        <li><a href="index.php?action=add_cat">Thêm Loại Sản phẩm mới</a></li>
                                        <li><a href="index.php?action=view_cat">Quản lý Các thể loại</a></li>
                                    </ul>
                                    <!--/.left_sidebar_second_level-->
                                </li>
                                <li>
                                    <a class="title_edit_admin" href="#"><i class="fa fa-plus"></i> &nbsp;Thương Hiệu</a>
                                    <ul class="left_sidebar_second_level">
                                        <li><a href="index.php?action=add_brand">Thêm Thương hiệu mới</a></li>
                                        <li><a href="index.php?action=view_brands">Quản lý Các Thương hiệu</a></li>
                                    </ul>
                                    <!--/.left_sidebar_second_level-->
                                </li>
                                <li>
                                    <a class="title_edit_admin" href="#"><i class="fa fa-gift"></i> &nbsp;Khách hàng</a>
                                    <ul class="left_sidebar_second_level">

                                        <li><a href="index.php?action=view_users">Quản lý Khách hàng</a></li>
                                    </ul>
                                    <!--/.left_sidebar_second_level-->
                                </li>
                            </ul>
                            <!--/.left_sidebar_first_level-->
                        </div>
                        <!--/.left_sidebar_box-->

                    </div>
                    <!--/.left_sidebar-->
                    <div class="content" id="content">
                        <div class="content_box" id="content_box">
                            <?php
                            if (isset($_GET['action'])) {
                                $action = $_GET['action'];
                            } else {
                                $action = '';
                            }

                            switch ($action) {
                                case 'add_pro';
                                    include 'includes/insert_product.php';
                                    break;

                                case 'view_pro';
                                    include 'includes/view_products.php';
                                    break;

                                case 'edit_pro';
                                    include 'includes/edit_product.php';
                                    break;

                                case 'add_cat';
                                    include 'includes/insert_category.php';
                                    break;

                                case 'view_cat';
                                    include 'includes/view_categories.php';
                                    break;

                                case 'edit_cat';
                                    include 'includes/edit_category.php';
                                    break;

                                case 'add_brand';
                                    include 'includes/insert_brand.php';
                                    break;
                                case 'view_brands';
                                    include 'includes/view_brands.php';
                                    break;

                                case 'edit_brand';
                                    include 'includes/edit_brand.php';
                                    break;

                                case 'view_users';
                                    include 'includes/view_users.php';
                                    break;
                            }
                            ?>
                        </div>
                        <!--/.content_box-->
                    </div>
                    <!--/.content-->
                </div>
                <!--/.body-container-->
            </div>
            <!--/.container-->
        </body>

        </html>
        <style>
            .fa-th-large,
            .fa-plus,
            .fa-gift {
                color: #c00000;
                font-size: 20px;
            }

            #body_container {
                width: 100%;
                clear: both;
            }

            #left_sidebar {
                width: 25%;
                height: 1200px;
                float: left;
                background-color: #FCD9C4;
                box-shadow: 1px 4px 0 rgba(0, 0, 0, 0.2), 0 2px 10px 0 rgba(0, 0, 0, 0.19);
            }

            #left_sidebar_box {
                /* padding-bottom: 55px; */
                background-color: #FCD9C4;
                border-radius: 4px;
            }

            #red_color>li {
                margin: 15px 0;
            }

            #red_color>li>a {
                color: #c00000;
            }

            a {
                text-decoration: none;
                color: #c00000;
            }

            .subnavbar-right>li>a {
                font-weight: 600;
                color: #000;
            }

            .navbar-right-header {
                width: 70%;
            }

            #header {
                height: 50px;
                background-color: #c00000;
                border: 0.01px solid rgba(235, 235, 235, 0.9);
                padding: 15px;
                line-height: 50px;

            }

            .fa-user,
            .fa-caret-down,
            .fa-bell {
                color: #fff;
                font-size: 25px;
            }

            .fa-home {
                color: #fff;
                font-size: 35px;

            }

            .navbar-header {
                line-height: 50px;

            }
        </style>



        <!-- hiệu ứng tạo thanh menu trượt -->

        <!--Cái js này là :sau khi click vào biểu tượng or... thì nó sẽ xử lý.
        thì ở đây thì ta sẽ thực hiện tìm kiếm class để xử lý bằng hàm find() ,
        rồi tiếp tục sử dụng hàm slideToggle() : nó tựa như chức năng :hover
        với tốc độ là fast -->
        <script>
            //thanh products,categories
            $(document).ready(function () {
                $(".dropdown-navbar-right").on('click', function () {
                    $(this).find(".subnavbar-right").slideToggle('fast');
                });
                // thông báo,account
                $(".left_sidebar_first_level li").on('click', this, function () {
                    $(this).find(".left_sidebar_second_level").slideToggle('fast');
                });
            });
        </script>
        <?php
    }
} else {
    echo ("<script>window.open('login.php','_self')</script>");
}
?>

<style>
    #content {
        margin-top: 15px;
        width: 74%;
        float: right;
        border: none;
        /* Remove the border */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* Add box shadow */
    }

    #content_box {
        padding: 15px;
    }
</style>