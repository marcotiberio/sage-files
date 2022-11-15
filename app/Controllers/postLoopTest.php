<?php

function post_loop_test() {

$query_result = $this->run_the_query();

if( $query_result->have_posts() ) : while( $query_result->have_posts() ) : 
    
    $test_posts->$query_result->posts;

    return array_map(function ($post) {
        return [
            'post_title' => apply_filter('the_title', $post->post_title),
            'post_permalink' => get_permalink($post)
        ];
    }, $test_posts);

endwhile;
endif;

return [];

wp_reset_postdata();

}
