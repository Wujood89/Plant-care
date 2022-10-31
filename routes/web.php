
<?php

use Illuminate\Support\Facades\Route;

use function PHPSTORM_META\map;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});


Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('/dashboard', function () {
        $readings = App\Models\Reading::get()->filter(function($reading){
            $created_at = \Carbon\Carbon::parse($reading->created_at)->format('y-m-d H:i:s');
            return ($created_at >= \Carbon\Carbon::now()->subMinutes(30)->format('y-m-d H:i:s'));
        });

        $moisture_readings = $readings->where('sensor_name', 'moisture');
        $nitrogen_readings = $readings->where('sensor_name', 'nitrogen');
        $phosphorous_readings = $readings->where('sensor_name', 'phosphorous');
        $potassium_readings = $readings->where('sensor_name', 'moisture');

        $dates = $moisture_readings->pluck('created_at')->map->format('g:i a');

        $moisture_readings = $moisture_readings->pluck('value')->toArray();
        $nitrogen_readings = $nitrogen_readings->pluck('value')->toArray();
        $phosphorous_readings = $phosphorous_readings->pluck('value')->toArray();
        $potassium_readings = $potassium_readings->pluck('value')->toArray();
        $latest_record = App\Models\Reading::get()->last();
        $num_records = count($readings);

        return view('dashboard',
            compact(
                'moisture_readings',
                'nitrogen_readings',
                'phosphorous_readings',
                'potassium_readings',
                'dates',
                'latest_record',
                'num_records',
            )
        );
    });

    Route::get('/allReadings', function(){
        if(isset(request()->fromDate) && isset(request()->toDate))
        {
            if(isset(request()->sensor_name))
            {
                $from = $_GET['fromDate'];
                $to = $_GET['toDate'];
                $from = \Carbon\Carbon::parse($from)->format('y-m-d');
                $to   = \Carbon\Carbon::parse($to)->format('y-m-d');
                $readings = App\Models\Reading::orderBy('id')->get()->filter(function($reading) use($from, $to){
                    $created_at = Carbon\Carbon::parse($reading->created_at)->format('y-m-d');
                    return ($created_at >= $from) && ($created_at <= $to);
                })
                ->filter(function($reading){
                    return $reading->sensor_name == request()->sensor_name;
                })->values()->paginate(10);
            }
            else
            {
                $from = $_GET['fromDate'];
                $to = $_GET['toDate'];
                $from = \Carbon\Carbon::parse($from)->format('y-m-d');
                $to   = \Carbon\Carbon::parse($to)->format('y-m-d');
                $readings = App\Models\Reading::orderBy('id')->get()->filter(function($reading) use($from, $to){
                    $created_at = Carbon\Carbon::parse($reading->created_at)->format('y-m-d');
                    return ($created_at >= $from) && ($created_at <= $to);
                })->values()->paginate(10);
            }
        }
        else
        {
            if(isset(request()->sensor_name))
            {
                $readings = App\Models\Reading::orderBy('id')->get()->filter(function($reading){
                    return $reading->sensor_name == request()->sensor_name;
                })->values()->paginate(10);
            }
            else
            {
                $readings = App\Models\Reading::orderBy('id')->get()->paginate(10);
            }
        }

        return view('allRecords', compact('readings'));
    });
});

Route::get('/writeRecords', function () {

    $attributes = [];
    if(isset($_GET['moisture']))
    {
        $moisture = $_GET['moisture'];

        $attributes['sensor_name'] = 'moisture';
        $attributes['value'] = $moisture;

        \App\Models\Reading::create($attributes);
    }

    if(isset($_GET['nitrogen']))
    {
        $nitrogen = $_GET['nitrogen'];

        $attributes['sensor_name'] = 'nitrogen';
        $attributes['value'] = $nitrogen;

        \App\Models\Reading::create($attributes);
    }

    if(isset($_GET['phosphorous']))
    {
        $phosphorous = $_GET['phosphorous'];

        $attributes['sensor_name'] = 'phosphorous';
        $attributes['value'] = $phosphorous;

        \App\Models\Reading::create($attributes);
    }

    if(isset($_GET['potassium']))
    {
        $potassium = $_GET['potassium'];

        $attributes['sensor_name'] = 'potassium';
        $attributes['value'] = $potassium;

        \App\Models\Reading::create($attributes);
    }

    return "was added succefully";
});

Route::get('/admin', function(){
    $settings = \DB::table('Settings')->first();
    $warnings = \DB::table('warnings')->get()->paginate(10);
    $penalties = \DB::table('penalties')->get()->paginate(10);

    return view('admin', compact('settings', 'warnings', 'penalties'));
});

Route::post('/storeSettings', function(){
    $attributes = request()->validate([
        'period' => 'required',
        'mositure_level' => 'required',
        'num_warnings' => 'required',
        'penalty_cost' => 'required',
    ]);
       
    \DB::table('Settings')->where('id', 1)->update($attributes);

    return redirect()->back();
});

Route::get('/warnings', function(){
    $warnings = \DB::table('warnings')->get()->paginate(10);

    return view('warnings', compact('warnings'));
});

Route::get('/penalties', function(){
    $penalties = \DB::table('penalties')->get()->paginate(10);

    return view('penalties', compact('penalties'));
});

Route::get('/scanWarnings', function(){
    $readings = App\Models\Reading::orderBy('id', 'asc')->where('sensor_name', 'moisture')->get();
    abort_if(count($readings) <= 0, 403, 'There are no sensor reaadings');

    $latest_wet_record = App\Models\Record::latest()->first();
    if($latest_wet_record == null || empty($latest_wet_record))
    {
        $start_date = $readings->first()->created_at->format('y-m-d');
    }
    else
    {
        $start_date = $latest_wet_record->reading->created_at->format('y-m-d');
    }

    $settings = \DB::table('Settings')->first();
    scanWarnings(
        $start_date, 
        $settings->period, 
        $settings->mositure_level,
        $settings->num_warnings,
        $settings->penalty_cost
    );
    
    return;
});

Auth::routes();