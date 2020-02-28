<?php

namespace App\Console;

class Console
{
    private $consoleMessages;

    public function __construct()
    {
        $this->consoleMessages = new ConsoleMessages();
    }

    /**
     * Initializing message
     *
     * @return string
     */
    public function showTopLevelMenu()
    {
        $userSelection = null;
        while (true) {
            $choice = trim(fgets(STDIN));
            if (intval($choice) === 1) {
                $this->consoleMessages->showMenu();
                $userSelection = 'search';
                break;
            } elseif (intval($choice) === 2) {
                $userSelection = 'viewList';
                break;

            } elseif (intval($choice) === 3) {

            } elseif ($choice == 'quit') {
                $this->consoleMessages->quitMessage();
            } else {
                $this->consoleMessages->invalidInput();
            }
            echo $choice . PHP_EOL . PHP_EOL;
        }
        return $userSelection;
    }
}