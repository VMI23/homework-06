<?php

declare(strict_types=1);

namespace CompanyReg;

class Application
{
    public function run(): void
    {
        $registrationNo = readline("Please enter registration No: ");

        $apiResponse = new ApiResponse();

        $records = $apiResponse->getRecords($registrationNo);

        function displayRecordInformation($records)
        {
            if (empty($records)) {
                echo "No records found";
            } else {
                foreach ($records as $key => $record) {
                    if (!empty($record) && $record != " ") {
                        yield $key . " : " . $record;
                    }
                }
            }
        }

        foreach (displayRecordInformation($records) as $info) {
            echo $info . PHP_EOL;
        }
    }

}