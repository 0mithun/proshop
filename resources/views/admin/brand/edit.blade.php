@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.index')  }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('admin.brand.index')  }}">Category</a>
            <span class="breadcrumb-item active">Edit</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Brand</h6>

                <div class="table-wrapper">
                    <form method="POST" action="{{ route('admin.brand.update', $brand->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">

                            <label for="brand-name">Brand Name</label>
                            <input value="{{ $brand->name  }}" type="text" class="form-control @error('name') is-invalid   @enderror " id="brand-name" aria-describedby="emailHelp" placeholder="Enter brand name" name="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message  }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Old Logo</label>
                            <img src="{{ asset($brand->logo)  }}" alt="" width="90px" height="60px">
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
                </div><!-- table-wrapper -->
            </div><!-- card -->



        </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
