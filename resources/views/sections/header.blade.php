<header class="banner p-5 bg-white">
  <a class="brand text-black text-lg font-bold" href="{{ home_url('/') }}">
    {!! $siteName !!}
  </a>

  @if (has_nav_menu('primary_navigation'))
    <nav class="nav-primary text-black" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'items_wrap' => '<ul class="nav your_custom_class">%3$s</ul>', 'echo' => false]) !!}
    </nav>
  @endif

  <div class="cta">
    <a class="bg-black hover:bg-white border border-white hover:border hover:border-black inline-flex justify-center items-center py-2 px-6 text-base font-medium text-center text-white hover:text-black" href="#">Donate</a>
  </div>
</header>
