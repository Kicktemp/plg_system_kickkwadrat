<?php
/**
 * @package    [PACKAGE_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [AUTHOR_URL]
 * @license    [LICENSE]
 * @link       [AUTHOR_URL]
 */

namespace Kicktemp\Kwadrat\Boxdecoration\Src;

use YOOtheme\Config;
use YOOtheme\Path;
use YOOtheme\Arr;

class FormListener
{
    /**
     * @var array
     */
    protected static $types = [
        'image',
        'kwadratimage',
    ];

    public static function addStyleOptions(Config $config, $type)
    {
        if (!in_array($type['name'], self::$types))
        {
            return $type;
        }

        // Section
        if (Arr::has($type, 'fields.image_box_decoration.options'))
        {
            $type['fields']['image_box_decoration']['options']['Left Top']   = 'top-left';
            $type['fields']['image_box_decoration']['options']['Left Bottom']   = 'bottom-left';
            $type['fields']['image_box_decoration']['options']['Right Top']   = 'top-right';
            $type['fields']['image_box_decoration']['options']['Right Bottom']   = 'bottom-right';
        }

        return $type;
    }
}
