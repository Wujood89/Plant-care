<?php

if (!function_exists('scanWarnings')) {
    function scanWarnings(
        $start, 
        $period, 
        $mositure_level,
        $num_warnings,
        $penalty_cost,
        $warnings = 0
    )
    {
        if($warnings >= $num_warnings)
        {
            \DB::table('penalties')->insert([
                'message' => 'مخالفة',
                'note' => 'مخالفة عدم سقي النبتة لأكثر من' . $period . 'أيام',
                'cost' => $penalty_cost,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ]);
            $warnings = 0;
        }

        $end = \Carbon\Carbon::parse($start)->addDays($period)->format('y-m-d');

        $readings = App\Models\Reading::get()->filter(function($reading) use($start, $end){
            $created_at = Carbon\Carbon::parse($reading->created_at)->format('y-m-d');
            return ($created_at > $start) && ($created_at <= $end);
        })->values();


        if(count($readings) <= 0)
        {
            return;
        }

        $watering_event = App\Models\Reading::get()->filter(function($reading) use($mositure_level){
            return $reading->value >= $mositure_level;
        })->values()->first();

        if($watering_event == null || empty($watering_event))
        {
            \DB::table('warnings')->insert([
                'message' => 'تنبيه',
                'note' => 'تنبيه عدم سقي النبتة لأكثر من' . $period . 'أيام',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ]);
            $warnings = $warnings + 1;
            $start = Carbon\Carbon::now()->format('y-m-d');

            scanWarnings(
                $start, 
                $period, 
                $mositure_level,
                $num_warnings,
                $penalty_cost,
                $warnings
            );
        }
        else
        {
            \DB::table('records')->insert([
                'reading_id' => $watering_event->id,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ]);
            $start = Carbon\Carbon::now()->format('y-m-d');

            scanWarnings(
                $start, 
                $period, 
                $mositure_level,
                $num_warnings,
                $penalty_cost,
                $warnings
            );        
        }
    }
}