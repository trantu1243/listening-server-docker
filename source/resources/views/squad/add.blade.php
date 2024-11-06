@extends('layouts.index')

@section('title', 'Thêm đội')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Thêm</h3>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputUsername">Tên</label>
                                <input name="name" type="text" class="form-control" id="inputUsername" placeholder="Enter name" autocomplete="none">
                            </div>

                            <div class="form-group">
                                <label for="captain_id">Đội trưởng</label>
                                <select name="captain_id" id="captain_id" class="form-control">
                                    <option value="">--Lựa chọn đội trưởng--</option>
                                    @foreach ($polices as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                    <!-- /.card-body -->
                  </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!--/. container-fluid -->
@endsection
