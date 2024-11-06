@extends('layouts.index')

@section('title', 'Chỉnh sửa đối tượng')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Chỉnh sửa đối tượng</h3>
                    </div>
                    <form action="{{ Route('post.edit-suspect', ['id' => $suspect->id]) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Tên</label>
                                <input name="name" value="{{ $suspect->name }}" type="text" class="form-control" id="inputName" placeholder="Enter name" autocomplete="none">
                            </div>
                            <div class="form-group">
                                <label for="squad_id">Đội</label>
                                <select name="squad_id" id="squad_id" class="form-control">
                                    <option value="">--Lựa chọn đội--</option>
                                    @foreach ($squads as $item)
                                    <option value="{{ $item->id }}" {{ $suspect->squad_id == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
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
