<?php get_header(); ?>

<?php
  $title    = get_field('faq_title');
  $subtitle = get_field('faq_subtitle');
  $items    = get_field('faq_items');
?>

<section class="container section">
  <?php if ($title): ?>
    <h1 class="page-title"><?php echo esc_html($title); ?></h1>
  <?php endif; ?>

  <?php if ($subtitle): ?>
    <p class="muted"><?php echo nl2br(esc_html($subtitle)); ?></p>
  <?php endif; ?>

  <?php if (is_array($items) && count($items)): ?>
    <div class="content" style="margin-top:16px;">
      <?php foreach ($items as $it): ?>
        <?php
          $icon = $it['icon'] ?? '❓';
          $q    = $it['question'] ?? '';
          $a    = $it['answer'] ?? '';
        ?>

        <?php if ($q): ?>
          <p>
            <strong><?php echo esc_html($icon . ' ' . $q); ?></strong><br>
            <?php echo nl2br(esc_html($a)); ?>
          </p>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</section>

<?php get_footer(); ?>
