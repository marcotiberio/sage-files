{{--
  Title: Grid Posts Latest
  Category: formatting
  Icon: admin-comments
  Keywords: testimonial quote
  Align: full
  Mode: preview
--}}

<section data-{{$block['id']}} class="{{$block['classes']}} max-w-screen-xl mx-auto p-5">
  <?php
  $featured_posts = get_field('grid_posts_latest');
  if( $featured_posts ): ?>
    <ul>
      <?php foreach( $featured_posts as $featured_post ):
          $permalink = get_permalink( $featured_post->ID );
          $title = get_the_title( $featured_post->ID );
          ?>
          <li>
              <a class="text-2xl font-bold" href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
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
