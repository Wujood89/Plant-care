@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container">
        <div class="col-12 p-4">
            <div class="row">
                <div class='col-md-3'>
                    <div class="form-group">
                        <label for="datetimepickerFrom" class="px-2">Latest record at: <span style="color: gray">{{ $latest_record->created_at->diffForHumans() }}</span></label>
                    </div>
                </div>
                <div class='col-md-3'>
                    <div class="form-group">
                        <label for="datetimepickerFrom" class="px-2">Number of Records: <span style="color: gray">{{ $num_records }}</span></label>
                    </div>
                </div>
                <div class='col-md-3'>
                    <div class="form-group">
                        <a href="javascript:location.reload();">
                            <button type="button" class="btn btn-block btn-default">Refresh</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <canvas id="soildata" height="200" aria-label="soildata" role="img"></canvas>
</section>
@endsection
