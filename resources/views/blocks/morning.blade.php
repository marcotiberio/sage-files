{{--
  Title: Morning
  Category: formatting
  Icon: admin-comments
  Keywords: testimonial quote
  Align: full
  Mode: preview
  EnqueueStyle: styles/blocks/hero.scss
  EnqueueScript: script/blocks/hero.js
--}}

<section data-{{$block['id']}} class="{{$block['classes']}}">
  <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-black md:text-5xl lg:text-6xl">{{the_field('headline')}}</h1>
    <p class="mb-8 text-lg font-normal text-black lg:text-xl sm:px-16 xl:px-48">{{the_field('content_html')}}</p>
    <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
      <?php 
      $link = get_field('primary_button');
      if( $link ): 
          $link_url = $link['url'];
          $link_title = $link['title'];
          $link_target = $link['target'] ? $link['target'] : '_self';
          ?>
          <a class="bg-black hover:bg-white border border-white hover:border hover:border-black inline-flex justify-center items-center py-2 px-6 text-base font-medium text-center text-white hover:text-black" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
      <?php endif; ?>
      <?php 
      $link = get_field('secondary_button');
      if( $link ): 
          $link_url = $link['url'];
          $link_title = $link['title'];
          $link_target = $link['target'] ? $link['target'] : '_self';
          ?>
          <a class="bg-white hover:bg-black border border-black inline-flex justify-center items-center py-2 px-6 text-base font-medium text-center text-black hover:text-white" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
      <?php endif; ?>
    </div>
  </div>
</section>

<style type="text/css">
[data-{{$block['id']}}] {
  background: {{get_field('color')}};
}
</style>
