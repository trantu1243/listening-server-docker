@extends('layouts.index')

@section('title', 'Sửa đội')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Chỉnh sửa</h3>
                    </div>
                    <form action="{{ Route('post.edit-squad', ['id' => $squad->id]) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputUsername">Tên</label>
                                <input name="name" type="text" class="form-control" id="inputUsername" placeholder="Enter name" value="{{ $squad->name }}" autocomplete="none">
                            </div>

                            <div class="form-group">
                                <label for="captain_id">Đội trưởng</label>
                                <select name="captain_id" id="captain_id" class="form-control">
                                    <option value="">--Lựa chọn đội trưởng--</option>
                                    @foreach ($polices as $item)
                                    <option value="{{ $item->id }}" {{ $squad->captain_id == $item->id ? "selected" : ""}}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                    <!-- /.card-body -->
                  </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!--/. container-fluid -->
@endsection
