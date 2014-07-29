<?php

namespace Laraiba\Resource\Ayat;

class AyatId implements AyatIdInterface
{
    private static $format = '/^(\d+):(\d+)$/';

    protected $value;

    public function __construct($value)
    {
        if (preg_match(self::$format, $value, $matches) !== 1) {
            throw new \InvalidArgumentException(
                'Invalid Ayat Id was given. The accepted format is number:number, eg. 2:10.'
            );
        }

        $this->value = $value;
    }

    public static function isValid($value)
    {
        return preg_match(self::$format, $value) === 1;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value;
    }

    public static function splitValue($value)
    {
        $value = (string) $value;

        if (preg_match(self::$format, $value, $matches) === 1) {
            return array(
                'surat_number' => $matches[1],
                'ayat_number'  => $matches[2],
            );
        } else {
            throw new \InvalidArgumentException(
                'Invalid Ayat Id was given. The accepted format is number:number, eg. 2:10.'
            );
        }
    }
}
