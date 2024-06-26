<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>  
  <meta charset="<?php bloginfo('charset') ?>">
  <?php wp_head() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body <?php body_class() ?>>		

<header class="site-header">
    <div class="container">
      <h1 class="school-logo-text float-left">
        <a href="<?= site_url() ?>"><strong>Fictional</strong> University</a>
      </h1>
      <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
      <div class="site-header__menu group">
        <nav class="main-navigation">
          <?php 
            /*
            wp_nav_menu(array(
              'theme_location' => 'headerMenuLocation',
            )) 
            */
          ?>
          
          <ul>
            <li <?php if(is_page('about-us') or wp_get_post_parent_id(0) == 16) echo "class='current-menu-item'" ?>>
              <a href="<?= site_url() ?>/about-us" title="About Us">About Us</a> 
            </li>


            <li 
              <?php if (get_post_type() == 'event' or is_page('past-events')): ?>
                class='current-menu-item'
              <?php endif ?>
            >
              <a 
                href="<?= site_url() ?>/events" 
                title="Events">
                Events
              </a> 
            </li>


            <li <?php if(get_post_type() == 'post') echo "class='current-menu-item'" ?>>
              <a href="<?= site_url() ?>/blog" title="Blog">Blog</a> 
            </li>
          </ul>
          
        </nav>
        <div class="site-header__util">

          <!-- login -->
          <a 
            href="<?php echo site_url('wp-admin') ?>" 
            class="btn btn--small btn--orange float-left push-right">
            Login
          </a>

          <!-- sign up -->
          <a 
            href="#" 
            class="btn btn--small btn--dark-orange float-left">
            Sign Up
          </a>

          <!-- menu hamburger -->
          <span 
            class="search-trigger js-search-trigger">
            <i class="fa fa-search" aria-hidden="true"></i>
          </span>

        </div>

      </div>

    </div>

  </header>
