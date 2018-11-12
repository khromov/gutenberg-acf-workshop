<?php
/**
 * @param   array $block The block settings and attributes.
 * @param   bool $is_preview True during AJAX preview.
 */
?>
<figure class="block-factbox">
  <figcaption class="block-factbox-header">
    <?php echo get_field('title'); ?>
  </figcaption>
	<hr>
  <?php if(get_field('image')): ?>
  <div class="block-factbox-image-container">
    <?php echo wp_get_attachment_image(get_field('image'), 'large'); ?>
  </div>
  <?php endif; ?>
  <?php echo get_field('text'); ?>
</figure>


