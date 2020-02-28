<?php
require __DIR__ . '/vendor/autoload.php';

use App\Messages\ConsoleMessages;

$consoleMessages = new ConsoleMessages();

echo $consoleMessages->initMessage();