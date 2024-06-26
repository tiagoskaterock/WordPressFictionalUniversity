<?php get_header(); ?>

<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?= get_theme_file_uri() ?>/images/ocean.jpg)"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">
      All Events
    </h1>
    <div class="page-banner__intro">
      <p>
        See what's wating for you
      </p>
    </div>
  </div>
</div>

<div class="container container--narrow page-section">
  <?php 
    while (have_posts()) {
      the_post(); 
      // Recupera a data do evento
      $data_evento = get_post_meta(get_the_ID(), '_meu_prefixo_data', true);
      // Converte a data para o formato "d/m/Y"
      $data_formatada = date('d/m/Y', strtotime($data_evento));
  ?>
      
      <div class="event-summary">
        <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">          
          <span class="event-summary__month"><?php echo date('M', strtotime($data_evento)); ?></span>
          <span class="event-summary__day"><?php echo date('d', strtotime($data_evento)); ?></span>
        </a>
        <div class="event-summary__content">
          <h5 class="event-summary__title headline headline--tiny">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h5>
          <p>
            <?php echo wp_trim_words(get_the_content(), 18); ?>
            <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a>
          </p>
        </div>
      </div> 

  <?php } // End while ?>

  <?php echo paginate_links(); ?>  

  <hr class="section-break">

  <div class="generic-content"> 

    <p> 
      <a 
        class="btn btn--blue"
        href="<?= site_url(); ?>/past-events" 
        title="Past Events"
        > 
        See our Past Events
      </a>
    </p>
      
  </div>

</div>

<?php get_footer(); ?>
