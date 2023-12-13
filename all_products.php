<?php
include('includes/header.php');

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
<script type="text/javascript">
  $(document).ready(function () {
    $("p.total_item").text("<?php if (isset($total_item)) {
      echo $total_item;
    } else {
      echo "0";
    } ?>");
    // buy_btn
    var total_item = "<?php echo $total_item; ?>";
    $("button#button").click(function () {

      var id = $(this).closest("a.buy_btn").attr("id");
      total_item++;
      $("p.total_item").text(total_item);
      $.ajax({
        method: "POST",
        url: "ajax/add_to_cart_ajax.php",
        mimeType: "multipart/form-data",
        data: {
          id: id
        },
        success: function (response) {
          // alert(response);
          console.log(response);
        },
        error: function (response) {
          console.log("error");
        },
      })
    })
  })
</script>
<!-- <img src="ajax/add_to_cart_ajax.php" alt=""> -->
<div class="content_wrapper">

  <div id="sidebar">
    <hr>
    <div id="sidebar_title">Sản phẩm</div>
    <hr>
    <ul id="cats">
      <?php
      getCats();
      ?>
    </ul>
    <hr>
    <div id="sidebar_title">Thương hiệu</div>
    <hr>
    <ul id="cats">
      <?php
      getBrands();
      ?>
      <hr>
    </ul>
  </div>
  <div id="content_area">
    <div id="product_box">
      <?php

      $sql = "SELECT * FROM `products`";
      $run_pro = $con->query($sql);
      $product_total = 0;
      if ($run_pro->num_rows > 0) {
        while ($row = $run_pro->fetch_assoc()) {
          $product_total++;
        }
      }
      // $product_total = ceil($product_total/8);
      // echo $product_total;
      
      // lấy & hiển thị thông tin 
      getPro($product_total); // all products
      get_pro_by_cat_id(); //
      get_pro_by_brand_id();
      ?>
    </div>
    <!--end product_box-->
  </div>
  <!--end content_area-->


</div>
<?php
include('includes/footer.php');
?>
<style>
  #content_wrapper {
    width: 100%;
    margin: auto;
    position: relative;
  }

  #sidebar {
    background-color: #fff;
    /* Màu nền trắng */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    /* Đổ bóng nhẹ */
    border-radius: 10px;
    /* Góc bo tròn */
    padding: 20px;
  }

  #sidebar hr {
    border: none;
    /* Loại bỏ đường ngang */
    border-top: 1px solid #eee;
    /* Tạo đường viền trên */
    margin: 15px 0;
    /* Khoảng cách giữa các phần */
  }

  #sidebar_title {
    font-size: 1.5em;
    color: #c00000;
    margin-bottom: 10px;
  }

  #cats,
  #brands {
    list-style: none;
    padding: 0;
  }

  #cats li,
  #brands li {
    margin-bottom: 10px;
  }

  #cats a,
  #brands a {
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
  }

  #cats a:hover,
  #brands a:hover {
    color: #c00000;
  }


  /* end sidebar */
  #content_area {
    width: 70%;
    float: left;
    margin-left: 4%;
    padding-top: 30px;
  }

  #products_box {
    width: 1000px;
    text-align: center;
    margin-bottom: 10px;
  }

  #single_product {
    float: left;
    border: 1px solid #F4F6F8;
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
    margin: 7px;
    transition: transform 1.2s;

  }

  #single_product a {
    text-decoration: none;
    color: #000;
    /* margin-bottom: 10px; */

  }

  #single_product a img {
    border-radius: 10px;
    margin-bottom: 10px;


  }

  #single_product b {
    /* padding-top: 10px; */
    color: #D53B2A;
  }

  /* #single_product img{
    transition: transform .2s;
} */

  #single_product:hover {
    -ms-transform: scale(1.2);
    -webkit-transform: scale(1.2);
    transform: scale(1.02);
  }
</style>