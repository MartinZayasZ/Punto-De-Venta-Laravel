@extends('layouts.admin')

@section('stylesheet')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection

@section('title')
    Agregar nuevo producto
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('includes.messages')
        </div>
    </div>

    <form action="{{ route('product.save') }}" method="POST">

        @csrf

        <div class="row">
            <!-- left column -->
            <div class="offset-1 col-md-8">
                <!-- general form elements -->
                <!-- general form elements disabled -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Información básica</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Introduzca el nombre del producto">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <label>Precio</label>
                                    <div class="input-group">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-dollar-sign"></i>
                                            </span>
                                        </div>
                                        <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror"
                                            placeholder="Introduzca el precio del producto">

                                    </div>
                                    @error('price')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3"
                                        placeholder="Introduzca la descripción del producto"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
                                        placeholder="Introduzca la cantidad en existencia del producto">
                                    @error('stock')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-info">Guardar</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-2">
                <!-- Form Element sizes -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Otras configuraciones</h3>
                    </div>
                    <div class="card-body">
                        <!-- select -->
                        <div class="form-group">
                            <label>Distribuidor</label>
                            <select class="form-control @error('dealer_id') is-invalid @enderror" name="dealer_id">
                                @foreach ($dealers as $dealer)
                                    <option value="{{ $dealer->id }}">{{ $dealer->name }}</option>
                                @endforeach
                            </select>
                            @error('dealer_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Activo</label>
                            <input class="form-control @error('active') is-invalid @enderror" type="checkbox" name="active" checked>
                            @error('active')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (right) -->
        </div>
    </form>

@endsection

@section('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        // Datatable.js
        $(function() {
            $("#table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
        });

        // Funciones para editar y borrar

        $('.btn-delete').click(function() {
            console.log('Producto:', $(this).data('id'));
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Si elimina esto, no hay forma de revertirlo!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borrar de todas formas!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = '/productos/eliminar/' + $(this).data('id');
                }
            })
        })

    </script>
@endsection
