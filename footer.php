<footer class="bg-dark pt-8 pb-6 footer text-muted">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-4 mb-6 mb-md-0">
        <a class="d-block mb-2" href="#">
          <!-- <img src="images/logo-white-primary.png" alt="HomeID" /> -->
          <h4 style="color:white">Shubham Enterprises</h4>
        </a>
        <div class="lh-26 font-weight-500">
          <p class="mb-0"> <i class="fa fa-map-marker"></i> <?= $social['address'] ?></p>
          <a class="d-block text-muted hover-white" href="mailto:<?= $social['email'] ?>"><i class="fa fa-envelope"></i> <?= $social['email'] ?></a>
          <a class="d-block text-lighter font-weight-bold fs-15 hover-white" href="#"> <i class="fa fa-phone"></i> +91 <?= $social['phone'] ?></a>

        </div>
      </div>
      <!-- <div class="col-md-6 col-lg-2 mb-6 mb-md-0">
        <h4 class="text-white fs-16 my-4 font-weight-500">
          Popular Searches
        </h4>
        <ul class="list-group list-group-flush list-group-no-border">
          <li class="list-group-item bg-transparent p-0">
            <a href="all-property.php" class="text-muted lh-26 font-weight-500 hover-white">Apartment for Rent</a>
          </li>
          <li class="list-group-item bg-transparent p-0">
            <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Apartment Low to hide</a>
          </li>
          <li class="list-group-item bg-transparent p-0">
            <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Offices for Buy</a>
          </li>
          <li class="list-group-item bg-transparent p-0">
            <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Offices for Rent</a>
          </li>
        </ul>
      </div> -->
      <div class="col-md-6 col-lg-4 mb-6 mb-md-0">
        <h4 class="text-white fs-16 my-4 font-weight-500">Quick links</h4>
        <ul class="list-group list-group-flush list-group-no-border">
          <li class="list-group-item bg-transparent p-0">
            <a href="services.php" class="text-muted lh-26 font-weight-500 hover-white">Our Services</a>
          </li>
          <li class="list-group-item bg-transparent p-0">
            <a href="property-add.php" class="text-muted lh-26 font-weight-500 hover-white">Add property</a>
          </li>
          <li class="list-group-item bg-transparent p-0">
            <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Contact Support</a>
          </li>
          <li class="list-group-item bg-transparent p-0">
            <a href="gallery.php" class="text-muted lh-26 hover-white font-weight-500">Our Gallery</a>
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
            <a href="<?= $social['twitter'] ?>" target="_blank" class="  fs-25 px-4 opacity-hover-10"><i class="fab fa-twitter"></i></a>
          </li>
          <li class="list-inline-item mr-0">
            <a href="<?= $social['fb'] ?>" target="_blank" class="  fs-25 px-4 opacity-hover-10"><i class="fab fa-facebook-f"></i></a>
          </li>

          <li class="list-inline-item mr-0">
            <a href="<?= $social['insta'] ?>" target="_blank" class="  fs-25 px-4 opacity-hover-10"><i class="fab fa-instagram"></i></a>
          </li>

          <li class="list-inline-item mr-0">
            <a href="<?= $social['youtube'] ?>" target="_blank" class="  fs-25 px-4 opacity-hover-10"><i class="fab fa-youtube"></i></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="mt-0 mt-md-10 row">
      <ul class="list-inline mb-0 col-md-6 mr-auto">
        <!-- <li class="list-inline-item mr-6">
          <a href="#" class="text-muted lh-26 font-weight-500 hover-white">Terms of Use</a>
        </li> -->
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

<?php include 'cookies.php'; ?>