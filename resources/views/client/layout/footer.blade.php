<!-- ======= Footer ======= -->
<footer id="footer">
    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-about">
                        <h3>BS MEDIA</h3>
                        <div class="social-links">
                            <a href="https://www.facebook.com/bsmedia.com.vn" class="facebook"><i
                                    class="icofont-facebook"></i></a>
                            <a href="javascript:void(0);" class="youtube"><i class="icofont-youtube"></i></a>
                            <a href="https://www.messenger.com/t/bsmedia.com.vn" class="messenger"><i
                                    class="icofont-facebook-messenger"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                    <div class="info">
                        <div>
                            <i class="ri-map-pin-line"></i>
                            <p>194 Đường Số 8<br>Linh Xuân, Thủ Đức, TP.HCM</p>
                        </div>

                        <div>
                            <i class="ri-mail-send-line"></i>
                            <p>designerboon.designer@gmail.com</p>
                        </div>

                        <div>
                            <i class="ri-phone-line"></i>
                            <p>0968 104 244</p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5 col-md-12">
                    <form action="{{ route('sendMail') }}" method="post" role="form" class="php-email-form">
                        <div class="form-group">
                            <input type="text" name="infoName" class="form-control" id="name" placeholder="Họ và Tên"
                                data-rule="minlen:4" data-msg="Họ và Tên không được để trống" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="infoEmail" id="email" placeholder="Email"
                                data-rule="email" data-msg="Email không được để trống" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subjectEmail" id="subject"
                                placeholder="Chủ đề" data-rule="minlen:4" data-msg="Chủ đề không được để trống" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="messsage" name="messageEmail" rows="5"
                                data-rule="required" data-msg="" placeholder="Nội dung mô tả" data-msg="Nội dung không được để trống"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Gửi yêu cầu thành công. Chúng tôi sẽ liên hệ lại bạn sớm
                                nhất có thể!</div>
                        </div>
                        <div class="text-center"><button id="btnSubmit" type="submit">Gửi</button></div>
                    </form>
                    <span class="success" style="color:green;text-align:center"></span>
                </div>

            </div>

        </div>
    </section>
    <div class="copyright">
        <div class="container" style="text-align: center;"> © Bản quyền thuộc <a href="javascript:void(0);">BsMedia</a>
            - Công ty tư vấn thương hiệu, thiết kế thương hiệu và truyền thông hàng đầu.</div>
    </div>
</footer>
<!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
{{-- <div class="giuseart-nav">
    <ul>
        <li>
            <a href="https://zalo.me/0968104244" rel="nofollow" target="_blank">
                <i class="ticon-zalo-circle2"></i>Chat Zalo</a>
        </li>
        <li class="phone-mobile">
            <a href="tel:0968104244" rel="nofollow" class="button">
                <span class="phone_animation animation-shadow">
                    <i class="icon-phone-w" aria-hidden="true"></i>
                </span>
                <span class="btn_phone_txt">Gọi điện</span>
            </a>
        </li>
        <li><a href="https://www.messenger.com/t/bsmedia.com.vn" rel="nofollow" target="_blank"><i
                    class="ticon-messenger"></i>Messenger</a></li>
        <li><a href="sms:0968104244" class="chat_animation">
                <i class="ticon-chat-sms" aria-hidden="true" title="Nhắn tin sms"></i>
                Nhắn tin SMS</a>
        </li>
    </ul>
</div> --}}

<div class="hotline-phone-ring-wrap">
    <div class="hotline-phone-ring">
        <div class="hotline-phone-ring-circle" style="border: 2px solid #fab900;"></div>
        <div class="hotline-phone-ring-circle-fill" style="box-shadow: 0 0 0 0 #fab900; background-color: rgba(233, 201, 142, 0.7);"></div>
        <div class="hotline-phone-ring-img-circle" style="background-color: #fab900;"> 
            <a href="https://zalo.me/0968104244" class="pps-btn-img"> 
                <img src="fontend/img/icon-connect/zalo.png" alt="zalo" width="50">
            </a>
        </div>
    </div>

    <div class="hotline-phone-ring">
        <div class="hotline-phone-ring-circle" style="border: 2px solid #fab900;"></div>
        <div class="hotline-phone-ring-circle-fill" style="box-shadow: 0 0 0 0 #fab900; background-color: rgba(233, 201, 142, 0.7);"></div>
        <div class="hotline-phone-ring-img-circle" style="background-color: #fab900;"> 
            <a href="https://www.messenger.com/t/bsmedia.com.vn" class="pps-btn-img"> 
                <img src="fontend/img/icon-connect/fb-messenger.png" alt="zalo" width="50">
            </a>
        </div>
    </div>

    {{-- <div class="hotline-phone-ring">
        <div class="hotline-phone-ring-circle"></div>
        <div class="hotline-phone-ring-circle-fill"></div>
        <div class="hotline-phone-ring-img-circle"> 
            <a href="tel:02773088844" class="pps-btn-img"> 
                <img src="https://netweb.vn/img/hotline/icon.png" alt="so dien thoai" width="50"> 
            </a>
        </div>
    </div>
    <div class="hotline-bar">
        <a href="tel:02873088844"> <span class="text-hotline">02873088844</span> </a>
    </div> --}}
</div>
<!-- Vendor JS Files -->
<script src="{{ asset('fontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('fontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('fontend/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('fontend/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('fontend/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('fontend/vendor/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('fontend/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('fontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('fontend/vendor/venobox/venobox.min.js') }}"></script>
<script src="{{ asset('fontend/vendor/aos/aos.js') }}"></script>


<!-- Template Main JS File -->
<script src="{{ asset('fontend/js/main.js') }}"></script>
<!-- zalo -->
</body>

</html>
