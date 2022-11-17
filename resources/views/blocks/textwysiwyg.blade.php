{{--
  Title: Text Editor
  Description: text editor
  Category: formatting
  Icon: admin-comments
  Keywords: testimonial quote
  Align: full
  Mode: preview
--}}

<section data-{{$block['id']}} class="{{$block['classes']}} max-w-screen-xl mx-auto p-5">
  <div class="content columns--{{the_field('columns')}}">
    {{the_field('contentHtml')}}
  </div>
</section>

<style type="text/css">
[data-{{$block['id']}}] {
  background: {{get_field('color')}};
}
</style>
