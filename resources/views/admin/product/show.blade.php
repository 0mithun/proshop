@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.index')  }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('admin.product.index')  }}">Product</a>
            <span class="breadcrumb-item active">Product View</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">View Product <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-sm btn-primary pull-right">Edit Product</a> </h6>
                <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <strong>{{ $product->name  }}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code<span class="tx-danger">*</span></label>
                                    <strong>{{ $product->code  }}</strong>
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                   <strong>{{ $product->quantity  }}</strong>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Detail: <span class="tx-danger">*</span></label>
                                    <div>{!! $product->detail !!}</div>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <strong>{{ $product->category->name  }}</strong>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Sub Category:</label>
                                    @if($product->subcategory()->exists())
                                        <strong> {{ $product->subcategory->name  }}</strong>
                                    @endif

                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                    <strong>{{ $product->brand->name  }}</strong>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Color: </label>
                                    <strong>{{ $product->color }}</strong>
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Size: </label>
                                   <strong>{{ $product->size  }}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                                    <strong>{{ $product->price  }}</strong>
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Sell Price: <span class="tx-danger">*</span></label>
                                    <strong>{{ $product->sell_price  }}</strong>
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Discount Price:</label>
                                    <strong>{{ $product->discount_price  }}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Video: </label>
                                    <strong>{{ $product->video  }}</strong>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="image_one" class="form-control-label">Image One: </label>
                                    <br>
                                    <img src="{{ asset($product->image_one)  }}" id="upload_image_one"  alt="" >
                                </div>
                            </div><!-- col -->
                            <div class="col-lg-3 mg-t-40 mg-lg-t-0">
                                <div class="form-group">
                                    <label for="image_two" class="form-control-label">Image Two: </label>
                                    <br>
                                    <img src="{{ asset($product->image_two)  }}" id="upload_image_one"  alt="" >
                                </div>
                            </div><!-- col -->
                            <div class="col-lg-3 mg-t-40 mg-lg-t-0">
                                <div class="form-group">
                                    <label for="image_three" class="form-control-label">Image Three: </label>
                                    <br>
                                    <img src="{{ asset($product->image_three)  }}" id="upload_image_one"  alt="" >
                                </div>

                            </div><!-- col -->
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="">Main Slider:
                                        @if($product->main_slider==1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </label>

                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="">Hot Deal:
                                        @if($product->hot_deal==1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="">Best Rated:
                                        @if($product->best_rated==1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="">Mid Slider:
                                        @if($product->mid_slider==1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class=""> Hot New:
                                        @if($product->hot_new==1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class=""> Trending:
                                        @if($product->trend==1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </label>
                                </div>

                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="">Status:
                                        @if($product->status==1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </label>
                                </div>
                            </div>

                        </div><!-- row -->
                    <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-danger"> <i class="fa fa-arrow-left"></i> Back</a>
                </div><!-- form-layout -->
            </div><!-- card -->




        </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection

@section('admin_scripts')
    <script src="{{ asset('backend') }}/lib/summernote/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script>
        $(function(){
            'use strict';

            // Summernote editor
            $('#detail').summernote({
                height: 150,
                tooltip: false
            })

            $('#category_id').change(function () {
                var category_id = $(this).val();

                $.ajax({
                    url:'/admin/category/'+category_id+'/get-all-category',
                    type:'GET',
                    dataType:'JSON',
                    success: function(data){
                        $('#subcategory_id').empty();
                        $.each(data, function(key, value){
                            $('#subcategory_id').append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    }
                });
            });




        });

        function loadImage(event, id){

            var source = URL.createObjectURL(event.target.files[0])
            document.getElementById(id).src = source;
            document.getElementById(id).width = 100;
            document.getElementById(id).height = 70;
        }
    </script>
@endsection

@section('admin_styles')

    <link href="{{ asset('backend') }}/lib/summernote/summernote-bs4.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>

@endsection
