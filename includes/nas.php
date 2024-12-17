
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="https://www.ushop.com.ng">
                <i class="fas fa-store"></i>U Shop</a>
        <div class="btn-group">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button></div>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="shop.php" title="Shop With Us">Market
                </a>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php" title="About Us">
                About
                </a>
              </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="contact.php" title="Contact Us">Contact</a>
            </li>
                        <li class="nav-item">
                        <?php if (!isset($_SESSION['customer_email'])) { ?>
                            <a href="cart.php" class="nav-link">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        <?php } else { ?>
                            <a href="cart.php" class="nav-link">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="badge bg-primary"><?php items(); ?></span>
                            </a>
                        <?php } ?></li>
                        <li class="nav-item">
                        <?php if (!isset($_SESSION['customer_email'])) { ?>
                            <a href="wishlist.php" class="nav-link">
                                <i class="fas fa-heart"></i>
                            </a>
                        <?php } else { ?>
                            <a href="wishlist.php" class="nav-link">
                                <i class="fas fa-heart"></i>
                                <span class="badge bg-primary"><?php wishlistCount(); ?></span>
                            </a>
                        <?php } ?>
                        </li>
                        <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" title="Log in or Sign up" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-alt"></i><?php
          if(!isset($_SESSION['customer_email'])){
          echo ""; 
          }
          else
          { 
              echo "" . $_SESSION['customer_email'] . "";
            }
?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog" id="login">
<?php
if(!isset($_SESSION['customer_email'])){
  echo '<a class="dropdown-item" href="customer_register.php" title="Be part of us"><button type="button" class="btn btn-primary pb-modalreglog-submit">Register</button></a>';
} 
  else
  { 
      echo '<a class="dropdown-item" href="customer/my_account.php?my_orders" title="View Profile"><button type="button" class="btn btn-primary pb-modalreglog-submit">Profile</button></a>';
  }   
?> 

<?php
if(!isset($_SESSION['customer_email'])){
  echo '<a class="dropdown-item" href="checkout.php" title="Be part of us"><button type="button" class="btn btn-primary pb-modalreglog-submit">Log in</button></a>';
} 
  else
  { 
      echo '<a class="dropdown-item" href="logout.php" title="Logout"><button type="button" class="btn btn-primary pb-modalreglog-submit">Log out</button></a>';
  }   
?> 
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>