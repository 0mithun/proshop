@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.index')  }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('admin.product.index')  }}">Product</a>
            <span class="breadcrumb-item active">Create</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Add Product</h6>
                <div class="form-layout">
                    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Enter product name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Dode<span class="tx-danger">*</span></label>
                                    <input class="form-control @error('code') is-invalid @enderror" type="text" name="code" value="{{ old('code')  }}" placeholder="Enter product code">
                                    @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('quantity') is-invalid @enderror" type="number" name="quantity" value="{{ old('quantity')  }}" placeholder="Enter product quantity">
                                    @error('quantity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Detail: <span class="tx-danger">*</span></label>
                                        <textarea id="detail" name="detail">{{ old('detail') }}</textarea>
                                        @if($errors->has('detail'))
                                            <div class="text-danger">{{ $errors->first('detail') }}</div>
                                        @endif
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">Please Select a category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                                    <select name="subcategory_id" id="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror">

                                    </select>

                                    @error('subcategory_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                    <select name="brand_id" id="" class="form-control @error('brand_id') is-invalid @enderror">
                                        <option value="">Please Select a Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name  }}</option>
                                        @endforeach
                                    </select>

                                    @error('brand_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Color: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('color') is-invalid @enderror" type="text" name="color" value="{{ old('color')  }}" placeholder="Enter product color" data-role="tagsinput">

                                    @error('color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Size: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('size') is-invalid @enderror" type="text" name="size" value="{{ old('size')  }}" placeholder="Enter product size" data-role="tagsinput">
                                    @error('size')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" value="{{ old('price')  }}" placeholder="Enter product price">
                                    @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Sell Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('sell_price') is-invalid @enderror" type="number" name="sell_price" value="{{ old('sell_price')  }}" placeholder="Enter product sell price">
                                    @error('sell_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Discount Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('discount_price') is-invalid @enderror" type="number" name="discount_price" value="{{ old('discount_price')  }}" placeholder="Enter product discount price">
                                    @error('discount_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Video: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('video') is-invalid @enderror" type="text" name="video" value="{{ old('video')  }}" placeholder="Enter video link">
                                    @error('video')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="image_one" class="form-control-label">Image One: </label>
                                    <br>
                                    <label class="custom-file">
                                        <input type="file" id="image_one" name="image_one" class="custom-file-input @error('image_one') @enderror" onchange="loadImage(event, 'upload_image_one')">
                                        <span class="custom-file-control"></span>
                                    </label>

                                    <br>
                                    <img src="" id="upload_image_one"  alt="" >
                                    @if($errors->has('image_one'))
                                        <div class="text-danger">{{ $errors->first('image_one') }}</div>
                                    @endif
                                </div>
                            </div><!-- col -->
                            <div class="col-lg-3 mg-t-40 mg-lg-t-0">
                                <div class="form-group">
                                    <label for="image_two" class="form-control-label">Image Two: </label>
                                    <br>
                                    <label class="custom-file">
                                        <input type="file" id="image_two" name="image_two" class="custom-file-input @error('image_two') is-invalid @enderror "  onchange="loadImage(event, 'upload_image_two')">
                                        <span class="custom-file-control custom-file-control-primary"></span>
                                    </label>
                                    @error('image_two')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <img src="" id="upload_image_two"  alt="" >
                                </div>
                            </div><!-- col -->
                            <div class="col-lg-3 mg-t-40 mg-lg-t-0">
                                <div class="form-group">
                                    <label for="image_three" class="form-control-label">Image Three: </label>
                                    <br>
                                    <label class="custom-file">
                                        <input type="file" id="image_three" name="image_three" class="custom-file-input @error('image_three') is-invalid @enderror " onchange="loadImage(event, 'upload_image_three')">
                                        <span class="custom-file-control custom-file-control-inverse"></span>
                                    </label>
                                    @error('image_three')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <img src="" id="upload_image_three"  alt="" >
                                </div>

                            </div><!-- col -->
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="main_slider" value="1">
                                        <span>Main Slider</span>
                                    </label>
                                    @error('main_slider')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="hot_deal"  value="1">
                                        <span>Hot Deal</span>
                                    </label>
                                    @error('hot_deal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="best_rated"  value="1">
                                        <span>Best Rated</span>
                                    </label>
                                    @error('best_rated')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="mid_slider"  value="1">
                                        <span>Mid Slider</span>
                                    </label>
                                    @error('mid_slider')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="hot_new"  value="1">
                                        <span>Hot New</span>
                                    </label>
                                    @error('hot_new')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="trend"  value="1">
                                        <span>Trend</span>
                                    </label>
                                    @error('trend')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="status"  value="1">
                                        <span>Status</span>
                                    </label>
                                    @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div><!-- row -->

                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5" type="submit">Submit Form</button>
                            <a class="btn btn-secondary" href="{{ route('admin.product.index') }}">Cancel</a>
                        </div><!-- form-layout-footer -->
                    </form>
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
