<?php

namespace Laraiba\Resource\Surat;

interface SuratRepositoryInterface
{
    public function findAll();

    public function findOneBySuratNumber($suratNumber);
}
