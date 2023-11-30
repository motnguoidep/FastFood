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
  background-color: #c00000;
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
  /* left: 0; */
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


/*Thiết Lập Cho Thành Phần Icon Mạng Xã Hội*/
.social-icon{
  margin-top: 20px;
  display: flex;
}
.social-icon li {
  list-style: none;
}
.social-icon li a{
  display: inline-block;
  width: 40px;
  height: 40px;
  background: #222;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-right: 10px;
  text-decoration: none;
  border-radius: 4px;
}
.social-icon li a:hover{
  background: #f00;
}
.social-icon li a .fa{
  color: #fff;
  font-size: 20px;
}
/*End Thành Phần Nội Dung Giới Thiệu*/


/*Css Thành Phần Nội Dung Link*/
.links h2{
  position: relative;
  color: #fff;
  font-weight: 500;
  margin-bottom: 15px;
  padding-left: 40px;
}
.links h2::before{
  content: '';
  position: absolute;
  bottom: -5px;
  /* left: 0; */
  width: 50px;
  height: 2px;
  background: #f00;
}
.links{
 position: relative;
 width: 25%;
}
.links ul li{
  list-style: none;
}
.links ul li a{
  color: #fff;
  text-decoration: none;
  margin-bottom: 10px;
  display: inline-block;
}
.links ul li a:hover{
  color: #fff;
}
/*End Thành Phần Nội Dung Link*/


/*CSSS Thong tin lien he*/
.contact h2{
  position: relative;
  color: #fff;
  font-weight: 500;
  margin-bottom: 15px;
  padding-left: 40px;
}
.contact h2::before{
  content: '';
  position: absolute;
  bottom: -5px;
  /* left: 0; */
  width: 50px;
  height: 2px;
  background: #f00;
}
.contact{
  width: calc(35% - 60px);
  margin-right: 0 !important;
}
.contact .info{
  position: relative;
}
.contact .info li{
  display: flex;
  margin-bottom: 16px;
}
.contact .info li span:nth-child(1) {
  color: #fff;
  font-size: 20px;
  margin-right: 10px;
}
.contact .info li span{
  color: #fff;
}
.contact .info li a{
  color: #fff;
  text-decoration: none;
}
/*btn submit Email*/
.btn {
  display: inline-block;
  background: transparent;
  color: inherit;
  font: inherit;
  border: 0;
  outline: 0;
  padding: 0;
  margin-top:16px;
  transition: all 200ms ease-in;
  cursor: pointer;
}
.btn--primary {
  background: #222;
  color: #fff;
  box-shadow: 0 0 10px 2px rgba(0, 0, 0, .1);
  border-radius: 5px;
  padding: 8px 24px;
}
.btn--primary:hover {
  background: #fff;
  color: #000;
  border-radius: 5px;
}
.btn--primary:active {
  background: #f00;
  box-shadow: inset 0 0 10px 2px rgba(0, 0, 0, .2);
}
.form__field {
  width: 90%;
  background: #fff;
  color: #a3a3a3;
  font: inherit;
  box-shadow: 0 6px 10px 0 rgba(0, 0, 0, .1);
  border: 0;
  outline: 0;
  padding: 8px 4px;
}
/*End thong tin lien he*/
/*end css footer*/

#not_login{
  padding-top: 290px;
  font-size: 30px;
  font-family: revert;
}
</style>