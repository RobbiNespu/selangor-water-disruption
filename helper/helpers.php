<?php

use afiqiqmal\Library\ApiRequest;
use afiqiqmal\library\Constant;
use afiqiqmal\WaterDisruption\WaterDisruption;
use afiqiqmal\WaterDisruption\WaterUtils;

define('WATER_METHOD_POST', 'POST');
define('WATER_METHOD_GET', 'GET');
define('WATER_METHOD_PATCH', 'PATCH');
define('WATER_METHOD_DELETE', 'DELETE');
define('WATER_USER_AGENT', 'testing/1.0');
define('WATER_SCHEDULE', 'Schedule');
define('WATER_UNSCHEDULED', 'Unscheduled');

if (! function_exists('air_selangor')) {

    function air_selangor()
    {
        return new WaterDisruption();
    }
}

if (! function_exists('water_request')) {

    function water_request()
    {
        return new ApiRequest();
    }
}

if (! function_exists('which_district')) {

    function which_district($code)
    {
        foreach (Constant::WATER_DISTRICT as $district) {
            if ($district['code_id'] === $code) {
                return $district;
            }
        }

        return null;
    }
}

if (! function_exists('water_utils')) {

    function water_utils()
    {
        return new WaterUtils();
    }
}

if (! function_exists('die_response')) {

    function die_response($message = "Something Went Wrong")
    {
        http_response_code(400);
        return [
            'code' => 400,
            'error' => true,
            'message' => $message
        ];
    }
}

if (! function_exists('water_response')) {

    function water_response($output)
    {
        return [
            'code' => 200,
            'error' => false,
            'info' => $output,
            'generated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'footer' => [
                "source" => 'Air Selangor MySyabas API',
                "developer" => [
                    "name" => "Hafiq",
                    "homepage" => "https://github.com/afiqiqmal"
                ]
            ]
        ];
    }
}