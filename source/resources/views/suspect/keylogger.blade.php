@extends('layouts.index')

@section('title', 'Keylogger')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Keylogger</h1>
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
                    <textarea rows="40" class="form-control">{{ $suspect->keylogger }}</textarea>
                </div>
              </div>
              <!-- /.card -->
            </div>
        </div>
    </div>
</section>

@endsection
