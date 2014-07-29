<?php

namespace Laraiba\Resource\Ayat;

class Ayat implements AyatInterface
{
    protected $id;

    protected $suratNumber;

    protected $ayatNumber;

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

    public function setSuratNumber($suratNumber)
    {
        $this->suratNumber = $suratNumber;
    }

    public function getSuratNumber()
    {
        return $this->suratNumber;
    }

    public function setAyatNumber($ayatNumber)
    {
        $this->ayatNumber = $ayatNumber;
    }

    public function getAyatNumber()
    {
        return $this->ayatNumber;
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
