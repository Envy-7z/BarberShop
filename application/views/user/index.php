<!DOCTYPE html>
<html>
<head>
  <title>BarberShop</title>
<!--   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"> -->
  <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/owl/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendor/fonts/circular-std/style.css">
  <link rel="stylesheet" href="assets/libs/css/style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/fontawesome.min.css">
</head>
<body>
<header class="header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand" href="#">
                <small class="font-weight-bold mb-0 text-uppercase">Barber<span style="color:#e15f41;">shop</span></small>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link scroll-link" href="#one">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="#two">Menu </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="#three">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<section id="one">
  <div class="bg-light">
    <div class="container py-5">
      <div class="row h-100 align-items-center py-5">
        <div class="col-lg-6 d-none d-lg-block my-5"><img src="./assets/images/barber.png" alt="" class="img-fluid" width="256px"></div>
        <div class="col-lg-5 mx-3">
          <h1 class="display-4">Barber<span style="color:#e15f41;">shop</span></h1>
          <p class="lead text-muted mb-0">An Amazing Luxury Barber Experience</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="two">
  <h2 class="text-center mt-4">Services</h2>
  <div class="row mx-5">  
    <div class="owl-carousel owl-theme">
      <?php 
            $no = 1;
            foreach($data_menu as $menu){
        ?>
        
          <div class="product-thumbnail card-figure has-hoverable mx-4 my-1">
              <div class="product-img-head text-center">
                <img src="./foto/<?=$menu->gambar_menu?>" alt="" style="max-height:180px;" class="img-fluid">
              </div>
              <div class="product-content">
                  <div class="product-content-head">
                      <h3 class="product-title font-weight-bold"><?=$menu->nama_menu?></h3>
                      <h5>Stock : <?=$menu->stock_menu?></h5> 
                      <h5>Rp. <?=$menu->harga_menu?> /sekali pakai</h5>
<!--                       <div class="product-price">Rp. <?=$menu->harga_menu?> /porsi</div> -->

                  </div>

                  <div class="product-btn"> 
                      <button id="addCart" data-id="<?=$menu->id?>" data-nama="<?=$menu->nama_menu?>" data-harga="<?=$menu->harga_menu?>"class="btn btn-secondary btn-block">Reservation Now</button>
                  </div>
              </div>
          </div>
      
        <?php }?>

    </div>     
  </div>
  <div class="card">
    <div class="card-body">
      <div class="col-12">
        <h3><center><i class="fas fa-arrow-alt-circle-left"></i> Scroll To View Menu <i class="fas fa-arrow-alt-circle-right"></i></center></h3>
      </div>
    </div>
  </div>

  <section id="two">
    <h2 class="text-center mt-4">Styles</h2>
    <div class="row mx-5">  
      <div class="owl-carousel owl-theme">
        <?php 
              $no = 1;
              foreach($data_minuman as $minuman){
          ?>
          
            <div class="product-thumbnail card-figure has-hoverable mx-4 my-1">
                <div class="product-img-head text-center">
                  <img src="./foto/<?=$minuman->gambar_menu?>" alt="" style="max-height:700px;" class="img-fluid">
                </div>
                <div class="product-content">
                    <div class="product-content-head">
                        <h3 class="product-title font-weight-bold"><?=$minuman->nama_menu?></h3>
                        <h5>Stock : <?=$minuman->stock_menu?></h5> 
                        <h5>Rp. <?=$minuman->harga_menu?> /Sekali potong</h5>
  <!--                       <div class="product-price">Rp. <?=$menu->harga_menu?> /porsi</div> -->

                    </div>

                    <div class="product-btn"> 
                        <button id="addCart" data-id="<?=$minuman->id?>" data-nama="<?=$minuman->nama_menu?>" data-harga="<?=$minuman->harga_menu?>"class="btn btn-secondary btn-block">Reservation Now</button>
                    </div>
                </div>
            </div>
        
          <?php }?>

      </div>     
    </div>

  <div class="row mx-5" style="padding: 20px; ">
    <div class="col-3">
        <div class="card form">
            <div class="card-body">
              <h3>Reservation</h3>
              <form action="user/pesan" method="post">
                <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" name="pemesan">
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <input class="form-control" name="no_meja">
                </div>
                <div class="form-group">
                  <label>Additional</label>
                  <textarea class="form-control" name="tambahan"></textarea> 
                </div>
                <div id="id_menu">
                    <!-- untuk input id -->
                </div>
                <div id="data_qty">
                    <!-- untuk qty -->
                </div>
                <div id="total_cart">
                    <!-- total cart -->
                </div>
                <button type="submit" id="submit" class="btn btn-secondary">Reservasi</button>
              </form>
            </div>
        </div>
    </div>
    <div class="col-9 mx-auto">
      <div class="card">
        <div class="card-body cart">
          <h3>Reservation (<span>0</span>)</h3>
            <div class="table-responsive" id="list-cart">
              
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="bg-light py-5">
  <div class="container py-5">
    <div class="row mb-4">
      <div class="col-lg-5">
        <h2 class="display-4 font-weight-light">About Us</h2>
        <p class="font-italic text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
      </div>
    </div>
  </div>
</div>

<section id="three">
  <footer class="bg-light pb-5">
    <div class="container text-center">
      <p class="font-italic text-muted mb-0">&copy; Copyrights Barbershop All rights reserved.</p>
    </div>
  </footer>
</section>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15/dist/smooth-scroll.polyfills.min.js"></script>
<script type="text/javascript" src="assets/js/cart.js"></script>
<script type="text/javascript" src="assets/owl/owl.carousel.min.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> -->
<script type="text/javascript">
  var scroll = new SmoothScroll('a[href*="#"]');
  $(document).ready(function(){
    $('.owl-carousel').owlCarousel();

    
  });
</script>
</body>
</html>