<!-- this is the front page, not the index.php -->

<?php get_header() ?>

<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?= get_theme_file_uri('/images/library-hero.jpg') ?>)"></div>
  <div class="page-banner__content container t-center c-white">
    <h1 class="headline headline--large">Welcome! BLOG #####</h1>
    <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
    <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
    <a href="#" class="btn btn--large btn--blue">Find Your Major</a>
  </div>
</div>

<div class="full-width-split group">

  <!-- event -->
  <div class="full-width-split__one">
    <div class="full-width-split__inner">
      <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>

      <?php  
        // Obtém a data atual no formato Ymd
        $today = date('Ymd');
        // Query personalizada para eventos futuros ordenados pela data
        $homePageEvents = new WP_Query(array(
          'posts_per_page' => 2,
          'post_type' => 'event',
          'meta_key' => '_meu_prefixo_data',
          'orderby' => 'meta_value_num',
          'order' => 'ASC',
          'meta_query' => array(
            array(
              'key' => '_meu_prefixo_data',
              'compare' => '>=',
              'value' => $today,
              'type' => 'DATE'
            )
          )
        ));

        while ($homePageEvents->have_posts()) {
          $homePageEvents->the_post(); 
          // Recupera a data do evento
          $data_evento = get_post_meta(get_the_ID(), '_meu_prefixo_data', true);
          // Converte a data para o formato "d/m/Y"
          $data_formatada = date('d/m/Y', strtotime($data_evento));
      ?>
          <div class="event-summary">
            <a class="event-summary__date t-center" href="<?php the_permalink() ?>">
              <span class="event-summary__month"><?php echo date('M', strtotime($data_evento)); ?></span>
              <span class="event-summary__day"><?php echo date('d', strtotime($data_evento)); ?></span>
            </a>
            <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny">
                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
              </h5>
              <p>
                <?php 
                  if (has_excerpt()) {
                    echo get_the_excerpt();
                  } else {
                    echo wp_trim_words(get_the_content(), 18);
                  } 
                ?> 
                <a href="<?php the_permalink() ?>" class="nu gray">Learn more</a>
              </p>
            </div>
          </div>          
      <?php } wp_reset_postdata(); ?>

      <p class="t-center no-margin">
        <a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn--blue">
          View All Events
        </a>
      </p>
    </div>
  </div>
  <!-- end events -->


  <!-- blog -->
  <div class="full-width-split__two">
    <div class="full-width-split__inner">
      <h2 class="headline headline--small-plus t-center">From Our Blog</h2>

      <?php 
        $homepagePosts = new WP_Query(array(
          'posts_per_page' => 2,
        ));

        while ($homepagePosts->have_posts()) {
          $homepagePosts->the_post(); ?>
          <div class="event-summary">
            <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink() ?>">
              <span class="event-summary__month"><?php the_time('M') ?></span>
              <span class="event-summary__day"><?php the_time('d') ?></span>
            </a>
            <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
              <p>
                <?php 
                  if (has_excerpt()) {
                    echo get_the_excerpt();
                  }
                  else {
                    wp_trim_words(get_the_content(), 18);
                  } 
                ?> 
                <a 
                  href="<?php the_permalink() ?>" 
                  class="nu gray">
                  Read more
                </a>
              </p>
            </div>
          </div>
        <?php } wp_reset_postdata();
      ?>        

      <p class="t-center no-margin">
        <a href="blog" class="btn btn--yellow">
          View All Blog Posts
        </a>
      </p>
    </div>
  </div>
  <!-- end blog -->

</div>

<div class="hero-slider">
  <div data-glide-el="track" class="glide__track">
    <div class="glide__slides">

      <!-- free food -->
      <div class="hero-slider__slide" style="background-image: url(<?= get_theme_file_uri() ?>/images/bus.jpg)">
        <div class="hero-slider__interior container">
          <div class="hero-slider__overlay">
            <h2 class="headline headline--medium t-center">Free Transportation</h2>
            <p class="t-center">All students have free unlimited bus fare.</p>
            <p class="t-center no-margin">
              <a 
                href="<?php echo site_url() ?>/free-transportation" 
                class="btn btn--blue">
                Learn more
              </a>
            </p>

          </div>
        </div>
      </div>

      <!-- an apple a day -->
      <div class="hero-slider__slide" style="background-image: url(<?= get_theme_file_uri() ?>/images/apples.jpg)">
        <div class="hero-slider__interior container">
          <div class="hero-slider__overlay">
            <h2 class="headline headline--medium t-center">An Apple a Day</h2>
            <p class="t-center">Our dentistry program recommends eating apples.</p>
            <p class="t-center no-margin">
              <a 
                href="<?php echo site_url() ?>/an-apple-a-day" 
                class="btn btn--blue">
                Learn more
              </a>
            </p>
          </div>
        </div>
      </div>

      <!-- free food -->
      <div class="hero-slider__slide" style="background-image: url(<?= get_theme_file_uri() ?>/images/bread.jpg)">
        <div class="hero-slider__interior container">
          <div class="hero-slider__overlay">
            <h2 class="headline headline--medium t-center">Free Food</h2>
            <p class="t-center">Fictional University offers lunch plans for those in need.</p>
            <p class="t-center no-margin">
              <a 
                href="<?php echo site_url() ?>/free-food" 
                class="btn btn--blue">
                Learn more
              </a>
            </p>
          </div>
        </div>
      </div>

    </div>
    <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
  </div>
</div>

<?php get_footer() ?>