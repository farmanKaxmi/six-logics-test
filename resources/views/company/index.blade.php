@extends('layouts.app')

@section('style')
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Companies') }}</div>

                    <div class="card-body">
                        <table style="width:100%"
                               class="table table-striped- table-bordered table-hover companiesTable">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            <thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            $('#myTable').DataTable();

            let route = '{{ route('company.index') }}';
            let length = 10;
            let companiesTable = jQuery('.companiesTable').DataTable({
                scrollX: true,
                columnDefs: [{
                    width: '900px',
                    searchable: true
                }],
                processing: true,
                serverSide: true,
                ajax: {
                    url: route,
                    type: 'GET',
                    data: function (d) {
                        d.length = length;
                        d.datatable = true;
                    }
                },
                columns: [
                    {
                        data: 'id',
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: null,
                        render: function (data, type, row) {
                            let $return = '' +
                                '<a href="#" class="fa fa-eye"></a> ';
                            return $return;
                        },
                        orderable: false, searchable: false
                    }
                ],
                order: [[0, "desc"]],
                "pageLength": length
            });
            jQuery('#generalSearch').on('keyup', function () {
                companiesTable.search($('#generalSearch').val()).draw();
            });

        });
    </script>
@endsection
