@extends('layouts.admin-master')


@section('content')

<div class="row">
  <div class="col-12">
    <div class="page-title-box">
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Administration</a></li>
          <li class="breadcrumb-item active">Service History</li>
        </ol>
      </div>
      <h4 class="page-title">Service History</h4>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">

        <h4 class="header-title">Service Requested History</h4>
        <p class="text-muted font-13 mb-4">
          List of all closed requested services.
        </p>

        <table id="basic-datatable" class="table dt-responsive nowrap ">
          <thead>
            <tr>
              <th>SRID</th>
              <th>Requested By</th>
              <th>Started Date</th>
              <th>Closed Date</th>
              <th>Assigned Tech/s</th>
              <th>Action</th>

            </tr>
          </thead>


          <tbody>
            @foreach ($service_requests as $sr)
            <tr>
              <td>
                <a href="{{ url('/admin/services/service_request_details/' . $sr['id'])}}">
                  {{ date('Y') . '-' . '0000' . $sr['id'] }}
                </a>
              </td>
              <td>
              @if ($sr['client_contact_person'] === null) 
                {{ $sr['client']['firstname'] . ' ' . $sr['client']['lastname'] }}
              @else
                {{ $sr['client_contact_person']['firstname'] . ' ' . $sr['client_contact_person']['lastname'] }} 
              @endif
              </td>
              <td>{{ date('F d, Y', strtotime($sr['service_date']))}} </td>
              <td>
                {{ date('F d, Y g:i A', strtotime($sr['completed_at']))}} 
              </td>
              <td>
                {{ $sr['technicians'][0]['username'] }} <br>
                {{ $sr['technicians'][1]['username'] }}
                <br>
              </td>
              <td>
                {{-- <button class="btn btn-sm btn-info" data-target="#ServiceInfo" data-toggle="modal"><i
                    class="fe-list"></i></button> --}}
                <button class="btn btn-sm btn-secondary"><i class="fe-trash"></i></button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>


@endsection