<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf('<a href="%s" class="flex justify-end w-full mt-sm">%s</a>', get_permalink(), __('Read More →', 'sage'));
});

/**
 *
 *
 * @return string
 */

// add_filter('sage/blocks/my-block/data', function ($block) { 

// });
