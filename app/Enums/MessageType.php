<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class MessageType extends Enum
{
    const TEXT = 'text';
    const IMAGE = 'image';
    const VIDEO = 'video';
    const AUDIO = 'audio';
    const FILE = 'file';
    const LOCATION = 'location';
    const STICKER = 'sticker';
}
