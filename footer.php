<footer class="bg-dark pt-8 pb-6 footer text-muted">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-4 mb-6 mb-md-0">
        <a class="d-block mb-2" href="#">
          <!-- <img src="images/logo-white-primary.png" alt="HomeID" /> -->
          <img src="img2/logo-white.png" alt="" style="height: 80px; ">
        </a>
        <div class="lh-26 font-weight-500">
          <p class="mb-0"> <i class="fa fa-map-marker"></i> <?= $social['address'] ?></p>
          <a class="d-block text-muted hover-white" href="mailto:<?= $social['email'] ?>"><i class="fa fa-envelope"></i> <?= $social['email'] ?></a>
          <a class="d-block text-lighter font-weight-bold fs-15 hover-white" href="#"> <i class="fa fa-phone"></i> +91 <?= $social['phone'] ?></a>

        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-6 mb-md-0">
        <h4 class="text-white fs-16 my-4 font-weight-500">Quick links</h4>
        <ul class="list-group list-group-flush list-group-no-border">
          <li class="list-group-item bg-transparent p-0">
            <a href="index.php" class="text-gray-light hover-primary lh-26 font-weight-500">Home</a>
          </li>
          <li class="list-group-item bg-transparent p-0">
            <a href="home.php" class="text-gray-light hover-primary lh-26 font-weight-500">E-House Hunting
            </a>
          </li>
          <li class="list-group-item bg-transparent p-0">
            <a href="#forhome" class="text-gray-light hover-primary lh-26 font-weight-500">E-Solutions For Homes</a>
          </li>
          <li class="list-group-item bg-transparent p-0">
            <a href="#forothersector" class="text-gray-light hover-primary lh-26 font-weight-500">E-Solutions For Other Sectors</a>
          </li>
        </ul>
      </div>
      <div class="col-md-6 col-lg-4 mb-6 mb-md-0">
        <h4 class="text-white fs-16 my-4 font-weight-500">
          Sign Up for Our Newsletter
        </h4>

        <form>
          <div class="input-group input-group-lg mb-6">
            <input type="text" name="email" required class="form-control bg-white shadow-none border-0 z-index-1" placeholder="Your email" />
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">
                Subscribe
              </button>
            </div>
          </div>
        </form>
        <ul class="list-inline mb-0">
          <li class="list-inline-item mr-0">
            <a href="<?= $social['twitter'] ?>" target="_blank" class="  fs-25 px-4 opacity-hover-10"><i class="fab fa-twitter tc"></i></a>
          </li>
          <li class="list-inline-item mr-0">
            <a href="<?= $social['fb'] ?>" target="_blank" class="  fs-25 px-4 opacity-hover-10"><i class="fab fa-facebook-f fc"></i></a>
          </li>

          <li class="list-inline-item mr-0">
            <a href="<?= $social['insta'] ?>" target="_blank" class="  fs-25 px-4 opacity-hover-10"><i class="fab fa-instagram ic"></i></a>
          </li>

          <li class="list-inline-item mr-0">
            <a href="<?= $social['youtube'] ?>" target="_blank" class="  fs-25 px-4 opacity-hover-10"><i class="fab fa-youtube yc"></i></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="mt-0 mt-md-10 row">
      <ul class="list-inline mb-0 col-md-6 mr-auto">
        <li class="list-inline-item mr-6">
          <a href="terms-and-condition.php" class="text-muted lh-26 font-weight-500 hover-white">Terms & Condition</a>
        </li>
        <li class="list-inline-item">
          <a href="privacy-policy.php" class="text-muted lh-26 font-weight-500 hover-white">Privacy Policy</a>
        </li>
      </ul>
      <p class="col-md-auto mb-0 text-muted">
        © <?= date("Y") ?> Shubham Enterprises. All Rights Reserved
      </p>
    </div>
  </div>
</footer>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<?php include 'cookies.php'; ?>
<a href="https://api.whatsapp.com/send?phone= +91 9522598949&text=I have a query" class="float" target="_blank">
  <i class="fa fa-whatsapp my-float"></i>
</a>


<style>
  .float {
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 40px;
    right: 40px;
    background-color: #25d366;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    font-size: 30px;
    box-shadow: 2px 2px 3px #999;
    z-index: 100;
  }

  .my-float {
    margin-top: 16px;
  }
</style>