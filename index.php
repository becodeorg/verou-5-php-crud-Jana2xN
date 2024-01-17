<?php

// Require the correct variable type to be used (no auto-converting)
declare(strict_types=1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load your classes
require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/BookRepository.php'; // Assuming you have a BookRepository class

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

// This example is about a Book collection
$bookRepository = new BookRepository($databaseManager); // Assuming you have a BookRepository class
$books = $bookRepository->get(); // Update to use the BookRepository

// Get the current action to execute
// If nothing is specified, it will remain empty (home should be loaded)
$action = $_GET['action'] ?? null;

// Load the relevant action
// This system will help you to only execute the code you want, instead of all of it (or complex if statements)
switch ($action) {
    case 'create':
        create();
        break;
    default:
        overview();
        break;
}

function overview()
{
    global $books; // Access the global variable

    // Load your view
    // Tip: you can load this dynamically and based on a variable if you want to load another view
    require 'overview.php';
}

function create()
{
    // TODO: provide the create logic
}

?>
