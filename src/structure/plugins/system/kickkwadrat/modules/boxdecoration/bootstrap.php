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

include_once __DIR__ . '/src/FormListener.php';

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
            FormListener::class => 'addStyleOptions'
        ]
    ],
];
