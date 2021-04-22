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
    Editar venta
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('includes.messages')
        </div>
    </div>

    <form action="{{ route('sale.update', $sale->id) }}" method="POST">

        @csrf

        <div class="row">

            <div class="col-md-12">
                @include('includes.messages')
            </div>

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
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                        name="description" rows="3"
                                        placeholder="Introduzca la descripción del producto">{{ $sale->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <label>Total</label>
                                    <div class="input-group">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-dollar-sign"></i>
                                            </span>
                                        </div>
                                        <input type="number" step="0.01" name="total" value="{{ $sale->total }}"
                                            class="form-control @error('total') is-invalid @enderror"
                                            placeholder="Introduzca el precio del producto">

                                    </div>
                                    @error('total')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-info">Actualizar</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->
                <!-- productos -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Productos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nombre</th>
                                    <th style="width: 40px">Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sale->products as $product)
                                <tr>
                                    <td>{{$product->product->id}}</td>
                                    <td>{{$product->product->name}}</td>
                                    <td><span>$ {{$product->product->price}}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card products -->
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
                            <label>Vendedor</label>
                            <select class="form-control @error('user_id') is-invalid @enderror" name="user_id">
                                @foreach ($users as $user)
                                    <option {{ $sale->user_id == $user->id ? 'selected' : '' }}
                                        value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Cliente</label>
                            <select class="form-control @error('user_id') is-invalid @enderror" name="customer_id">
                                @foreach ($customers as $customer)
                                    <option {{ $sale->customer_id == $customer->id ? 'selected' : '' }}
                                        value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                            @error('customer_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Estatus</label>
                            <select class="form-control @error('user_id') is-invalid @enderror" name="status">
                                @foreach ($status_list as $status)
                                    <option {{ $sale->status == $status ? 'selected' : '' }}
                                        value="{{ $status }}">{{ $status }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
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
