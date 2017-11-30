<?php
require_once __DIR__.'/../../../core/bootstrap.php';

$className = $argv[1];
$classFixtures = sprintf('\\Lexik\\DataFixtures\\%sFixtures', ucfirst($className));
$objectFixtures = new $classFixtures();

$objectFixtures->loadFixtures();
