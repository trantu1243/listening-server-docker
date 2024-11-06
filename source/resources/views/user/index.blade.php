@extends('layouts.index')

@section('title', 'Công an')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh sách công an</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Police</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Công an</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Đội</th>
                        <th>Trạng thái</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role === 1 ? "Đội trưởng" : "Công an" }}</td>
                                <td>{{ $item->squad->name }}</td>
                                @if ($item->active)
                                <td><span class="badge bg-success">active</span></td>
                                @else
                                <td><span class="badge bg-danger">disable</span></td>
                                @endif

                                <td class="project-actions text-right">
                                    <form action="{{ Route('post.active', ['id' => $item->id]) }}" style="display: inline-block" method="POST">
                                        @csrf
                                        @if ($item->active)
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Disable
                                        </button>
                                        @else
                                        <button type="submit" class="btn btn-success btn-sm">
                                            Active
                                        </button>
                                        @endif
                                    </form>

                                    <a class="btn btn-warning btn-sm" href="{{ Route('change-password', ['id' => $item -> id])}}">
                                        Đổi mật khẩu
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ Route('edit-user', ['id' => $item -> id])}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
    </div>
</section>



@endsection
