<div class="form_box">
    <form action="" method="POST" enctype="multipart/form-data">
        <table align="center" width="100%">
            <tr>
                <td colspan="7">
                    
                    <h2>
                    <img  width="5%" src="https://jollibee.com.vn/static/version1699974795/frontend/Jollibee/default/vi_VN/images/logo.png" alt="">    THÊM SẢN PHẨM</h2>
                    <div class="border_bottom">

                    </div>
                </td>
            </tr>
            <tr>
                <td class="red_color"> <b>Tên Sản Phẩm</b></td>
                <td ><input  type="text" name="product_title" size="60"  value="" required></td>
            </tr>
            <tr>
                <td class="red_color"><b>Danh Mục Sản Phẩm</b></td>
                <td>
                    <select name="product_cat" id="">
                        <!-- <option value="">Chọn một danh mục</option> -->
                        <?php
                        $get_cats = "SELECT * from categories";
                        $run_cats = mysqli_query($con, $get_cats);

                        while ($row_cats = mysqli_fetch_array($run_cats)) {
                            $cat_id = $row_cats['cat_id'];
                            $cat_title = $row_cats['cat_title'];
                            echo "<option value = '$cat_id'>$cat_title</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="red_color"><b>Thương Hiệu Sản Phẩm </b></td>
                <td>
                    <select name="product_brand" id="">
                        <!-- <option value="">Chọn một thương hiệu</option> -->
                        <?php
                        $get_brands = "SELECT * from `brands`";
                        $run_brands = mysqli_query($con, $get_brands);

                        while ($row_brands = mysqli_fetch_array($run_brands)) {
                            $brand_id = $row_brands['brand_id'];
                            $brand_title = $row_brands['brand_title'];
                            echo "<option value = '$brand_id'>$brand_title</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="red_color"><b>Hình Ảnh Sản Phẩm</b></td>
                <td><input type="file" name="product_image" required />
                <p class="error_image"></p>
            </td>
                
            </tr>
            <tr>
                <td class="thuong red_color"><b>Giá Sản Phẩm </b></td>
                <td><input type="number" min=1 value="1" name="product_price"  id="" required></td>
            </tr>
            <tr>
                <td class="red_color"><b>Số Lượng Sản Phẩm </b></td>
                <td><input type="number" min=1 value="1" name="product_soluong" required id=""></td>
            </tr>
            <tr>
                <td class="red_color" valign="top"><b>Mô tả bản phẩm</b></td>
                <td><textarea name="product_desc" rows="10"></textarea></td>
            </tr>
            <!-- <tr>
                <td><b>Tìm Kiếm Sản Phẩm</b></td>
                <td><input type="text" name="product_keywords"  id=""></td>
            </tr> -->
            <tr>
                <td colspan="7"><input type="submit" name="insert_post" value="Thêm" id="thuong"></td>
            </tr>
        </table>
    </form>
</div>
<style>
    


h2 {
    color: #c00000;
}
.red_color{
    color: #c00000;
}

table {
    width: 100%;
}

td {
    padding: 10px;
}

input[type="text"],
input[type="number"],
input[type="file"],
textarea,
select {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: none;
    outline: none;
    border-bottom: 2px solid #ccc; /* Add a bottom border for input separation */
}

input[type="file"] {
    margin-top: 5px; /* Adjust margin for better spacing */
}

input[type="submit"] {
    font-weight: 600;
    border: none;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    float: right; /* Move the button to the right */
    margin-top: 10px; /* Adjust the top margin as needed */
}
input[type="submit"]:hover {
    background-color: #c00000;
}
/* Style for the Mô tả bản phẩm section */
td[valign="top"] {
    vertical-align: top;
}

textarea[name="product_desc"] {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: 2px solid #ccc; /* Add a border for the textarea */
    border-radius: 4px;
    outline: none;
}

/* Optional: Add a box shadow for a subtle effect */
textarea[name="product_desc"]:focus {
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

#thuong {
    padding: 30px 30px;
    background-color: #c00000;
    border: none;
    padding: 10px 20px;
}
.border_bottom{
    background-color: #c00000;
}


</style>
<!-- Thêm sản phẩm mới -->
<?php
if (isset($_POST['insert_post'])) {
    
    $image = $_FILES['product_image'];         
    $img_name = $_FILES['product_image']['name'];
    $img_arr = explode('.',$img_name);
    $img_tail = array_pop($img_arr);
    $img = ['png','jpg','jpeg','svg','PNG','JPG','JPEG','SVG'];
    $check_img = in_array($img_tail,$img);
         $product_desc = trim(mysqli_real_escape_string($con, $_POST['product_desc']));
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES['product_image']['tmp_name'];
    echo $img_name."<br>";
    echo $_POST['product_title']."<br>";
    echo $_POST['product_cat']."<br>";
    echo $_POST['product_brand']."<br>";
    echo $_POST['product_price']."<br>";
    echo $_POST['product_soluong']."<br>";
    echo $_POST['product_keywords']."<br>";
    echo  ">asdasdasd>".$product_desc.">aa";
    if($check_img==1){
        $product_desc = trim(mysqli_real_escape_string($con, $_POST['product_desc']));
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES['product_image']['tmp_name'];

        move_uploaded_file($product_image_tmp, "product_images/$product_image");

        $insert_product = "INSERT INTO `products`(`product_title`,`product_price`,`product_desc`,`product_image`,`product_keywords`,`product_soluong`,`brand_id`,`cat_id`) VALUE('". $_POST['product_title']."','".$_POST['product_price']."','". $product_desc."','".$product_image."','".$_POST['product_keywords']."','". $_POST['product_soluong']."','".$_POST['product_brand']."','".$_POST['product_cat']."')";
       // $insert_pro = mysqli_query($con, $insert_product);
        if($con->query($insert_product)){
                    echo "<script>window.open('index.php?action=view_pro','_self')</script>";
                    }else{
                    echo("error");
                  }
    }else{
        echo('<script>$("p.error_image").text("day khong phai la file hinh anh!!").css("color","red");</script>');
  
      }
    }


?>