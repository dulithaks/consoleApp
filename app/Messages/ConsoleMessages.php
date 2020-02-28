<?php
namespace App\Messages;

class ConsoleMessages
{
    public function initMessage(){
        return "Type 'quit' to exit at any time, Press 'Enter' to continue" . PHP_EOL . PHP_EOL
            . "Select search options:" . PHP_EOL
            . "Press 1 to search" . PHP_EOL
            . "Press 2 to view a list of searchable fields" .PHP_EOL
            . "Type 'quit' to exit" . PHP_EOL;
    }
}