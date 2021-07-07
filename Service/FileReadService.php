<?php


class FileReadService
{
    public function readNumbersFromFile(String $fileName) {
        if (!file_exists($fileName)) {
            echo 'File does not exist' . PHP_EOL;
            return;
        }

        $file = fopen($fileName, "r");
        if (!$file) {
            echo 'File could not be opened' . PHP_EOL;
            return;
        }

        $holder = 0b0000000000;
        while(!feof($file)) {
            $digit = fgetc($file);

            if ($digit == ' ') {
                continue;
            }

            $holder = $holder | (0b0000000001 << $digit);
        }

        for ($i = 0; $i < 10; $i++) {
            if (($holder & (0b0000000001 << $i)) != 0) {
                echo $i . ' ';
            }
        }

        echo PHP_EOL;
    }
}