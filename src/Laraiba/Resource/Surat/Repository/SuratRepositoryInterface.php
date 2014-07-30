<?php

namespace Laraiba\Resource\Surat\Repository;

interface SuratRepositoryInterface
{
    public function findAll();

    public function findOneBySuratNumber($suratNumber);
}
