@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <a href="{{route('admin.kas.create')}}" class="btn btn-primary mb-3" >Tambah data</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data KAS</h3>

                <div class="card-tools"><form action="{{route('admin.index')}}" method="get">
              <div class="input-group input-group-sm" style="width: 150px;">
                                
                                  <input type="text" name="search" class="form-control float-right" value="" placeholder="Search">
                                  </form>
                                  <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                      <i class="fas fa-search"></i>
                                    </button>
                                  </div>
                                </div>
                </form>
                 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tipe</th>
                      <th>Nominal</th>
                      <th>Deskripsi</th>
                      <th>Gambar</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $d )
                    <tr>
                        <td>
                            {{$loop->iteration}}
                        </td>
                        <td>
                        
                            <?php
                              $tipe = $d->type;
                             switch ($tipe){
                              case 'M':
                                echo "Kas Masuk";
                                break;
                                default:
                                echo "Kas Keluar";
                                break;
                            }
                            ?>
                        </td>
                        <td>
                            {{
                            'Rp. '.number_format($d->nominal, 0, ',', '.')
                            }}
                        </td>
                        <td>
                            {{ $d->des                         
                            }}
                            
                        </td>
                        
                        <td>
                          <img src="{{asset('storage/photo-kas/'.$d->image)}}" width="100" alt="">
                        </td>
                        <td>
                            <a href="{{route('admin.kas.edit',['id'=>$d->id])}}" class="btn badge-warning" > <li class="fas fa-pen"> Edit</li> </a>
                            <a data-toggle="modal" data-target="#modal-delete{{$d->id}}" class="btn badge-danger"><li class="fas fa-trash"> Delete</li></a>
                        </td>
                    </tr>
                     <div class="modal fade" id="modal-delete{{$d->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Confirmation</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah anda yakin akan menghapus data ini <strong></strong> &hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <form action="{{route('admin.kas.delete', ['id'=>$d->id])}}" method="post">
                @csrf
                @method('DELETE')
              <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-danger">Yes</button>
            
              </form>
              </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
                     @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
