<div class="form_box ">
    <form action="" method="POST" enctype="multipart/form-data">
        <table align="center" width="100%">
            <tr>
                <td colspan="7">
                    <h2>
                    <img  width="5%" src="https://jollibee.com.vn/static/version1699974795/frontend/Jollibee/default/vi_VN/images/logo.png" alt="">    
                    THÊM THƯƠNG HIỆU</h2>
                    <div class="border_bottom">

                    </div>
                </td>
            </tr>
            <tr>
                <td class="red_color"><b>Thêm mới </b></td>
                <td><input type="text" name="product_brand" size="50" required value=""></td>
            </tr>

            <tr>
                <td colspan="7"><input type="submit" name="insert_brand" value="Thêm" id="thuong"></td>
            </tr>
        </table>
    </form>
</div>

<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
}

.form_box {
    width: 60%;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.red_color{
    color: #c00000;
}

h2 {
    color: #c00000;
}

table {
    width: 100%;
}

td {
    padding: 10px;
}

input[type="text"] {
    width: 100%;
    height: 30px;
    padding: 10px;
    box-sizing: border-box;
    border: none;
    outline: none;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
#thuong {padding: 30px 30px;
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
if (isset($_POST['insert_brand'])) {
    
    $product_brand = mysqli_real_escape_string($con,$_POST['product_brand']);

    $insert_brand = mysqli_query($con,"insert into brands (brand_title) values('$product_brand')");

    if ($insert_brand) {
        echo ("<script>alert('Thêm hãng thành công!')</script>");
        // echo ("<script>window.open(window.location.href,'_self')</script>");
        echo ("<script>window.open('index.php?action=view_brands','_self')</script>");
    }
}
?>