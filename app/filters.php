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

/*
|--------------------------------------------------------------------------
| Add TinyMce Support
|--------------------------------------------------------------------------
*/

// First Toolbar
add_filter('mce_buttons', function ($buttons) {
    $config = getConfig();
    if ($config && isset($config['toolbars'])) {
        $toolbars = $config['toolbars'];
        if (isset($toolbars['default']) && isset($toolbars['default'][0])) {
            return $toolbars['default'][0];
        }
    }
    return $buttons;
});

// Second Toolbar
add_filter('mce_buttons_2', function ($buttons) {
    return [];
});

add_filter('tiny_mce_before_init', function ($init) {
    $config = getConfig();
    if ($config) {
        if (isset($config['blockformats'])) {
            $init['block_formats'] = getBlockFormats($config['blockformats']);
        }

        if (isset($config['styleformats'])) {
            // Send it to style_formats as true js array
            $init['style_formats'] = json_encode($config['styleformats']);
        }

        if (isset($config['textcolor_map'])) {
            // Send it to textcolor_map as true js array
            $init['textcolor_map'] = json_encode($config['textcolor_map']);
        }
    }
    return $init;
});

add_filter('acf/fields/wysiwyg/toolbars', function ($toolbars) {
    // Load Toolbars and parse them into TinyMCE
    $config = getConfig();
    if ($config && !empty($config['toolbars'])) {
        $toolbars = array_map(function ($toolbar) {
            array_unshift($toolbar, []);
            return $toolbar;
        }, $config['toolbars']);
    }
    return $toolbars;
});

function getBlockFormats($blockFormats)
{
    if (!empty($blockFormats)) {
        $blockFormatStrings = array_map(
            function ($tag, $label) {
                return "${label}=${tag}";
            },
            $blockFormats,
            array_keys($blockFormats)
        );
        return implode(';', $blockFormatStrings);
    }
    return '';
}

function getConfig()
{
    return [
        'blockformats' => [
            'Paragraph' => 'p',
            'Heading 1' => 'h1',
            'Heading 2' => 'h2',
            'Heading 3' => 'h3',
            'Heading 4' => 'h4',
            'Heading 5' => 'h5',
            'Heading 6' => 'h6'
        ],
        'styleformats' => [
            [
                'title' => 'Headings',
                'icon' => '',
                'items' => [
                    [
                        'title' => 'Heading 1',
                        'classes' => 'h1',
                        'selector' => '*'
                    ],
                    [
                        'title' => 'Heading 2',
                        'classes' => 'h2',
                        'selector' => '*'
                    ],
                    [
                        'title' => 'Heading 3',
                        'classes' => 'h3',
                        'selector' => '*'
                    ],
                    [
                        'title' => 'Heading 4',
                        'classes' => 'h4',
                        'selector' => '*'
                    ],
                    [
                        'title' => 'Heading 5',
                        'classes' => 'h5',
                        'selector' => '*'
                    ],
                    [
                        'title' => 'Heading 6',
                        'classes' => 'h6',
                        'selector' => '*'
                    ],
                    [
                        'title' => 'Sans',
                        'classes' => 'sans',
                        'selector' => '*'
                    ],
                    [
                        'title' => 'Serif',
                        'classes' => 'serif',
                        'selector' => '*'
                    ]
                ]
            ],
            [
                'title' => 'Body',
                'icon' => '',
                'items' => [
                    [
                        'title' => 'Small',
                        'classes' => 'small',
                        'selector' => 'p'
                    ],
                    [
                        'title' => 'Sans',
                        'classes' => 'sans',
                        'selector' => '*'
                    ],
                    [
                        'title' => 'Sans',
                        'classes' => 'sans',
                        'selector' => '*'
                    ]
                ]
            ],
            [
                'title' => 'Buttons',
                'icon' => '',
                'items' => [
                    [
                        'title' => 'Button',
                        'classes' => 'button',
                        'selector' => 'a,button'
                    ],
                    [
                        'title' => 'Button Ghost',
                        'classes' => 'button--ghost',
                        'selector' => 'a,button'
                    ],
                    [
                        'title' => 'Button Small',
                        'classes' => 'button--small',
                        'selector' => '.button'
                    ],
                    [
                        'title' => 'Button Link',
                        'classes' => 'button--link',
                        'selector' => '.button'
                    ]
                ]
            ]
        ],
        'toolbars' => [
            'default' => [
                [
                    'formatselect',
                    'styleselect',
                    'bold',
                    'italic',
                    'underline',
                    'superscript',
                    'blockquote',
                    '|',
                    'forecolor',
                    'backcolor',
                    '|',
                    'alignleft',
                    'aligncenter',
                    'alignright',
                    'alignjustify',
                    '|',
                    'bullist',
                    'numlist',
                    '|',
                    'link',
                    'unlink',
                    '|',
                    'removeformat'
                ]
            ],
            'basic' => [
                [
                    'bold',
                    'italic',
                    'underline',
                    'superscript',
                    'blockquote',
                    '|',
                    'forecolor',
                    'backcolor',
                    '|',
                    'alignleft',
                    'aligncenter',
                    'alignright',
                    'alignjustify',
                    '|',
                    'link',
                    'unlink'
                ]
            ]
        ]
    ];
}

/**
 *
 *
 * @return string
 */

// add_filter('sage/blocks/my-block/data', function ($block) { 

// });
