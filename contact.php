<?php
    include('partials/header.php');    
    include('partials/navbar.php');
?>
<div class="page-title-wrap" data-bg-img="assets/img/media/page-title-bg.png">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title text-center text-white">
                        <h2>Contactez nous</h2>
                        <ul class="nav justify-content-center">
                            <li><a href="index.php">Acceuil</a></li>
                            <li class="active">Contactez nous</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="contact pt-120 pb-120" data-bg-img="assets/img/media/contact-form-bg.png">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7">
                    <div class="contact-form-wrap">
                        <form action="https://themelooks.net/demo/dvpn/html/preview/sendmail.php" class="contact-form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group"><input type="text" name="name" class="form-control"
                                            placeholder="First Name"></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group"><input type="email" name="email" class="form-control"
                                            placeholder=" Addresse Email "></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group"><input type="text" name="number" class="form-control"
                                            placeholder="Télephone"></div>
                                </div>
                                <div class="col-lg-12"><textarea class="form-control" name="message"
                                        placeholder="Messages"></textarea></div>
                                <div class="col-lg-12 mt-3">
                                    <div class="btn-wrap"><span></span> <button type="submit"
                                            class="btn">Envoyez</button></div>
                                </div>
                            </div>
                        </form>
                        <div class="form-response"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info">
                        <div class="section-title style--two text-left">
                            <h2>Get Instact Query<br>Drop us a Line</h2>
                            <p>It is a long e stablished facts that reader will be distracted</p>
                        </div>
                        <div class="contact-info-list mt-n3">
                            <div class="single-contact media">
                                <div class="contact-icon"><i class="fa fa-phone"></i></div>
                                <div class="contact-content"><a href="callto:(202)6965469">(202) 696 5469</a> <a
                                        href="callto:(202)6966369">(202) 696 6369</a></div>
                            </div>
                            <div class="single-contact media">
                                <div class="contact-icon"><i class="fa fa-envelope"></i></div>
                                <div class="contact-content"><a href="mailto:info.dvpn@dvpn.com">info.dvpn@dvpn.com</a>
                                    <a href="mailto:support@dvpn.com">support@dvpn.com</a></div>
                            </div>
                            <div class="single-contact media">
                                <div class="contact-icon"><i class="fa fa-map-marker"></i></div>
                                <div class="contact-content">
                                    <p>27 Division St, New York, NY 1002 United States of America</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    include('partials/footer.php');
?>