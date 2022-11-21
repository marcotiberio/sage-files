<footer class="content--info p-4 py-6 mx-auto md:p-8 lg:-10 bg-white text-black">
  <div class="grid grid-cols-2 gap-8 lg:grid-cols-6">
      <div class="col-span-2">
        <div class="description"><?php the_field('descriptionHtml', 'option'); ?></div>
        <div class="socials flex flex-row mt-5 space-x-6">
          <?php if( have_rows('social_media', 'options') ): ?>
            <?php while( have_rows('social_media', 'options') ): the_row();
                ?>
                <a class="capitalize mr-sm" href="{{the_sub_field('social_url')}}" target="_blank">{{the_sub_field('social_channel')}}</a>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="lg:mx-auto">
        <h2 class="mb-6 text-sm font-semibold uppercase">Company</h2>
        <nav class="nav-footer text-black" aria-label="{{ wp_get_nav_menu_name('footer_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav', 'items_wrap' => '<ul class="nav your_custom_class">%3$s</ul>', 'echo' => false]) !!}
        </nav>
      </div>
      <div class="lg:mx-auto">
        <h2 class="mb-6 text-sm font-semibold uppercase">Help center</h2>
        <nav class="nav-footer text-black" aria-label="{{ wp_get_nav_menu_name('footer_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav', 'items_wrap' => '<ul class="nav your_custom_class">%3$s</ul>', 'echo' => false]) !!}
        </nav>
      </div>
      <div class="lg:mx-auto">
        <h2 class="mb-6 text-sm font-semibold uppercase">Legal</h2>
        <nav class="nav-footer text-black" aria-label="{{ wp_get_nav_menu_name('footer_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav', 'items_wrap' => '<ul class="nav your_custom_class">%3$s</ul>', 'echo' => false]) !!}
        </nav>
      </div>
      <div class="lg:mx-auto">
        <h2 class="mb-6 text-sm font-semibold uppercase">Download</h2>
        <nav class="nav-footer text-black" aria-label="{{ wp_get_nav_menu_name('footer_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav', 'items_wrap' => '<ul class="nav your_custom_class">%3$s</ul>', 'echo' => false]) !!}
        </nav>
      </div>
  </div>
</footer>
