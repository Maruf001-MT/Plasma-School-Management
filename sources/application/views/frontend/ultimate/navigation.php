<?php
$logo_light  = $this->settings_model->get_logo_light();
$system_name  = get_frontend_settings('website_title');
?>
<!-- ========== HEADER ========== -->
<header id="header" class="u-header u-header--bg-transparent u-header--white-nav-links-md u-header--sub-menu-dark-bg-md u-header--abs-top"
data-header-fix-moment="500"
data-header-fix-effect="slide">
<div class="u-header__section">
  <div id="logoAndNav" class="container">
    <!-- Nav -->
    <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space">
      <div class="u-header-center-aligned-nav__col">
        <!-- Logo -->
        <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center u-header__navbar-brand-text-white" href="<?php echo site_url('home');?>">
          <img src="<?php echo $logo_light;?>"
          style="height:35px;" />
        </a>
        <!-- End Logo -->

        <!-- Responsive Toggle Button -->
        <button type="button" class="navbar-toggler btn u-hamburger u-hamburger--white"
        aria-label="Toggle navigation"
        aria-expanded="false"
        aria-controls="navBar"
        data-toggle="collapse"
        data-target="#navBar">
        <span id="hamburgerTrigger" class="u-hamburger__box">
          <span class="u-hamburger__inner"></span>
        </span>
      </button>
      <!-- End Responsive Toggle Button -->
    </div>

    <!-- Navigation -->
    <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
      <ul class="navbar-nav u-header__navbar-nav">
        <li class="nav-item u-header__nav-item <?php if($page_name == 'home') echo 'active';?>">
          <a class="nav-link u-header__nav-link"
          href="<?php echo site_url('home');?>"><?php echo get_phrase('Home'); ?></a>
        </li>
        <li class="nav-item u-header__nav-item <?php if($page_name == 'noticeboard' || $page_name == 'notice_details') echo 'active';?>">
          <a class="nav-link u-header__nav-link"
          href="<?php echo site_url('home/noticeboard');?>"><?php echo get_phrase('Noticeboard'); ?></a>
        </li>
        <li class="nav-item u-header__nav-item <?php if($page_name == 'event') echo 'active';?>">
          <a class="nav-link u-header__nav-link "
          href="<?php echo site_url('home/events');?>"><?php echo get_phrase('Events'); ?></a>
        </li>
        <li class="nav-item u-header__nav-item <?php if($page_name == 'teacher') echo 'active';?>">
          <a class="nav-link u-header__nav-link"
          href="<?php echo site_url('home/teachers');?>"><?php echo get_phrase('Teachers'); ?></a>
        </li>
        <li class="nav-item u-header__nav-item <?php if($page_name == 'gallery' || $page_name == 'gallery_view') echo 'active';?>">
          <a class="nav-link u-header__nav-link"
          href="<?php echo site_url('home/gallery');?>"><?php echo get_phrase('Gallery'); ?></a>
        </li>
        <li class="nav-item u-header__nav-item <?php if($page_name == 'about') echo 'active';?>">
          <a class="nav-link u-header__nav-link"
          href="<?php echo site_url('home/about');?>"><?php echo get_phrase('About'); ?></a>
        </li>
        <li class="nav-item u-header__nav-item <?php if($page_name == 'contact') echo 'active';?>">
          <a class="nav-link u-header__nav-link"
          href="<?php echo site_url('home/contact');?>"><?php echo get_phrase('Contact'); ?></a>
        </li>
      </ul>
    </div>
    <!-- End Navigation -->

  </nav>
  <!-- End Nav -->
</div>
</div>
</header>
<!-- ========== END HEADER ========== -->
