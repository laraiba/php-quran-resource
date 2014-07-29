<?php

namespace Laraiba\Resource\Ayat;

interface AyatInterface
{
    public function getId();

    public function getSuratNumber();

    public function getAyatNumber();

    public function getText();
}
