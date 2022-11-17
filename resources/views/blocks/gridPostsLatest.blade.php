{{--
  Title: Grid Posts Latest
  Category: formatting
  Icon: admin-comments
  Keywords: testimonial quote
  Align: full
  Mode: preview
  EnqueueStyle: styles/blocks/gridPostsLatest.scss
--}}

<section data-{{$block['id']}} class="{{$block['classes']}} max-w-screen-xl mx-auto p-5">
  <div class="preContent mb-lg">
    <h1 class="mb-sm text-4xl font-extrabold tracking-tight leading-none text-black md:text-5xl lg:text-6xl text--{{the_field('alignment')}}">{{the_field('headline')}}</h1>
    <div class="text-lg font-normal text-black text--{{the_field('alignment')}}">{{the_field('content_html')}}</div>
  </div>
  <ul class="flex flex-col lg:flex-row gap-x-12 gap-y-12">
  <?php
    $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'orderby' => 'date',
      'order' => 'DESC',
      'posts_per_page' => -1,
    );
    $query = new WP_Query( $args );

    if( $query->have_posts() ) :
      while( $query->have_posts() ) :
      $query->the_post();
        // if ( $query->have_posts() ) :

        //   while ( $query->have_posts() ) :
        //     $query->the_post();
        //     $categories = get_the_category();
        //     // $cls = '';
        //     // if ( ! empty( $categories ) ) {
        //     //   foreach ( $categories as $cat ) {
        //     //     $cls .= $cat->slug . ' ';
        //     //   }
        //     // }
        ?>

        <li class="flex-1 p-md shadow-black w-full">
          <a class="text-gray" href="@php(the_permalink())">
            <div class="featuredImage h-60 mb-sm border-1 border-black">
              <img src="<?php the_post_thumbnail_url('large'); ?>" class="w-full h-full object-cover">
            </div>
            <div class="text-2xl text-black font-bold mb-sm">@php(the_title())</div>
            <div class="text-md font-normal text-gray mb-sm">
              <?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo esc_html( $categories[0]->name ); }?>
            </div>
            <div class="text-lg font-normal text-gray">@php(the_excerpt())</div>
          </a>
        </li>

        <?php
      endwhile;
    endif;
  ?>
  </ul>
</section>

<style type="text/css">
[data-{{$block['id']}}] {
  li {
    box-shadow: 0px 4px 6px -1px rgba(0, 0, 0, 0.1), 0px 2px 4px -2px rgba(0, 0, 0, 0.05);
    border-radius: 8px;
  }
}
</style>
