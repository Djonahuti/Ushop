<div class='portfolio-item'>
    <div class='card h-100'>

        <?php
        
        $customer_session = $_SESSION['customer_email'];
        
        $get_customer = "select * from customers where customer_email='$customer_session'";
        
        $run_customer = mysqli_query($con,$get_customer);
        
        $row_customer = mysqli_fetch_array($run_customer);
        
        $customer_image = $row_customer['customer_image'];
        
        $customer_name = $row_customer['customer_name'];
        
        if(!isset($_SESSION['customer_email'])){
        
        
        }
        else {
        
        echo "
        
         <img class='card-img-top' id='myimage' src='customer_images/$customer_image' alt=''>
         <div class='card-body'>
             <h4 class='card-title'><strong>Name:</strong> <em>$customer_name </em></h4>

             ";
             
             }
             
             ?>
            
             <p class='card-footer'>

                <ul class="navy nav-pills navy-stacked"><!-- nav nav-pills nav-stacked Starts -->
                
                <li class="<?php if(isset($_GET['my_orders'])){ echo "active"; } ?>">
                
                <a href="my_account.php?my_orders"> <i class="fa fa-list"> </i> My Orders </a>
                
                </li>
                
                <li class="<?php if(isset($_GET['pay_offline'])){ echo "active"; } ?>">
                
                <a href="my_account.php?pay_offline"> <i class="fa fa-bolt"></i> Pay Offline </a>
                
                </li>
                
                <li class="<?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">
                
                <a href="my_account.php?edit_account"> <i class="fa fa-pencil"></i> Edit Account </a>
                
                </li>
                
                <li class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">
                
                <a href="my_account.php?change_pass"> <i class="fa fa-user"></i> Change Password </a>
                
                </li>
                
                <li class="<?php if(isset($_GET['my_wishlist'])){ echo "active"; } ?>">
                
                <a href="my_account.php?my_wishlist"> <i class="fa fa-heart"></i> My WishList </a>
                
                </li>
                
                <li class="<?php if(isset($_GET['delete_account'])){ echo "active"; } ?>">
                
                <a href="my_account.php?delete_account"> <i class="fa fa-trash-o"></i> Delete Account </a>
                
                </li>
                
                <li>
                
                <a href="logout.php"> <i class="fa fa-sign-out"></i> Logout </a>
                
                </li>
                
                
                </ul><!-- nav nav-pills nav-stacked Ends -->
             </p>
         </div>
     </div>
    </div>