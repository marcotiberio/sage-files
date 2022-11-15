@if( !empty($test_posts) )
  <ul class="flex flex-row gap-x-12 gap-y-12">

    @foreach($test_posts as $the_post)

        <li class="flex-1">
          <a class="text-black" href="{!! $the_post['post_permalink']!!}">
            <div class="featuredImage h-60 mb-4 border-2 border-black">
              <img src="<?php the_post_thumbnail_url('large'); ?>" class="w-full h-full object-cover">
            </div>
            <div class="text-2xl font-bold mb-4">{!! $the_post['post_title']!!}</div>
            {{-- @include('partials.entry-meta') --}}
            {{-- <div class="mb-8 text-lg font-normal text-black">@php(the_excerpt())</div> --}}
          </a>
        </li>
        
        @endforeach
        
  </ul>
