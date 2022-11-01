{{--
  Title: Testimonial
  Description: test
  Category: formatting
  Icon: admin-comments
  Keywords: testimonial quote
  Align: full
  Mode: preview
  EnqueueStyle: styles/blocks/testimonial.scss
--}}

<section data-{{$block['id']}} class="{{$block['classes']}}">
  <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
      <figure class="max-w-screen-md mx-auto">
          <svg class="h-12 mx-auto mb-3 text-primary" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" fill="currentColor"/>
          </svg> 
          <blockquote>
              <div class="text-2xl font-medium text-white">{{the_field('testimonialText')}}</div>
          </blockquote>
          <figcaption class="flex items-center justify-center mt-6 space-x-3">
              <?php 
                $image = get_field('authorPic');
                if( !empty( $image ) ): ?>
                  <img class="w-6 h-6 rounded-full"  src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
              <?php endif; ?>
              <div class="flex items-center divide-x-2 divide-white opacity-70">
                  <div class="pr-3 font-medium text-white ">{{the_field('author')}}</div>
                  <div class="pl-3 text-sm font-light text-white">{{the_field('authorPosition')}}</div>
              </div>
          </figcaption>
      </figure>
  </div>
</section>

{{-- <blockquote data-{{$block['id']}} class="{{$block['classes']}}">
  <p>{{the_field('testimonial')}}</p>
  <cite>
    <img src="{{get_field('picture')['url']}}" alt="{{get_field('picture')['alt']}}" />
    <span>{{the_field('author')}}</span>
  </cite>
</blockquote> --}}

<style type="text/css">
[data-{{$block['id']}}] {
  background: {{get_field('color')}};
}
</style>
