{{--
  Title: Grid Posts Selector
  Category: formatting
  Icon: admin-comments
  Keywords: testimonial quote
  Align: full
  Mode: preview
--}}

<section data-{{$block['id']}} class="{{$block['classes']}} max-w-screen-xl mx-auto p-5">
  <?php
  $featured_posts = get_field('featured_posts');
  if( $featured_posts ): ?>

    <ul class="flex flex-row gap-x-12 gap-y-12">
      <?php foreach( $featured_posts as $featured_post ): 
        $permalink = get_permalink( $featured_post->ID );
        $title = get_the_title( $featured_post->ID );
        $featuredImg = the_post_thumbnail_url( $featured_post->ID );
        // $custom_field = get_field( 'field_name', $featured_post->ID );
        ?>
        <li class="flex-1" id="post-<?php the_ID(); ?>">
          <div class="featuredImage h-60 mb-4 border-2 border-black">
            <?php $backgroundImg = wp_get_attachment_image_src( the_post_thumbnail_url($post->ID), 'post-image' );?>
            <img src="<?php echo esc_url( $featuredImg ); ?>" class="w-full h-full object-cover">
          </div>
          <a class="text-2xl font-bold mb-4" href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</section>

<style type="text/css">
[data-{{$block['id']}}] {
  background: {{get_field('color')}};
}
</style>
