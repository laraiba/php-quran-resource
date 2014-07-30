<?php

namespace Laraiba\Resource\Surat\Initializer;

use Laraiba\Resource\Surat\SuratInterface;

interface SuratInitializerInterface
{
    public function initialize(SuratInterface $surat);
}
