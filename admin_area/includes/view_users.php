<div class="view_product_box">
    <h2>
     <img  width="5%" src="https://jollibee.com.vn/static/version1699974795/frontend/Jollibee/default/vi_VN/images/logo.png" alt="">    
    QUẢN LÝ KHÁCH HÀNG</h2>
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
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Ảnh đại diện</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            <?php
            // kết nối với table product
            $all_users = mysqli_query($con, "SELECT * FROM user order by id DESC");
            $i = 1;
            while ($row = mysqli_fetch_array($all_users)) {


            ?>
                <tbody>
                    <tr>
                        <?php 
                            if($row['role'] !='admin'){
                        ?>
                        <td><input type="checkbox" name="deleteAll[]" value="<?php echo ($row['id']); ?>"></td>
                        <td><?php echo ($row['id']); ?></td>
                        <td><?php echo ($row['name']); ?></td>
                        <td><?php echo ($row['email']) ?></td>
                        <td>
                            <?php if ($row['image'] != '') { ?>
                                <img src="../upload-files/<?php echo ($row['image']) ?>" width="70px" height="50px" alt="">
                            <?php } else { ?>
                                <img src="../images/profile-icon.png" width="70px" height="50px" alt="">
                            <?php } ?>
                        </td>
                        <!-- <td>
                            <?php
                            if ($row['visible'] == 1) {
                                echo ("Chấp thuận");
                            } else {
                                echo ("Đang chờ xử lý");
                            }
                            ?>
                        </td> -->
                        <td><a href="index.php?action=view_users&delete_user=<?php echo ($row['id']); ?>"><i class="fa fa-trash" aria-hidden="true"></a></td>
                        <?php 
                            }
                        ?>    
                    </tr>
                </tbody>
            <?php
                // $i++;
            }
            ?>

            <!-- <tr>
                <td><input type="submit" name="delete_all" id="thuong" value="Xoá"></td>
            </tr> -->
        </table>
        <tr>
                <td><input type="submit" name="delete_all" id="thuong" value="Xoá"></td>
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

    
    
</style>
<!-- xoá user -->

<?php
if (isset($_GET['delete_user'])) {
    
    $delete_user = mysqli_query($con, "DELETE from user where id='$_GET[delete_user]'");

    if ($delete_user) {
        echo ("<script>alert('Xoá khách hàng thành công');</script>");
        echo ("<script>window.open('index.php?action=view_users','_self')</script>");
    }
}


//  xoá các user đã chọn bằng vòng lặp foreach -->
if (isset($_POST['deleteAll'])) {
    $remove = $_POST['deleteAll'];

    foreach ($remove as $key) {
        $run_remove = mysqli_query($con, "DELETE from user where id='$key'");

        if ($run_remove) {
            echo ("<script>alert('Xoá các khách hàng đã chọn thành công');</script>");
            echo ("<script>window.open('index.php?action=view_users','_self')</script>");
        } else {
            echo ("<script>alert('Không thể kết nối với mysql');</script>");
        }
    }
}
?>