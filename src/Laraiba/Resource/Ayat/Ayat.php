<?php

namespace Laraiba\Resource\Ayat;

class Ayat implements AyatInterface
{
    protected $id;

    protected $text;

    public function __construct(AyatIdInterface $ayatId)
    {
        $this->id = $ayatId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdAsString()
    {
        return (string) $this->id;
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
