<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once 'bootstrap.php';

// $entityManager created in bootstrap.php
return ConsoleRunner::createHelperSet($entityManager);
