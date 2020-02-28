<?php

namespace App\Console;

use App\Model\OrganizationsModel;
use App\Model\TicketModel;
use App\Model\UserModel;

class ConsoleMessages
{
    /**
     * Initializing message
     *
     * @return string
     */
    public function initMessage()
    {
        echo PHP_EOL . "Type 'quit' to exit at any time, Press 'Enter' to continue" . PHP_EOL . PHP_EOL
            . "Select search options:" . PHP_EOL
            . "Press 1 to search" . PHP_EOL
            . "Press 2 to view a list of searchable fields" . PHP_EOL
            . "Type 'quit' to exit" . PHP_EOL;
    }

    /**
     * Show menu
     *
     * @return string
     */
    public function showLevelTwoMenu()
    {
        echo PHP_EOL . "Select 1) Users or 2) Tickets or 3) Organizations" . PHP_EOL;
    }

    /**
     * Invalid message
     *
     * @return string
     */
    public function invalidInput()
    {
        echo PHP_EOL . "Invalid input! Please try again." . PHP_EOL;
    }

    /**
     * Quit message
     *
     * @return string
     */
    public function quitMessage()
    {
        echo PHP_EOL . "Exit." . PHP_EOL . PHP_EOL;
    }

    /**
     * Show error message
     *
     * @param $message
     * @return string
     */
    public function showErrorMessage($message)
    {
        echo PHP_EOL . $message . PHP_EOL . PHP_EOL;
    }

    /**
     * Show searchable fields
     */
    public function showSearchableFields()
    {
        $userKeyList = (new UserModel())->getKeyList();
        $ticketKeyList = (new TicketModel())->getKeyList();
        $organizationKeyList = (new OrganizationsModel())->getKeyList();

        $max = count($userKeyList);
        $max = (count($ticketKeyList)>$max)?count($ticketKeyList) : $max;
        $max = (count($organizationKeyList)>$max)?count($organizationKeyList) : $max;

        echo PHP_EOL . PHP_EOL;

        $mask = "|%20s | %20s | %20s |\n";
        printf($mask, "USER FIELDS", "TICKETS FIELDS", "ORGANIZATION FIELDS");
        echo PHP_EOL;
        for ($i = 0; $i < $max; $i++) {
            printf($mask,
                $this->getSearchKey($userKeyList, $i),
                $this->getSearchKey($ticketKeyList, $i),
                $this->getSearchKey($organizationKeyList, $i));
        }

    }

    private function getSearchKey($array, $i) {
        return (array_key_exists($i, $array)) ? $array[$i] : "";
    }
}