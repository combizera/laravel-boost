<?php

namespace App\Enums;

enum SettingType: string
{
    case TEXT = 'text';
    case IMAGE = 'image';
    case URL = 'url';
    case BOOLEAN = 'boolean';
    case NUMBER = 'number';
    case JSON = 'json';

    public function label(): string
    {
        return match ($this) {
            self::TEXT => 'Text',
            self::IMAGE => 'Image',
            self::URL => 'URL',
            self::BOOLEAN => 'Boolean',
            self::NUMBER => 'Number',
            self::JSON => 'JSON',
        };
    }
}
