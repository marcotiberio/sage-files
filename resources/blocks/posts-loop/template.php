<?php
/**
 * Block Name: Posts Loop Block
 *
 * Description: Displays a list of posts.
 */

// The block attributes
$block = $args['block'];

// The block data
$data = $args['data'];

// Dynamic block ID
$block_id = 'posts-loop-block-' . $block['id'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];
?>

<section class="max-w-screen-xl mx-auto p-5">
  <div class="preContent mb-lg">
    <h1 class="mb-sm text-4xl font-extrabold tracking-tight leading-none text-black md:text-5xl lg:text-6xl text--<?php the_field('alignment'); ?>"><?php the_field('headline'); ?></h1>
    <div class="text-lg font-normal text-black text--{{the_field('alignment')}}"><?php the_field('content_html'); ?></div>
  </div>
    <ul class="flex flex-col lg:flex-row gap-x-12 gap-y-12" id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
        <?php
        if( $data['posts']->have_posts() ) {
            while( $data['posts']->have_posts() ) {
                $data['posts']->the_post(); ?>
                <li class="flex-1 p-md shadow-sm hover:shadow-lg rounded-sm w-full">
                    <a class="text-gray" href="<?php the_permalink(); ?>">
                    <div class="featuredImage h-60 mb-sm border-1 border-black">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" class="w-full h-full object-cover">
                    </div>
                    <div class="text-md font-normal rounded-sm bg-lightgray text-black mb-sm w-min px-sm">
                        <?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo esc_html( $categories[0]->name ); }?>
                    </div>
                    <div class="text-2xl text-black font-bold mb-sm"><?php the_title(); ?></div>
                    <div class="text-lg font-normal text-gray">
                        <?php
                        $content = do_blocks(get_the_content());
                        $excerpt = wp_trim_words($content, 20);
                        echo $excerpt;
                        ?>
                    </div>
                    </a>
                </li>
        <?php }} ?>
    </ul>
</section>
