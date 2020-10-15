@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.index')  }}">Dashboard</a>
{{--            <a class="breadcrumb-item" href="index.html">Category</a>--}}
            <span class="breadcrumb-item active">Brand</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Brand List
                    <a href="" class="btn btn-sm btn-primary" style="float: right" data-toggle="modal" data-target="#brandCreateModal">Add New</a>
                </h6>

                <div class="table-wrapper">
                    <table id="brandTable" class="table display table-sm responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Logo</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{ $brand->id  }}</td>
                            <td>{{ $brand->name  }}</td>
                            <td><img src="{{ asset($brand->logo)  }}" alt="" width="70px" height="80px"> </td>
                            <td>
                                <a href="{{route('admin.brand.edit', $brand->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ route('admin.brand.destroy', $brand->id ) }}" class=" btn btn-sm btn-danger delete" >Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->

            <div class="modal " id="brandCreateModal">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content bd-0">
                        <div class="modal-header pd-y-10 pd-x-10">
                            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Brand</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body ">
                            <form method="POST" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="brand-name">Brand Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid   @enderror " id="brand-name" aria-describedby="emailHelp" placeholder="Enter brand name" name="name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message  }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="brand-logo">Brand Logo</label>
                                    <input type="file" class="form-control @error('logo') is-invalid   @enderror " id="brand-logo" aria-describedby="emailHelp" name="logo">
                                    @error('logo')
                                        <div class="invalid-feedback">
                                            {{ $message  }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div><!-- modal-dialog -->
            </div><!-- modal -->




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

            $('#brandTable').DataTable({
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
