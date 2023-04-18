<?php

declare(strict_types=1);

namespace Src;

class Application
{

    public function run(): void
    {
        $city = readline("Enter city for weather report ");

        $weather = new Cast($city);

        $report = $weather->getCast();

        $reportA = [
            "Temperature (C°)" => $report->main->temp,
            "`Feels like` temp (C°)" => $report->main->feels_like,
            "Humidity (%)" => $report->main->humidity,
            "Pressure (Hg)" => $report->main->temp,
            "Wind (m/s)" => $report->wind->speed,
        ];

        foreach ($reportA as $keys => $reports) {
            echo "{$keys}  {$reports}".PHP_EOL ;
        }
    }

}