<?php get_header(); ?>

<section class="container section">
  <?php while (have_posts()): the_post(); ?>
    <h1 class="page-title"><?php the_title(); ?></h1>
    <p class="muted"><?php echo get_the_date(); ?></p>
    <div class="content"><?php the_content(); ?></div>
  <?php endwhile; ?>
</section>

<?php get_footer(); ?>
