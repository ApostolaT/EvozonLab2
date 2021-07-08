<?php


class DateOverlapService
{
    // Time in seconds for every date format
    private const MINUTE = 60;
    private const HOUR = 3600;
    private const DAY = 86400;
    private const MONTH = 2592000;
    private const YEAR = 31536000;
    private int $smallestYear;

    public function __construct() {
        $this->smallestYear = 0;
    }

    /**
     * Returns true if the time periods overlap and false otherwise.
     * @param string $startDate1
     * @param string $startDate2
     * @param string $endDate1
     * @param string $endDate2
     * @return bool
     * @throws Exception
     */
    public function checkOverlap(
        string $startDate1,
        string $startDate2,
        string $endDate1,
        string $endDate2
    ):bool {
        $startDate1 = $this->extractToArray($startDate1);
        $startDate2 = $this->extractToArray($startDate2);
        $endDate1 = $this->extractToArray($endDate1);
        $endDate2 = $this->extractToArray($endDate2);

        if ((int)$startDate1[2] > (int)$endDate1[2]) throw new Exception("End date is smaller than the start date!");
        if ((int)$startDate2[2] > (int)$endDate2[2]) throw new Exception("End date is smaller than the start date!");

        $this->smallestYear = max((int)$startDate1[2], (int)$startDate2[2]);

        $startDate1 = $this->convertToSeconds($startDate1);
        $startDate2 = $this->convertToSeconds($startDate2);
        $endDate1 = $this->convertToSeconds($endDate1);
        $endDate2 = $this->convertToSeconds($endDate2);

        $dateArray = [$startDate1, $startDate2, $endDate1, $endDate2];
        sort($dateArray);

        if (($dateArray[0] == $startDate1 && $dateArray[1] == $endDate1) ||
            ($dateArray[0] == $startDate2 && $dateArray[1] == $endDate2)) {
            return false;
        }

        return true;
    }

    private function extractToArray(string $date): array {
        return preg_split("/[\s,\D]+/", $date);
    }

    private function convertToSeconds(array $date): int
    {
        //Optimized the final result by extracting from it the smallest Year from all the dates;
        // This is a safety measure to not go over the PHP_INT_MAX
        $optimizedYear = self::YEAR * ($date[2] - $this->smallestYear);

        return  $date[5] + $date[4] * self::MINUTE +
                $date[3] * self::HOUR + $date[0] * self::DAY +
                $date[1] * self::MONTH + $optimizedYear;
    }
}