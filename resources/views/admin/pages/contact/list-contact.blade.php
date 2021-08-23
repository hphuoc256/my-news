@extends('admin.layout.layout')
@section('title')
    <title>
        List Contact | Admin
    </title>
@endsection

@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">List Contact
            </div>
        </div>
        <div class="card-body">
            <div class="datatable datatable-bordered datatable-head-custom" id="kt_warning"></div>
        </div>
    </div>
@endsection

@section('js')
<script>
    var _edit = '{{ route("getDetailContact",":id") }}';
    var _del = '{{ route("deleteService",":id") }}';
</script>
<script>
    @if(Session::has('message'))
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Successfully !",
            showConfirmButton: false,
            timer: 1500,
        })
    @endif
</script>
<script>
    "use strict";
    // Class definition

    var KTDatatableRemoteAjaxDemo = function() {
        // Private functions
        // basic demo
        var demo = function() {
            var datatable = $('#kt_warning').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '{{ route('postContact') }}',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            map: function(raw) {
                                // sample data mapping
                                var dataSet = raw;
                                if (typeof raw.data !== 'undefined') {
                                    dataSet = raw.data;
                                }
                                return dataSet;
                            },
                        },
                    },
                    pageSize: 10,
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
                },
                layout: {
                    scroll: true,
                    footer: false,
                },
                sortable: true,
                
                pagination: true,

                search: {
                    input: $('#kt_datatable_search_query'),
                    key: 'generalSearch'
                },

                // columns definition
                columns: [ 
                {
                    field: 'id',
                    title: 'ID',
                    sortable: 'asc',
                    width: 30,
                    type: 'number',
                    selector: false,
                    textAlign: 'center',
                },
                {
                    field: 'email',
                    title: 'Email',
                },
                {
                    field: 'name',
                    title: 'User Name',  
                    autoHide: false,              
                }, 
                {
                    field: 'phone',
                    title: 'Phone',
                },
                {
                    field: 'status',
                    title: 'Status',
                    textAlign: 'center',
                    template: function(row) {
                        if(row.status==1){
                            return '<span class="label font-weight-bold label-lg label-light-success label-inline"> Yes Feedback </span>';
                        }
                        else if(row.status==0){
                            return '<span class="label font-weight-bold label-lg label-light-danger label-inline"> No Feedback </span>';
                        }                   
                    },
                },
                {
                    field: 'created_at',
                    title: 'Created at',                        
                    type: 'date',
                    template: function(row) {
                        return `<span>${moment(row.created_at).format("DD-MM-YYYY h:mm:ss A")}</span>`
                    }
                },
                {
                    field: '',
                    title: 'Action',
                    sortable: false,
                    overflow: 'visible',
                    textAlign: 'center',
                    autoHide: false,
                    template: function(row) {
                        return `
                            <div class="dropdown dropdown-inline">
                                
                            <a href="${_edit.replace(':id',row.id)}" class="btn btn-sm btn-clean btn-icon mr-2" title="View Detail">
                                <span class="svg-icon svg-icon-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                        `;
                    },
                },],

            });

            $('#kt_datatable_search_status').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'Status');
            });

            $('#kt_datatable_search_type').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'Type');
            });

            $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
        };

        return {
            // public functions
            init: function() {
                demo();
            },
        };
    }();

    jQuery(document).ready(function() {
        KTDatatableRemoteAjaxDemo.init();
    });
</script>

<script type="text/javascript">
    jQuery(document).ready(function () {
        $('body').on('click', '.kt_sweetalert_delete', function (e) {
            e.preventDefault();
            var id = $(this).attr('rel');
            var that = this;
            Swal.fire({
                title: 'Are you sure?',
                type: 'warning',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                                url: _del.replace(':id', id),
                                type: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                dataType: 'json'
                            })
                            .done(function(response) {
                                Swal.fire('Deleted!', 'Delete Successfully !', 'success')
                                $(that).parents('.datatable-row').remove();
                            })
                            .fail(function() {
                                Swal.fire('Error...', 'Delete Error !', 'error')
                            });
                    });
                },
            });
        });
    });
</script>

@endsection