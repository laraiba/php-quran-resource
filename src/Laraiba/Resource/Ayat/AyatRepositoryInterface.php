<?php

namespace Laraiba\Resource\Ayat;

interface AyatRepositoryInterface
{
    public function findAll();

    public function findBySuratNumber($number);

    public function findOneById($id);
}
