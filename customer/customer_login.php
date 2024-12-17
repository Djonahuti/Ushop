
<div class="col-md-8" >
<div class="card">
<div class="card-header text-center" >
<h2>Login</h2>
<p class="lead" >Already our Customer</p>
<p class="text-muted" >
Your Information is safe with Us
</p>
</div>

<div class="card-body">
<form action="checkout.php" method="post" >

<div class="form-group" >

<label>Email</label>

<input type="text" id="customer_email" class="form-control" name="customer_email" required >

</div>

<div class="form-group" >

<label>Password</label>

<input type="password" id="customer_pass" class="form-control" name="customer_pass" required >

<h4 class="text-center mt-2">

<a href="forgot_pass.php"> Forgot Password </a>

</h4>

</div>

<div class="text-center" >

<button name="login" value="Login" class="btn btn-primary" >

<i class="fa fa-sign-in" ></i> Log in

</button>

</div>


</form>

<div class="text-center">

<a href="customer_register.php" >

<p class="fw-bold">New ?<span class="fst-italic"> Register Here</span></p>

</a>


</div>
</div>
</div>

</div>

<?php

if(isset($_POST['login'])){

$customer_email = $_POST['customer_email'];

$customer_pass = $_POST['customer_pass'];

$select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

$run_customer = mysqli_query($con,$select_customer);

$get_ip = getRealUserIp();

$check_customer = mysqli_num_rows($run_customer);

$select_cart = "select * from cart where ip_add='$get_ip'";

$run_cart = mysqli_query($con,$select_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_customer==0){

echo "<script>alert('password or email is wrong')</script>";

exit();

}

if($check_customer==1 AND $check_cart==0){

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

}
else {

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('checkout.php','_self')</script>";

} 


}

?>