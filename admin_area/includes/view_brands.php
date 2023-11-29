<div class="view_product_box">
    <h2>
    <img  width="5%" src="https://jollibee.com.vn/static/version1699974795/frontend/Jollibee/default/vi_VN/images/logo.png" alt="">    
    XEM THƯƠNG HIỆU SẢN PHẨM</h2>
    <div class="border_bottom"></div>
    <form action="" method="POST" enctype="multipart/form-data">

        <!-- <div class="search_bar">
            <input type="text" id="search" placeholder="Type to search...">
        </div> -->

        <table width=100%>
            <thead>
                <tr>
                    <th>Check</th>
                    <th>ID</th>
                    <th>Tên thương hiệu</th>
                    <th> </th>
                    <th>Xoá</th>
                    <th>Sửa</th>
                </tr>
            </thead>
            <?php
            // kết nối với table product
            $all_brands = mysqli_query($con, "SELECT * FROM brands order by brand_id DESC");
            $i = 1;
            while ($row = mysqli_fetch_array($all_brands)) {


            ?>
                <tbody>
                    <tr>
                        <td><input type="checkbox" name="deleteAll[]" value="<?php echo ($row['brand_id']); ?>"></td>
                        <td><?php echo ($i); ?></td>
                        <td><?php echo ($row['brand_title']); ?></td>
                        <td>
                            <!-- <?php
                            if ($row['visible'] == 1) {
                                echo ("Chấp thuận");
                            } else {
                                echo ("đang chờ xử lý");
                            }
                            ?> -->
                        </td>
                        <td><a href="index.php?action=view_brands&delete_brand=<?php echo ($row['brand_id']); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        <td><a href="index.php?action=edit_brand&brand_id=<?php echo ($row['brand_id']); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                    </tr>
                </tbody>
            <?php
                $i++;
            }
            ?>
        </table>
        <tr>
                <td><input id="thuong" type="submit" name="delete_all" value="Xoá"></td>
            </tr>
    </form>
</div>

<style>


thead {
    background-color: #c00000;
    
}

th {
    padding: 15px;
    text-align: left;
    font-weight: bold;
    color: #fff;
    border-bottom: 2px solid #ccc;
}
h2 {
    color: #c00000;
}

td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #eee;
}

td input[type="checkbox"] {
    margin-right: 5px;
}

td img {
    max-width: 70px;
    max-height: 50px;
}

td a {
    color: #dc3545;
    text-decoration: none;
}

input[type="submit"] {
    background-color: #dc3545;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
}

input[type="submit"]:hover {
    background-color: #c82333;
}
#thuong {
    font-weight: 600;
    float: right; 
    margin: 10px; 
    background-color: #c00000;
    border: none;
    padding: 10px 20px;
}

.border_bottom{
    background-color: #c00000;
}
.fa-trash{
    color: #c00000;
    font-size: 20px;
}
.fa-pencil-square-o{
    color: #F1AF00;
    font-size: 20px;

}

    
    
</style>
<!-- xoá hãng -->

<?php
if (isset($_GET['delete_brand'])) {
    $delete_brand = mysqli_query($con, "DELETE from brands where brand_id='$_GET[delete_brand]'");

    if ($delete_brand) {
        echo ("<script>alert('Xoá hãng thành công');</script>");
        echo ("<script>window.open('index.php?action=view_brands','_self')</script>");
    }
}


//  xoá các hãng đã chọn bằng vòng lặp foreach -->
if (isset($_POST['deleteAll'])) {
    $remove = $_POST['deleteAll'];

    foreach ($remove as $key) {
        $run_remove = mysqli_query($con, "DELETE from brands where brand_id='$key'");

        if ($run_remove) {
            echo ("<script>alert('Xoá các hãng đã chọn thành công');</script>");
            echo ("<script>window.open('index.php?action=view_brands','_self')</script>");
        } else {
            echo ("<script>alert('Không thể kết nối với mysql');</script>");
        }
    }
}
?>