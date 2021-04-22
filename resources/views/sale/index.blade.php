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
    Ventas
@endsection

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="row">
                <div class="col-6">
                    @include('includes.messages')
                </div>
                <div class="col-6 text-right mb-3">
                    <a href="{{ route('dashboard') }}" class="btn btn-info">Agregar venta</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Estatus</th>
                                <th>Total</th>
                                <th>Última modificación</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td>{{ $sale->id }}</td>
                                    <td>{{ $sale->customer->name .' '. $sale->customer->surname }}</td>
                                    <td>{{ $sale->status }}</td>
                                    <td align="center">${{ $sale->total }}</td>
                                    <td>{{ $sale->updated_at }}</td>
                                    <td class="table-actions">
                                        <a href="{{ route('sale.edit', ['id' => $sale->id]) }}" class="btn btn-app bg-info btn-edit">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <a class="btn btn-app bg-danger btn-delete" data-id="{{ $sale->id }}">
                                            <i class="fas fa-trash-alt"></i> Borrar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Estatus</th>
                                <th>Total</th>
                                <th>Última modificación</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

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

        $('.btn-delete').click(function(){
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
