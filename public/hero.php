<?php 
  include_once('./header.php')

?>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true ">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner container mt-5">
        <div class="carousel-item active">
            <div class="all-img-slider">

                <img src="../img/hero-1.jpg" class="w-100" alt="">
                <div class="hero-text container">
                    <h1>Enjoy Online Shopping</h1>

                    <h3>Save Up To 40% Off</h3>

                    <div class="hero-btn">
                        <a href="">Explore Shop</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="all-img-slider">

                <img src="../img/hero-2.jpg" class="w-100" alt="">
                <div class="hero-text container">
                    <h1>Awesome Fashion 2022</h1>

                    <h3>New Arrivals Collection</h3>

                    <div class="hero-btn">
                        <a href="">Explore Shop</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<?php 
   include_once('blog.php')

?>


<!-- <?php
  include_once('./footer.php')

?> -->