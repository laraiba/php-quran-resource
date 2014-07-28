<?php

namespace Laraiba\Resource\Ayat;

class Ayat implements AyatInterface
{
    protected $text;

    public function getId()
    {
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }
}
