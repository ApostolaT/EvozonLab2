<?php


class DateOverlapService
{
    /**
     * Returns true if the time periods overlap and false otherwise.
     * @param string $startDate1
     * @param string $startDate2
     * @param string $endDate1
     * @param string $endDate2
     * @return bool
     */
    public function checkOverlap(
        string $startDate1,
        string $startDate2,
        string $endDate1,
        string $endDate2
    ):bool {
        $startDate1 = $this->convertToSeconds($startDate1);
        $startDate2 = $this->convertToSeconds($startDate2);
        $endDate1 = $this->convertToSeconds($endDate1);
        $endDate2 = $this->convertToSeconds($endDate2);

        $dateArray = [$startDate1, $startDate2, $endDate1, $endDate2];
        sort($dateArray);

        if (
        ($dateArray[0] == $startDate1 && $dateArray[1] == $endDate1) ||
        ($dateArray[0] == $startDate2 && $dateArray[1] == $endDate2)) {
            return false;
        }

        return true;
    }

    private function convertToSeconds(string $date): int
    {
        $date = preg_split("/[\s,\D]+/", $date);

        return (int)$date[5] + (int)$date[4] * 60 + (int)$date[3] * 60 * 60 +
            (int)$date[0] * 24 * 60 * 60 + (int)$date[1] * 30 * 24 * 60 * 60 +
            $date[2] * 24 * 60 * 60 * 365;
    }
}