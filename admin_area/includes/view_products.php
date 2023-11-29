<div class="view_product_box">
    <h2>
    <img  width="5%" src="https://jollibee.com.vn/static/version1699974795/frontend/Jollibee/default/vi_VN/images/logo.png" alt="">    
    QUẢN LÝ SẢN PHẨM</h2>
    <div class="border_bottom"></div>
    <form action="" method="POST" enctype="multipart/form-data">

        <!-- <div class="search_bar">
            <input type="text" id="search" placeholder="Type to search...">
        </div> -->

        <table width=100%>
            <thead>
                <tr>
                    <!-- <th>Check</th> -->
                    <th>ID</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Ảnh</th>
                    <th>Số lượng</th>
                    <!-- <th>Views</th>
                    <th>Date</th> -->
           
                    <th>Xoá</th>
                    <th>Sửa</th>
                </tr>
            </thead>
            <?php
            // kết nối với table product
            if(isset($_SESSION['email'])){
                $sql = "SELECT * FROM `user` where `email`='".$_SESSION['email']."';";
                if($con->query($sql)){
            
                    $all_products = mysqli_query($con, "SELECT * FROM products order by product_id DESC");
                    while($row = mysqli_fetch_array($all_products)) {
                        ?>
                        <tbody>
                            <tr>
                                
                                <!-- <td><input type="checkbox" name="deleteAll[] check" value="<?php echo ($row['product_id']); ?>"></td> -->
                                <td><?php echo ($row['product_id']); ?></td>
                                <td><?php echo ($row['product_title']); ?></td>
                                <td><?php echo ($row['product_price']) ?></td>
                                <td><img src="product_images/<?php echo ($row['product_image']) ?>" width="70px" height="50px" alt=""></td>
                                <td><?php echo $row['product_soluong']; ?></td>
                                <?php
                                // echo ($row['views']); 
                                ?>
                                <!-- </td> -->
                                <!-- <td> -->
                                    <?php
                                    // echo ($row['date'])
                                    ?>
                                <!-- </td> -->
                                
                                <td><a href="index.php?action=view_pro&delete_product=<?php echo ($row['product_id']); ?>"><i class="fa fa-trash" aria-hidden="true"></i>
                                    </a></td>
                                <td><a href="index.php?action=edit_pro&product_id=<?php echo ($row['product_id']); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                            </tr>
                        </tbody>
                    <?php
                        
                    }
                }                   
            }else{
                echo("aaaaaaaaa");
            }

                       
            ?>

            
        </table>
        <tr>
                <td><input type="submit" name="delete_all" value="Xoá" id="thuong"></td>
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

<!-- xoá sản phẩm -->

<?php
if (isset($_GET['delete_product'])) {
    $delete_product = mysqli_query($con, "DELETE from products where product_id='$_GET[delete_product]'");

    if ($delete_product) {
        echo ("<script>alert('Xoá sản phẩm thành công');</script>");
        echo ("<script>window.open('index.php?action=view_pro','_self')</script>");
    }
}


//  xoá các sản phẩm đã chọn bằng vòng lặp foreach -->
if (isset($_POST['deleteAll'])) {
    $remove = $_POST['deleteAll'];

    foreach ($remove as $key) {
        $run_remove = mysqli_query($con, "DELETE from products where product_id='$key'");

        if ($run_remove) {
            echo ("<script>alert('Xoá sản phẩm đã chọn thành công');</script>");
            echo ("<script>window.open('index.php?action=view_pro','_self')</script>");
        } else {
            echo ("<script>alert('Không thể kết nối với mysql');</script>");
        }
    }
}
?>