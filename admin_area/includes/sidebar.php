<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php?dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-people-group"></i></div>
                                Customers
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="index.php?view_customers">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users-line"></i></div> View Customers</a>
                                    <a class="nav-link" href="index.php?view_orders">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div>View Customer Orders</a>
                                    <a class="nav-link" href="index.php?view_payments">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div>View Payments</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                                Admin Panel
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    <i class="fa-solid fa-sitemap"></i>Products
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="index.php?insert_product">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-plus"></i></div>Add Product</a>
                                            <a class="nav-link" href="index.php?view_products">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-pen-to-square"></i></div>View Products</a>
                                            <a class="nav-link" href="index.php?insert_bundle">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-plus"></i></div>Insert Bundle</a>
                                            <a class="nav-link" href="index.php?view_bundles">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-pen-to-square"></i></div>View Bundles</a>
                                            <a class="nav-link" href="index.php?insert_rel">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-plus"></i></div>Insert Relation</a>
                                            <a class="nav-link" href="index.php?view_rel">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-pen-to-square"></i></div>View Relations</a>
                                            <a class="nav-link" href="index.php?insert_manufacturer">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-plus"></i></div>Add Manufacturers</a>
                                            <a class="nav-link" href="index.php?view_manufacturers">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-plus"></i></div>View Manufacturers</a>
                                            <a class="nav-link" href="index.php?insert_cat">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-layer-group"></i><i class="fa-solid fa-pencil"></i></div>Insert Categories</a>
                                            <a class="nav-link" href="index.php?view_cats">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-layer-group"></i><i class="fa-solid fa-pencil"></i></div>View Categories</a>
                                            <a class="nav-link" href="index.php?insert_p_cat">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-layer-group"></i><i class="fa-solid fa-pencil"></i></div>Add Product Category</a>
                                            <a class="nav-link" href="index.php?view_p_cats">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-layer-group"></i><i class="fa-solid fa-pencil"></i></div>View Product Category</a>
                                            <a class="nav-link" href="index.php?insert_coupon">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-layer-group"></i><i class="fa-solid fa-pencil"></i></div>Insert Coupons</a>
                                            <a class="nav-link" href="index.php?view_coupons">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-layer-group"></i><i class="fa-solid fa-pencil"></i></div>View Coupons</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    <i class="fa-brands fa-black-tie"></i> Edit Pages
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="index.php?edit_about_us">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill-1-wave"></i></div>Edit About Us Page</a>
                                            <a class="nav-link" href="index.php?edit_contact_us">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-tie"></i></div>Edit Contact Page</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    <i class="fa-brands fa-black-tie"></i> Enquiry Section
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="index.php?insert_enquiry">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill-1-wave"></i></div>Insert Enquiry</a>
                                            <a class="nav-link" href="index.php?view_enquiry">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-tie"></i></div>View Enquiry</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    <i class="fa-brands fa-black-tie"></i> Terms
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="index.php?insert_term">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill-1-wave"></i></div>Insert Terms</a>
                                            <a class="nav-link" href="index.php?view_terms">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-tie"></i></div>View Terms</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    <i class="fa-brands fa-black-tie"></i> Admin Details
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="index.php?insert_user">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill-1-wave"></i></div>Grant Admin</a>
                                            <a class="nav-link" href="index.php?view_users">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill-1-wave"></i></div>View Admin</a>
                                            <a class="nav-link" href="index.php?user_profile=<?php echo $admin_id; ?>">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-tie"></i></div>Admin Profile</a>
                                            <a class="nav-link" href="logout.php"><i class="fa fa-fw fa-power-off"></i>Logout</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $admin_name; ?> 
                    </div>
                </nav>
            </div>

<?php } ?>