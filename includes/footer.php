<div class="footer_wrapper">
    <!--Bắt Đầu Nội Dung Giới Thiệu-->
    <div class="contents about">
        <h2>Về chúng tôi</h2>
        <p id="right"> Chúng tôi kinh doanh thức ăn nhanh từ những năm 1999 đến hôm nay...
        </p>
        <ul class="social-icon">
            <li><a href=""><i class="fa fa-facebook"></i></a></li>
            <li><a href=""><i class="fa fa-twitter"></i></a></li>
            <li><a href=""><i class="fa fa-instagram"></i></a></li>
            <li><a href=""><i class="fa fa-youtube"></i></a></li>
        </ul>
    </div>
    <!--Kết Thúc Nội Dung Giới Thiệu-->

    <!--Bắt Đầu Nội Dung Đường Dẫn-->
    <div class="contents links">
        <h2>Đường dẫn</h2>
        <ul>
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Về chúng tôi</a></li>
            <li><a href="#">Thông tin liên lạc</a></li>
            <li><a href="#">Dịch vụ</a></li>
            <li><a href="#">Điều kiện chính sách</a></li>
        </ul>
    </div>
    <!--Kết Thúc Nội Dung Đường Dẫn-->

    <!--Bắt Đâu Nội Dung Liên Hệ-->
    <div class="contents contact">
        <h2>Thông tin liên hệ</h2>
        <ul class="info">
            <li>
                <span><i class="fa fa-map-marker"></i></span>
                <span>459 Tôn Đức Thắng <br>
                    Quận Liên Chiểu, TP. Đà Nẵng <br>
                    Việt Nam</span>
            </li>
            <li>
                <span><i class="fa fa-phone"></i></span>
                <p>
                    <a href="#">+84 869 570 028</a>
                    <br />
                    <a href="#">+84 869 570 029</a>
                </p>
            </li>
            <li>
                <span><i class="fa fa-envelope"></i></span>
                <p><a href="#">ledat.fake@gmail.com</a></p>
            </li>
            <li>
                <form class="form">
                    <input type="email" class="form__field" placeholder="Đăng Ký Subscribe Email" />
                    <button type="button" class="btn btn--primary  uppercase">Gửi</button>
                </form>
            </li>
        </ul>
    </div>

</div>
</div>
</body>

</html>

<style>
    /*start css footer*/

.footer_wrapper {
  height: auto;
  background-color: #900000;
  display: flex;
  justify-content: space-between;
  position: relative;
  padding: 15px 30px;
  margin-top: 10px;
}
/*Thiết Lập Cho Thành Phần Nội Dung Giới Thiệu*/
.footer_wrapper .contents {
  margin-right: 30px;
}
.footer_wrapper .contents.about {
  /* flex: 2; */
  width: 40%;
}
.footer_wrapper .contents.about h2 {
  position: relative;
  color: #fff; 
  font-weight: 400;
  margin-bottom: 15px;
  padding-left: 40px;
}
.footer_wrapper .contents.about h2::before {
  content: "";
  position: absolute;
  bottom: -5px;
  left: 0;
  width: 20px;
  height: 2px;
  background: #f00;
  padding-left: 50px;
}
.footer_wrapper .contents.about p {
  color: #fff;
  text-decoration: none;
  padding-left: 40px;
}
.contents ul li a{
    color: #fff;
}
.info ul{
    color: #fff;
}
</style>