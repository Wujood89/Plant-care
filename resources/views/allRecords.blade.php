@extends('layouts.app')

@section('content')
<section class="content">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <form 
            action="/allReadings"
            method="GET"
            class="row"
         >
            <div class='col-md-3'>
                <div class="form-group">
                    <label for="datetimepickerFrom" class="px-2">From:</label>    
                    <div class="input-group date" id="datetimepickerFrom" data-target-input="nearest">
                        <input value="{{ request()->fromDate ?? null }}" name="fromDate" autocomplete="off" type="text" class="form-control datetimepicker-input" data-target="#datetimepickerFrom"/>
                        <div class="input-group-append" data-target="#datetimepickerFrom" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
             </div>
             <div class='col-md-3'>
                <div class="form-group">
                    <label for="toDate" class="px-2">To:</label>    
                    <div class="input-group date" id="datetimepickerTo" data-target-input="nearest">
                        <input value="{{ request()->toDate ?? null }}" name="toDate" autocomplete="off" type="text" class="form-control datetimepicker-input" data-target="#datetimepickerTo"/>
                        <div class="input-group-append" data-target="#datetimepickerTo" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
             </div>
             <div class="col-md-3">
                 <div class="form-group">
                    <label>Select Period</label>
                    <select name="sensor_name" class="form-control select2" style="width: 100%;">
                        <option selected="selected"></option>
                        <option @if(request()->sensor_name == 'moisture')selected="selected"@endif>moisture</option>
                        <option>nitrogen</option>
                        <option>phosphorous</option>
                        <option>potassium</option>
                    </select>
                 </div>
             </div>
             <div class="col-md-3">
                 <label>Search for results</label>
                 <div class="form-group">
                     <button type="submit" class="btn btn-block btn-default">Search</button>
                 </div>
             </div>
         </form>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Plant Monitoring</h3>
          </div>
          <div class="card-body">
            Number of results: {{ $readings->total() }}
            @foreach($readings as $i => $reading)
            @if($loop->first)
            <table class="table table-bordered table-striped table-responsive mt-3">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th style="width: 20%">Sensor Name</th>
                    <th style="width: 20%">Value</th>
                    <th style="width: 20%">Date</th>
                    <th style="width: 20%">Time</th>
                  </tr>
                </thead>
                <tbody>
            @endif

            <tr class="text-center">
              <td><span class="float-left">{{ $i+1 }}</span></td>
              <td>
                {{ $reading->sensor_name }}
              </td>
              <td>
                {{ $reading->value}}
              </td>
              <td>
                {{ $reading->created_at->format('Y-m-d') }}
              </td>
              <td>
                {{ $reading->created_at->format('g:i A') }}
              </td>
            </tr>    

            @if($loop->last)
              </tbody>
            </table>
            @endif
            @endforeach
          </div>

          <div class="px-4">
            {{ $readings->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection