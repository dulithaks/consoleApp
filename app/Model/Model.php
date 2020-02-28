<?php

namespace App\Model;

use App\Exception\InvalidSearchKeyException;

class Model
{
    protected $data = null;

    protected $keyList = null;


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
     */
    public function findByKeyValue($key, $value)
    {
        $this->validateKey($key);

        foreach ($this->data as $item) {
            if ($item[$key] == $value) {
                return $item;
            }
        }
    }

    /**
     * Validate key
     *
     * @param $key
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