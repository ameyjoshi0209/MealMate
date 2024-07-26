<?php session_start(); ?>
<?php include 'partials/header.php' ?>
<?php include 'partials/nav_hero.php' ?>

<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>About Us</h2>


                <!-- <?php echo $_SESSION['username'] ?></h2> -->


                <!-- </h2> -->
                <p>Learn More <span>About Us</span></p>
            </div>

            <div class="row gy-4">
                <div class="col-lg-7 position-relative about-img" style="background-image: url(assets/img/aboutusmeal.jpg); background-repeat: no-repeat;
        background-position-y: -130px;" data-aos="fade-up" data-aos-delay="150">
                </div>
                <div class="col-lg-5 d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="content ps-0 ps-lg-5">
                        <p style="font-size:20px;line-height: 30px; ">
                            Indulge in the culinary delight at MEAL MATE. We're your go-to destination for
                            mouthwatering dishes, prepared with love and delivered to your doorstep. Our mission is to satisfy your
                            taste buds with a diverse menu, ensuring every meal is a delightful experience.
                            <br><br>
                            What Sets Us Apart:
                            <br>
                            &emsp;◉ Fresh, high-quality ingredients.<br>
                            &emsp;◉ A team of talented chefs.<br>
                            &emsp;◉ Prompt and reliable delivery.<br>
                            &emsp;◉ A commitment to culinary excellence.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section><!-- End About Section -->


    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <p>Check Our Plans</p>
            </div>

            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                <div class="tab-pane fade active show" id="menu-starters">
                    <div class="row gy-5">
                        <div class="col-lg-6 menu-item">
                            <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/deluxe_1.jpg" class="menu-img img-fluid" alt=""></a>
                            <!-- <h4>Delux</h4> -->
                            <!-- <div class="col-md-5 col-lg-6"> -->
                            <div class="item">
                                <div class="heading">
                                    <h3>Deluxe</h3>
                                </div>
                                <!-- <p>Limited Meal</p> -->
                                <div class="features">
                                    <h4><span class="feature">Food</span> : <span class="value">Only Veg</span></h4>
                                    <h4><span class="feature">Limited</span> : <span class="value">Bread, Sweets,<br />curry</span></h4>
                                    <h4><span class="feature">Duration</span> : <span class="value">30 Days</span></h4>
                                </div>
                                <div class="price">
                                    ₹4,000
                                </div>


                                <a href="checkout/checkout.php"><button class="btn btn-block btn-outline-primary h-75 mt-4" type="submit">Subscribe</button></a>
                            </div>
                            <!-- </div> -->

                        </div><!-- Menu Item -->

                        <div class="col-lg-6 menu-item">
                            <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/premium_1.jpeg" class="menu-img img-fluid" alt=""></a>
                            <!-- <h4>Delux</h4> -->
                            <!-- <div class="col-md-5 col-lg-6"> -->
                            <div class="item">
                                <div class="heading">
                                    <h3>Premium</h3>
                                </div>
                                <!-- <p>Limited Meal</p> -->
                                <div class="features">
                                    <h4><span class="feature mb-lg-4 ">Food</span> : <span class="value"> Veg & Non-Veg </span></h4>
                                    <h4><span class="feature">Unlimited</span> : <span class="value">Bread, Sweets,<br />curry</span></h4>
                                    <h4><span class="feature">Duration</span> : <span class="value">30 Days</span></h4>
                                </div>
                                <div class="price">
                                    ₹6,500
                                </div>
                                <button class="btn btn-block btn-outline-primary mt-4" type="submit">Subscribe</button>
                            </div>
                            <!-- </div> -->
                        </div><!-- Menu Item -->
                        <!-- Menu Item -->
                    </div>
                </div><!-- End Starter Menu Content -->
                <!-- End Breakfast Menu Content -->
            </div>
        </div>
    </section><!-- End Menu Section -->


</main><!-- End #main -->

<?php include 'partials/footer.php' ?>