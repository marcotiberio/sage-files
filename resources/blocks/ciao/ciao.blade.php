{{--
  Title: Ciao
  Category: formatting
  Icon: admin-comments
  Align: full
  Mode: preview
  EnqueueStyle: style.scss
  EnqueueScript: script.js
--}}

<section data-{{$block['id']}} class="{{$block['classes']}} max-w-screen-xl mx-auto p-5">
  <div class="content">
    {{the_field('contentHtml')}}
  </div>
</section>
  
  <style type="text/css">
  [data-{{$block['id']}}] {
    background: {{get_field('color')}};
  }
  </style>
