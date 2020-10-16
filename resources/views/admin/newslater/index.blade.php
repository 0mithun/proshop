@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.index')  }}">Dashboard</a>
{{--            <a class="breadcrumb-item" href="index.html">Category</a>--}}
            <span class="breadcrumb-item active">Newslater</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Newslater List
{{--                    <a href="" class="btn btn-sm btn-primary" style="float: right" data-toggle="modal" data-target="#couponCreateModal">Add New</a>--}}
                </h6>

                <div class="table-wrapper">
                    <table id="newslaterTable" class="table display table-sm responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Email</th>
                            <th class="wd-15p">Subscribe Time</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($newslaters as $newslater)
                        <tr>
                            <td>{{ $newslater->id  }}</td>
                            <td>{{ $newslater->email  }}</td>
                            <td>{{ $newslater->created_at->format('Y-M-d')  }}</td>
                            <td>
                                <a href="{{ route('admin.newslater.destroy', $newslater->id ) }}" class=" btn btn-sm btn-danger delete" >Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->

        </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection

@section('admin_scripts')
    <script src="{{ asset('/backend/lib/highlightjs/highlight.pack.js') }}"></script>
    <script src="{{ asset('/backend/lib/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/backend/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('/backend/lib/select2/js/select2.min.js') }}"></script>
    <script>
        $(function(){
            'use strict';

            $('#newslaterTable').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });
            // Select2
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        });
    </script>



@endsection

@section('admin_styles')
    <link href="{{ asset('/backend')  }}/lib/highlightjs/github.css" rel="stylesheet">
    <link href="{{ asset('/backend')  }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{ asset('/backend')  }}/lib/select2/css/select2.min.css" rel="stylesheet">
@endsection
