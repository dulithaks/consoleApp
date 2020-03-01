<?php


namespace App\Exception;

use Exception;

class InvalidSearchKeyException extends Exception
{
    protected $message = 'Invalid search key! Please try again.';
}