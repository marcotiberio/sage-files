{{--
  Title: Accordion Dropdown
  Category: formatting
  Icon: admin-comments
  Align: full
  Mode: preview
--}}

<section data-{{$block['id']}} class="{{$block['classes']}} max-w-screen-xl mx-auto p-5">
  <div x-data="{ open: false }" class="py-5">
    <div class="container w-screen flex-1 flex-row flex-wrap ">
    <?php if( have_rows('repeater') ): ?>
      <?php while( have_rows('repeater') ): the_row(); 
          ?>
          <div x-data="{ open: false }" class="panel mb-5 last:mb-0">
            <button x-on:click="open = ! open" data-target="accordion-<?php echo get_row_index(); ?>" class="text-2xl hover:text-brand mb-2.5">{{the_sub_field('title')}}</button>
            <div x-show="open" x-transition.opacity id="accordion-<?php echo get_row_index(); ?>">
              {{the_sub_field('contentHtml')}}
            </div>
          </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
  </div>
</section>

<style type="text/css">
[data-{{$block['id']}}] {
  background: {{get_field('color')}};
}
</style>
