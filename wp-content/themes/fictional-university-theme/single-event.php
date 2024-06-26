<?php 
get_header();
while (have_posts()) {
  the_post(); 
  // Recupera a data do evento
  $data_evento = get_post_meta( get_the_ID(), '_meu_prefixo_data', true );
  // Converte a data para o formato "d/m/Y"
  $data_formatada = date('d/m/Y', strtotime($data_evento));
?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?= get_theme_file_uri() ?>/images/ocean.jpg)"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?= the_title() ?></h1>
      <div class="page-banner__intro">
        <!-- Substitua "Welcome to Events" pela data formatada -->
        <p><?= $data_formatada ?></p>
      </div>
    </div>
  </div>

  <div class="container container--narrow page-section">
    
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p>
        <a 
          class="metabox__blog-home-link" 
          href="<?php echo get_post_type_archive_link('event') ?>"
          title="Event Home"
          >
          <i class="fa fa-home" aria-hidden="true"></i> 
          Events Home
        </a> 
        <span class="metabox__main"><?php the_title() ?></span>
      </p>
    </div> 

    <div class="generic-content">
      <?php the_content() ?>
    </div>
  </div>
  
<?php
}      
get_footer();
