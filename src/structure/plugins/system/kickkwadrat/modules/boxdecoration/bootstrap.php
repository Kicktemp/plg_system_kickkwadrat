<?php
/**
 * @package    [PACKAGE_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [AUTHOR_URL]
 * @license    [LICENSE]
 * @link       [AUTHOR_URL]
 */

namespace Kicktemp\Kwadrat\Boxdecoration;

use YOOtheme\Builder;
use YOOtheme\Path;
use YOOtheme\Theme\Styler\StylerConfig;


return [
    'theme' => [
        'styles' => [
            'components' => [
                'boxdecoration' => Path::get('./assets/less/boxdecoration.less'),
            ],
        ],
    ],

    'config' => [
        StylerConfig::class => __DIR__ . '/config/styler.json',
    ],

    'events' => [
        'builder.type' => [
            Src\FormListener::class => 'addStyleOptions'
        ]
    ],
];
