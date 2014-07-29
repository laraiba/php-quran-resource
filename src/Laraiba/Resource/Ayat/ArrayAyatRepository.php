<?php

namespace Laraiba\Resource\Ayat;

class ArrayAyatRepository implements AyatRepositoryInterface
{
    private $data = array();

    public function __construct(array $data)
    {
        $this->data = $data;
    }
    
    public function findAll()
    {
        $merged = array();

        foreach ($this->data as $surat) {
            $merged = array_merge($merged, $surat);
        }
        
        return $merged;
    }

    public function findBySuratNumber($suratNumber)
    {
        if (isset($this->data[$suratNumber])) {
            return array_values($this->data[$suratNumber]);
        }

        return array();
    }

    public function findOneById(AyatIdInterface $id)
    {
        $ayat = null;
        
        if ($id instanceof AyatId) {
            $split = AyatId::splitValue((string)$id);

            if (isset($this->data[$split['surat_number']][$split['ayat_number']])) {
                return $this->data[$split['surat_number']][$split['ayat_number']];
            }
        }

        return $ayat;
    }
}
