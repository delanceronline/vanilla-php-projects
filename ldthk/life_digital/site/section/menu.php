<?php 
ob_start();
session_start();
include_once 'config.inc.php';
?>
<!-- Menu Start -->
<div class="contain-to-grid sticky">
<nav class="top-bar" data-topbar>
  <ul class="title-area">
    <li class="name">
      <h1 class="m-logo"><a href="index.php">LDTHK</a></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <!--<li class="active"><a href="#">Right Button Active</a></li>-->
      <li class="divider"></li>
      <li><a class="" href="index.php">主頁</a></li>
      <li class="divider"></li>
      <li><a class="" href="about.php">關於我們</a></li>
      <li class="divider"></li>
      <li><a class="" href="product-cat.php">產品</a></li>
      <li class="divider"></li>
      <li><a class="" href="news.php">最新消息</a></li>
      <li class="divider"></li>
      <li><a class="" href="project.php">安裝工程</a></li>
      <li class="divider"></li>
      <li><a class="" href="contact.php">聯絡我們</a></li>
      <li class="divider"></li>
      <li class="has-form">
          <a class="small round button" id="cart_size" href="cart-shop.php">Cart (<?php echo isset($_SESSION['cart'])?sizeof($_SESSION['cart']):0;?>)</a>
      </li>
      <!--<li class="has-form has-form-last">
        <a class="small round button button-login" href="#">Login</a>
      </li>-->
    </ul>
    
  </section>
</nav>
</div>
<!-- Menu End-->