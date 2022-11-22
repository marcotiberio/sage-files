<header class="header flex flex-row justify-between items-center p-5 bg-white shadow-sm">
  <a class="logo text-black text-lg font-bold" href="{{ home_url('/') }}">
    {!! $siteName !!}
  </a>

  @if (has_nav_menu('primary_navigation'))
  <div class="nav">
    <div x-data="{ open: false }"  class="nav--desktop">
      <nav class="nav-primary text-black" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'items_wrap' => '<ul class="nav your_custom_class">%3$s</ul>', 'echo' => false]) !!}
      </nav>
    </div>
    <div x-data="{ open: false }" class="nav--mobile">
      <div x-on:click="open = ! open" :class="{'open': open, 'closed': ! open}"  class="hamburger relative h-[18px] w-[30px]">
        <span class="hamburger-barOne bg-black absolute rounded h-[3px] w-[30px] top-[0px] ease-linear duration-100"></span>
        <span class="hamburger-barTwo bg-black absolute rounded h-[3px] w-[30px] top-[9px] ease-linear duration-100"></span>
        <span class="hamburger-barThree bg-black absolute rounded h-[3px] w-[20px] top-[18px] ease-linear duration-100"></span>
      </div>
      <nav x-show="open" :class="{'open': open, 'closed': ! open}" class="nav-primary bg-white text-black text-center" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'items_wrap' => '<ul class="nav your_custom_class">%3$s</ul>', 'echo' => false]) !!}
      </nav>
    </div>
  </div>
  @endif

  <div class="cta">
    <?php 
      $link = get_field('button', 'option');
      if( $link ): 
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
        <a class="bg-black hover:bg-white border border-white hover:border hover:border-black inline-flex justify-center items-center py-2 px-6 text-base font-medium text-center text-white hover:text-black ease-linear duration-200" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
      <?php endif; ?>
  </div>
</header>
