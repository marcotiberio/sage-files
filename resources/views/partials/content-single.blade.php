<article @php(post_class())>
  <header class="max-w-screen-xl mx-auto my-lg">
    <div class="mb-sm border-1 border-black">
      <img src="<?php the_post_thumbnail_url('large'); ?>" class="w-full h-full object-cover">
    </div>
    <h1 class="entry-title p-4 text-4xl">
      {!! $title !!}
    </h1>

    {{-- @include('partials.entry-meta') --}}
  </header>

  <div class="entry-content">
    @php(the_content())
  </div>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>

</article>
