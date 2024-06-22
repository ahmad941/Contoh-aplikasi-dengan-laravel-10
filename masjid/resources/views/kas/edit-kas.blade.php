@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">KAS MASJID</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('admin.kas.update', ['id'=> $data->id])}}" method="post"  enctype="multipart/form-data">
                @csrf
                   @method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tipe Kas</label>
                    <select class="form-control" name="type" id="">
                      <option value="{{$data->type}}">
                           {{$data->type}}
                      </option>
                      <option value="M">
                            Kas masuk
                      </option>
                      <option value="K">
                            Kas keluar
                      </option>
                    </select>
                   
                    @error('type')
                    <small>{{$message}}</small>
                    @enderror  
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nominal</label>
                    <input type="text"  type="number" step="0.01" name="nominal" value="{{$data->nominal}}" class="form-control" id="exampleInputEmail1" placeholder="input nominal kas">
                     @error('nominal')
                    <small>{{$message}}</small>
                    @enderror  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi</label>
                    <input type="text" name="des" value="{{$data->des}}" class="form-control" id="exampleInputEmail1" placeholder="Keterangan kas">
                     @error('des')
                    <small>{{$message}}</small>
                    @enderror  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" name="image" class="form-control" id="exampleInputEmail1" >
                     @error('image')
                    <small>{{$message}}</small>
                    @enderror  
                </div>
            
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
        
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection