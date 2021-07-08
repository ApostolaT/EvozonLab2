<?php

require "Service/FileReadService.php";
require "Service/DateOverlapService.php";

define('__ROOT__', dirname(__FILE__));
$fileReadService = new FileReadService();
$fileReadService->readNumbersFromFile(__ROOT__.'/Resource/file');

$dateOverlapService = new DateOverlapService();

try {
    var_dump(
        $dateOverlapService->checkOverlap(
            '10-05-2021 10:00:00',
            '04-04-2021 21:30:15',
            '13-05-2021  00:00:00',
            '11-05-2021 04:30:00'
        ));
} catch (Exception $exception) {
    echo $exception . PHP_EOL;
}
