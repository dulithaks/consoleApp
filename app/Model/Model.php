<?php

namespace App\Model;

use App\Exception\InvalidSearchKeyException;

class Model
{
    protected $data = null;

    protected $keyList = null;

    private $arrayTypeSearch = ['domain_names', 'tags'];


    /**
     * Get data
     *
     * @return mixed
     */
    public function getDataFromFile($file)
    {
        $filePath =  __DIR__ . DIRECTORY_SEPARATOR .'data' . DIRECTORY_SEPARATOR . $file;
        return $this->data = json_decode(file_get_contents($filePath),true);
    }

    /**
     * Find by key value
     *
     * @param $key
     * @param $value
     * @return mixed
     * @throws InvalidSearchKeyException
     */
    public function findByKeyValue($key, $value)
    {
        $this->validateKey($key);

        $items = [];

        foreach ($this->data as $item) {
            if(array_key_exists($key, $this->arrayTypeSearch) && in_array($value, $item[$key])){
                $items[] = $item;
            }
            elseif ($item[$key] == $value) {
                $items[] = $item;
            }
        }

        return $items;
    }

    /**
     * Validate key
     *
     * @param $key
     * @return bool
     * @throws InvalidSearchKeyException
     */
    private function validateKey($key) {
        if(in_array($key, $this->keyList)){
            return true;
        }

        throw new InvalidSearchKeyException();
    }

    /**
     * Get key list
     *
     * @return null
     */
    public function getKeyList()
    {
        return $this->keyList;
    }
}