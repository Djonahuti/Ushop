<!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
        <a class="navbar-brand js-scroll-trigger" href="https://www.ushop.com.ng" style="font-family: 'Lobster Two', cursive">
                <i class="fas fa-store"></i>U-Shop</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="shop.php">Market</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i>
              </a></li>
                        <li class="nav-item dropdw">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" title="Log in or Sign up" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-alt"></i><?php
          if(!isset($_SESSION['customer_email'])){
          echo "Welcome :Guest"; 
          }
          else
          { 
              echo "Welcome : " . $_SESSION['customer_email'] . "";
            }
?>
              </a>
              <div class="dropdw-content dropdown-menu-right" aria-labelledby="navbarDropdownBlog" id="login">
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