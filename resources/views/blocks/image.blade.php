{{--
  Title: Image Custom
  Category: formatting
  Icon: admin-comments
  Keywords: testimonial quote
  Align: full
  Mode: preview
  EnqueueStyle: styles/blocks/image.scss
--}}

<section data-{{$block['id']}} class="{{$block['classes']}} p-4">
  <div class="max-w-screen-xl mx-auto">
      <figure class="max-w-screen-md mx-auto">
        <?php 
          $image = get_field('image_main');
          if( !empty( $image ) ): ?>
            <img class=""  src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
      </figure>
  </div>
</section>

<style type="text/css">
[data-{{$block['id']}}] {
  background: {{get_field('color')}};
}
</style>
