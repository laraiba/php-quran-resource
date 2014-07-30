<?php

namespace Laraiba\Resource\Ayat\Repository;

interface AyatRepositoryInterface
{
    public function findAll();

    public function findBySuratNumber($number);

    public function findOneById($id);
}
