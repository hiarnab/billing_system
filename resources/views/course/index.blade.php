@extends('layout.app')

@push('js')
@endpush
@push('css')
@endpush


@section('content')
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Datatables - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
  <!-- CSS files -->
  <link href="{{asset('assets/css/tabler.min.css?1692870487')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/tabler-flags.min.css?1692870487')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/tabler-payments.min.css?1692870487')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/tabler-vendors.min.css?1692870487')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/demo.min.css?1692870487')}}" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
      --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }

    body {
      font-feature-settings: "cv03", "cv04", "cv11";
    }
  </style>
</head>

<body>
  <script src="{{asset('assets/js/demo-theme.min.js?1692870487')}}"></script>

  <div class="page">
    <div class="col d-flex justify-content-end" style="margin-right: 50px; margin-top:25px;">
      <a href="{{route('course.add')}}" class="btn btn-primary w-80"> <i class="fas fa-plus me-2"></i>Add Course</a>
    </div>
    <!-- Navbar -->
    <div class="page-wrapper">
      <!-- Page header -->
      <div class="page-header d-print-none">
        <div class="container-xl">
          <div class="row g-2 align-items-center">
            <div class="col">
              <h2 class="page-title">
                Course list
              </h2>
            </div>
          </div>
        </div>
      </div>
      <!-- Page body -->
      <div class="page-body">
        <div class="container-xl">
          <div class="card">
            <div class="card-body">
              <div id="table-default" class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th><button class="table-sort" data-sort="sort-sl">Sl</button></th>
                      <th><button class="table-sort" data-sort="sort-name">Name</button></th>
                      <th><button class="table-sort" data-sort="sort-session">session</button></th>
                      <th><button class="table-sort" data-sort="sort-duration">Duration </button></th>
                      <th><button class="table-sort" data-sort="sort-status">status </button></th>
                      <th><button class="table-sort" data-sort="sort-action">Action</button></th>
                    </tr>
                  </thead>
                  <tbody class="table-tbody">
                    @foreach($courses as $course)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td class="sort-name">{{$course->name}}</td>
                      <td class="sort-city">{{$course->session}}</td>
                      <td class="sort-type">{{$course->duration}}</td>
                      <td class="sort-score">{{$course->status}}</td>
                      <td>
                        <div class="button-list">
                          <a href="{{route('course.view', $course->id)}}" class="btn btn-primary">View</a>
                        </div>
                        <div class="button-list">
                          <a href="{{route('course.edit', $course->id)}}" class="btn btn-success">Edit</a>
                        </div>
                        <div class="button-list">
                          <a href="#" class="btn btn-danger">Delete</a>
                        </div>
                        @if($course->status === 'active')
                        <a href="{{ route('deactive.course', $course->id) }}" class="btn btn-danger">Deactivate</a>
                        @else
                        <a href="{{ route('active.course', $course->id) }}" class="btn btn-success">Activate</a>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Libs JS -->
  <script src="{{asset('assets/libs/list.js/dist/list.min.js?1692870487')}}" defer></script>
  <!-- Tabler Core -->
  <script src="{{asset('assets/js/tabler.min.js?1692870487')}}" defer></script>
  <script src="{{asset('assets/js/demo.min.js?1692870487')}}" defer></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const list = new List('table-default', {
        sortClass: 'table-sort',
        listClass: 'table-tbody',
        valueNames: ['sort-name', 'sort-type', 'sort-city', 'sort-score',
          {
            attr: 'data-date',
            name: 'sort-date'
          },
          {
            attr: 'data-progress',
            name: 'sort-progress'
          },
          'sort-quantity'
        ]
      });
    })
  </script>
</body>

</html>
@endsection