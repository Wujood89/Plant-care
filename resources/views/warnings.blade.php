@extends('layouts.app')

@section('content')
<section class="content">
  <div class="container-fluid py-4">
    <div class="row">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Warnings</h3>
          </div>
          <div class="card-body">
            Number of results: {{ $warnings->total() }}
            @foreach($warnings as $i => $warning)
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
            </tr>    

            @if($loop->last)
              </tbody>
            </table>
            @endif
            @endforeach
          </div>

          <div class="px-4">
            {{ $warnings->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection