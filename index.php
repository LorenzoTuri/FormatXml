#!/usr/bin/env php
<?php

use Lturi\FormatXml\FileManager;
use Lturi\FormatXml\XmlManager;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Finder\SplFileInfo;

require_once "vendor/autoload.php";
define("ROOT_PATH", __DIR__.DIRECTORY_SEPARATOR);

$output = new ConsoleOutput();
$fileManager = new FileManager();
$xmlManager = new XmlManager();

/** @var SplFileInfo[] $files */
$files = $fileManager->listFile("input");

// Echo number of documents
$output->writeln(sprintf("Found %s files", count($files)));

foreach ($files as $file) {
    $content = $fileManager->read($file);
    $newContent = $xmlManager->format($content);
    $fileManager->write(sprintf("output/%s", $file->getFilename()), $newContent);
}