<?php

namespace App\Console;

use App\Repository\UserRepository;

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
                $userSelection = 'search';
                break;
            } elseif (intval($choice) === 2) {
                $userSelection = 'viewList';
                break;
            } elseif ($choice == 'quit') {
                $this->consoleMessages->quitMessage();
            } else {
                $this->consoleMessages->invalidInput();
            }
            echo $choice . PHP_EOL . PHP_EOL;
        }
        return $userSelection;
    }

    /**
     * Initializing message
     *
     * @return string
     */
    public function waitingForSearchMenuInput()
    {
        $userRepo = new UserRepository();

        while (true) {
            $choice = trim(fgets(STDIN));
            if (intval($choice) === 1) {

            } elseif (intval($choice) === 2) {
                $users = $userRepo->getUserInformation('_id', 1);
                $this->consoleMessages->showUserSearchResult($users);
                break;
            } elseif (intval($choice) === 3) {

            } else {
                $this->consoleMessages->invalidInput();
            }
            echo PHP_EOL . PHP_EOL;
        }
    }
}