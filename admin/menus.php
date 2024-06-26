<?php
    // if($_COOKIE["usertype"] != "admin"){
    //     header('Location: ../index.php');
    // }
?>
<!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3"><?= $_COOKIE["name"] ?></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="users.php">
        <i class="fas fa-fw fa-home"></i>
        <span>Users</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="products.php">
        <i class="fas fa-fw fa-list"></i>
        <span>Products</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="orders.php">
        <i class="fas fa-fw fa-users"></i>
        <span>Orders</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="../logout.php">
        <i class="fas fa-fw fa-arrow-left"></i>
        <span>Logout</span></a>
</li>

</ul>
<!-- End of Sidebar -->