@extends('layouts.app')

@section('content')
<section class="content p-4">
    <div class="container-fluid">
        <form
            action="/storeSettings"
            method="POST"
        >
            @csrf
           
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Settings</h3>
            
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Wet Soil Mositure Level %</label>
                                    <input value="{{ $settings->mositure_level }}" name="mositure_level" type="number" min="0" max="100" step="1" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Period of watering (Days)</label>
                                    <input value="{{ $settings->period }}" name="period" type="number" min="0" step="1" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Number of warnings before penalty</label>
                                    <input value="{{ $settings->num_warnings }}" name="num_warnings" type="number" min="0" step="1" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Penalty Cost (SAR)</label>
                                    <input value="{{ $settings->penalty_cost }}" name="penalty_cost" type="number" min="0" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn" style="background-color: #075d82; color: #f3f4f6">Save</button>
            </div>

            @include('errors') 
        </form>

        <div class="row mt-4 p-2">
            <div class="col-12">
                <a href="/scanWarnings" class="col-sm-6">
                    <button type="submit" class="btn" style="background-color: green; color: #f3f4f6">Scan for warnings</button>
                </a>
                <a href="" class="col-sm-6">
                    <button type="submit" class="btn" style="background-color: red; color: #f3f4f6">Clear warnings</button>
                </a>
            </div>
        </div>

        <div class="col-md-12 mt-1">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Warnings</h3>
        
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        Number of warnings: {{ $warnings->total() }}
                        @foreach($warnings as $i => $warning)
                        @if($loop->first)
                        <table class="table table-bordered table-striped table-responsive mt-3">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th style="width: 19%">Warning</th>
                            <th style="width: 19%">Note</th>
                            <th style="width: 19%">Date</th>
                            <th style="width: 19%">Time</th>
                            <th style="width: 19%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        @endif
                        <tr class="text-center">
                          <td><span class="float-left">{{ $i+1 }}</span></td>
                          <td>
                            {{ $warning->message }}
                          </td>
                          <td>
                            {{ $warning->note}}
                          </td>
                          <td>
                            {{ $warning->created_at->format('Y-m-d') }}
                          </td>
                          <td>
                            {{ $warning->created_at->format('g:i A') }}
                          </td>
                          <td>
                            <form 
                              action="/warnings/{{ $warning->id }}"
                              method="POST"
                            >
                            @csrf
                            @method('DELETE')

                              <button type="submit" class="btn">Delete</button>
                            </form>
                          </td>
                        </tr>
                        @if($loop->last)
                          </tbody>
                        </table>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="px-4">
                {{ $warnings->links() }}
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Penalties</h3>
        
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        Number of penalties: {{ $penalties->total() }}
                        @foreach($penalties as $i => $penalty)
                        @if($loop->first)
                        <table class="table table-bordered table-striped table-responsive mt-3">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th style="width: 20%">Warning</th>
                            <th style="width: 20%">Note</th>
                            <th style="width: 20%">Date</th>
                            <th style="width: 20%">Time</th>
                          </tr>
                        </thead>
                        <tbody>
                        @endif
                        <tr class="text-center">
                          <td><span class="float-left">{{ $i+1 }}</span></td>
                          <td>
                            {{ $penalty->message }}
                          </td>
                          <td>
                            {{ $penalty->note}}
                          </td>
                          <td>
                            {{ $penalty->created_at->format('Y-m-d') }}
                          </td>
                          <td>
                            {{ $penalty->created_at->format('g:i A') }}
                          </td>
                        </tr>
                        @if($loop->last)
                          </tbody>
                        </table>
                        @endif
                        @endforeach
                    </div>

                    <div class="px-4">
                        {{ $penalties->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection