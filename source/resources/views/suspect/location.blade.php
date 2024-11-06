@extends('layouts.index')

@section('title', 'Định vị')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Định vị</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
          </ol>
        </div>
      </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $suspect->android_id . " - " . $suspect->name }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Time</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $item)
                            <tr>
                                <td>{{ $item->time }}</td>
                                <td>{{ $item->latitude }}</td>
                                <td>{{ $item->longitude }}</td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm"  href="https://www.google.com/maps/search/?api=1&query={{ $item->latitude }},{{ $item->longitude }}" target="_blank">
                                        <i class="fas fa-map-marker-alt">
                                        </i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $locations->links('pagination::bootstrap-4') }}
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
    </div>
</section>
@endsection
