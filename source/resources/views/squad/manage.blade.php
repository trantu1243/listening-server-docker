@extends('layouts.index')

@section('title', auth()->user()->squad->name)

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ auth()->user()->squad->name }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Squad</li>
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
                    <dic class="card-body">
                        <form action="{{ Route('add-squad') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="email">Thêm thành viên</label>
                                        <input name="email" type="text" class="form-control" id="email" placeholder="Nhập email" autocomplete="none">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary" style="float: right">Thêm</button>
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
                    <h3 class="card-title">Danh sách thành viên</h3>

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
                                @if ($item->active)
                                <td><span class="badge bg-success">active</span></td>
                                @else
                                <td><span class="badge bg-danger">disable</span></td>
                                @endif

                                <td class="project-actions text-right">

                                    <a class="btn btn-danger btn-sm delete-button" data-id="{{ $item->id }}" data-name="{{ $item->name }}">
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
              </div>
              <!-- /.card -->
            </div>
          </div>
    </div>
</section>
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteLabel">Xác nhận</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="content-popup">
                Bạn có chắc chắn muốn xóa không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <form action="" method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" id="deleteButton" href="">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div data-base-url="{{ route('delete-police', ['id' => 'PLACEHOLDER']) }}" id="urlBasePlaceholder"></div>
<script>
    document.querySelectorAll('.delete-button').forEach(function(element) {
        element.addEventListener('click', function(event) {
            event.preventDefault();

            var id = this.getAttribute('data-id');
            var name = this.getAttribute('data-name');

            var baseUrl = document.getElementById('urlBasePlaceholder').getAttribute('data-base-url');
            var actionUrl = baseUrl.replace('PLACEHOLDER', id);

            document.getElementById('deleteForm').setAttribute('action', actionUrl);
            document.querySelector('#content-popup').textContent = `Bạn có chắc chắn muốn xóa ${name} ra khỏi đội không?`;

            var confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'), {});
            confirmDeleteModal.show();
        });
    });
</script>


@endsection
