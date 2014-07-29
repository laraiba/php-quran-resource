<?php

namespace Laraiba\Resource\Surat;

class ArraySuratRepository implements SuratRepositoryInterface
{
    private $data = array();

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function findAll()
    {
        return array_values($this->data);
    }

    public function findOneBySuratNumber($suratNumber)
    {
        if (isset($this->data[$suratNumber])) {
            return $this->data[$suratNumber];
        }

        return null;
    }
}
