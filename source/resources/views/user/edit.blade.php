@extends('layouts.index')

@section('title', 'Chỉnh sửa công an')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Chỉnh sửa công an</h3>
                    </div>
                    <form action="{{ Route('post.edit-user', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputEmail1">Email</label>
                                <input name="username" value="{{ $user->email }}" type="text" class="form-control" id="inputEmail1" placeholder="Enter email" autocomplete="none" disabled>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Tên</label>
                                <input name="name" value="{{ $user->name }}" type="text" class="form-control" id="inputName" placeholder="Enter name" autocomplete="none">
                            </div>
                            <div class="form-group">
                                <label for="role">Vai trò</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="">--Lựa chọn cấp bậc--</option>
                                    <option value="1" {{ $user->role == 1 ? 'selected' : ''}}>Đội trưởng</option>
                                    <option value="2" {{ $user->role == 2 ? 'selected' : ''}}>Công an</option>
                                </select>
                            </div>
                            @error('role')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="squad_id">Đội</label>
                                <select name="squad_id" id="squad_id" class="form-control">
                                    <option value="">--Lựa chọn đội--</option>
                                    @foreach ($squads as $item)
                                    <option value="{{ $item->id }}" {{ $user->squad_id == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Change</button>
                        </div>
                    </form>
                    <!-- /.card-body -->
                  </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!--/. container-fluid -->
@endsection
