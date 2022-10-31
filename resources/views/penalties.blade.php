@extends('layouts.app')

@section('content')
<section class="content">
  <div class="container-fluid py-4">
    <div class="row">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Penalties</h3>
          </div>
          <div class="card-body">
            Number of results: {{ $penalties->total() }}
            @foreach($penalties as $i => $penalty)
            @if($loop->first)
            <table class="table table-bordered table-striped table-responsive mt-3">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th style="width: 15%">Penalty</th>
                    <th style="width: 15%">Note</th>
                    <th style="width: 15%">Cost</th>
                    <th style="width: 15%">Date</th>
                    <th style="width: 15%">Time</th>
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
                {{ $penalty->note }}
              </td>
              <td>
                  {{ $penalty->cost }}
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