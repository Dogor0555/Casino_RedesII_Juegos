@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agregar Nuevo Administrador</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <form method="post" action="" enctype="multipart/form-data">
                  {{csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                    <label>Nombres</label>
                    <input type="text" class="form-control" name="name" required placeholder="Introduzca el nombre">
                  </div>
                  <div class="form-group">
                    <label>Apellidos</label>
                    <input type="text" class="form-control" name="last_name" required placeholder="Introduzca los nombre">
                  </div>
                  <div class="form-group">
                    <label>Correo</label>
                    <input type="email" class="form-control"  name="email" required placeholder="introduzca el correo">
                  </div>
                  <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="Introduzca la contrasena">
                  </div>
                  <div class="form-group">
                    <label>Confirmar Contraseña</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar la contrasena">
                  </div>
                  <div class="form-group">
                    <input type="file" class="form-control" name="user_photo" accept="image/*" placeholder="Foto de perfil">
                  </div>
                  <!--<div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> 
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>-->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Agregar</button>
                  <a href="{{ url('admin/admin/list')}}" class="btn btn-secondary">Regresar</a>
                </div>
              </form>
            </div>
           

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    
@endsection