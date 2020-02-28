<?php
require __DIR__ . '/vendor/autoload.php';

use App\Console\Console;
use App\Console\ConsoleMessages;
use App\Exception\InvalidInputException;
use App\Exception\InvalidSearchKeyException;

$consoleMessages = new ConsoleMessages();
$console = new Console();


try {
    // Show initial message and get top level menu selection
    $consoleMessages->initMessage();
    $mainChoice = $console->showTopLevelMenu();


    if ($mainChoice == 'viewList') {
        $consoleMessages->showSearchableFields();
        $mainChoice = $console->waitingForSearchMenuInput();
    }

    if ($mainChoice == 'search') {
        $mainChoice = $console->waitingForSearchMenuInput();
    }

    throw new InvalidInputException('Invalid input! Please try again....');

} catch (InvalidSearchKeyException $ex) {
    $consoleMessages->showErrorMessage($ex->getMessage());
}
catch (InvalidInputException $ex) {
    $consoleMessages->showErrorMessage($ex->getMessage());
} catch (Exception $ex) {
    $consoleMessages->showErrorMessage('Something went wrong! Please try again');
}
