
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding:20px">
      <b> <a class="navbar-brand" href="<?php echo site_url(); ?>">FoodShala</a></b>
      <?php if (isset($_SESSION['u_id'])):?>
      <a class="navbar-brand">Hello <?= $this->session->userdata['name']?> !</a>
      <?php endif?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup" >
        <div class="navbar-nav " >
        <a class="nav-item nav-link active" href="<?=site_url('home')?>">Home</a>
          <?php if (!isset($_SESSION['u_id'])):?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Register
            </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?php echo site_url(); ?>customer_register">Customer</a>
            <a class="dropdown-item" href="<?php echo site_url(); ?>restaurant_register">Restaurant</a>
          </div>
          </li>
          <a class="nav-item nav-link active" href="<?php echo site_url(); ?>login">Login</a>
          <?php elseif($this->session->userdata['authorization']==1):?>
          <a class="nav-item nav-link active" href="<?php echo site_url(); ?>additem">Add Menu</a>
          <a class="nav-item nav-link active" href="<?php echo site_url(); ?>orderdetails">Order Details</a>
          <a class="nav-item nav-link active" href="<?=site_url('login/logout')?>">Logout</a>
          <?php else:?>
          <a class="nav-item nav-link active" href="<?php echo site_url(); ?>cart">Cart</a>
          <a class="nav-item nav-link active" href="<?php echo site_url(); ?>myorder">My Order</a>
          <a class="nav-item nav-link active" href="<?=site_url('login/logout')?>">Logout</a>
          <?php endif?>
          
        </div>
      </div>
    </nav>
  </header>
<body>
