@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.index')  }}">Dashboard</a>
            {{--            <a class="breadcrumb-item" href="index.html">Category</a>--}}
            <span class="breadcrumb-item active">Product</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Product List
                    <a href="{{ route('admin.product.create')  }}" class="btn btn-sm btn-primary" style="float: right" >Add New</a>
                </h6>

                <div class="table-wrapper">
                    <table id="productTable" class="table display table-sm responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Image</th>
                            <th class="wd-15p">Category</th>
                            <th class="wd-15p">Brand</th>
                            <th class="wd-15p">Quantity</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id  }}</td>
                                <td>{{ $product->name  }}</td>
                                <td><img src="{{ asset($product->image_one)  }}" alt="" width="70px" height="80px"> </td>
                                <td>{{ $product->category->name  }}</td>
                                <td>{{ $product->brand->name  }}</td>
                                <td>{{ $product->quantity  }}</td>
                                <td>
                                    @if($product->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.product.destroy', $product->id ) }}" class=" btn btn-sm btn-danger delete" > <i class="fa fa-trash"></i></a>
                                    <a href="{{ route('admin.product.show', $product->id ) }}" class=" btn btn-sm btn-primary" ><i class="fa fa-eye"></i></a>

                                    @if($product->status == 1)
                                        <a href="{{ route('admin.product.inactive', $product->id ) }}" class=" btn btn-sm btn-danger " ><i class="fa fa-arrow-down"></i></a>
                                    @else
                                        <a href="{{ route('admin.product.active', $product->id ) }}" class=" btn btn-sm btn-success " ><i class="fa fa-arrow-up"></i></a>
                                    @endif


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

            $('#productTable').DataTable({
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
