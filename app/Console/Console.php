<?php

namespace App\Console;

use App\Repository\OrganizationRepository;
use App\Repository\TicketRepository;
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
     * Waiting for search menu input
     *
     * @return string
     */
    public function waitingForSearchMenuInput()
    {
        $userRepo = new UserRepository();
        $ticketRepo = new TicketRepository();
        $organizationRepo = new OrganizationRepository();

        while (true) {
            $choice = trim(fgets(STDIN));
            if (intval($choice) === 1) {
                $searchKeyVal = $this->waitingForSearchKeyValueInput();
                $users = $userRepo->getUserInformation($searchKeyVal['searchKey'], $searchKeyVal['searchValue']);
                $this->consoleMessages->showUserSearchResult($users);
                break;
            } elseif (intval($choice) === 2) {
                $searchKeyVal = $this->waitingForSearchKeyValueInput();
                $tickets = $ticketRepo->getTicketInformation($searchKeyVal['searchKey'], $searchKeyVal['searchValue']);
                $this->consoleMessages->showTicketSearchResult($tickets);
                break;
            } elseif (intval($choice) === 3) {
                $searchKeyVal = $this->waitingForSearchKeyValueInput();
                $tickets = $organizationRepo->getOrganizationInformation($searchKeyVal['searchKey'], $searchKeyVal['searchValue']);
                $this->consoleMessages->showOrganizationSearchResult($tickets);
                break;
            } else {
                $this->consoleMessages->invalidInput();
            }
            echo PHP_EOL . PHP_EOL;
        }
    }

    /**
     * IWaiting for search value input
     *
     * @return array
     */
    public function waitingForSearchKeyValueInput()
    {
        $data = [];

        $this->consoleMessages->showInputKeyText();
        $data['searchKey'] = trim(fgets(STDIN));

        $this->consoleMessages->showInputValueText();
        $data['searchValue'] = trim(fgets(STDIN));

        return $data;
    }
}