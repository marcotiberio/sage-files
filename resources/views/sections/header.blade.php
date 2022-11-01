<header class="banner p-5 bg-black">
  <a class="brand text-white hover:text-lime" href="{{ home_url('/') }}">
    {!! $siteName !!}
  </a>

  @if (has_nav_menu('primary_navigation'))
    <nav class="nav-primary text-white" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'items_wrap' => '<ul class="nav your_custom_class">%3$s</ul>', 'echo' => false]) !!}
    </nav>
  @endif
</header>
