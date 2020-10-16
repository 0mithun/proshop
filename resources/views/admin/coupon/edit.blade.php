@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.index')  }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('admin.coupon.index')  }}">Coupon</a>
            <span class="breadcrumb-item active">Edit</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Coupon</h6>

                <div class="table-wrapper">
                    <form method="POST" action="{{ route('admin.coupon.update', $coupon->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="coupon-name">Coupon Name</label>
                            <input value="{{ $coupon->coupon  }}" type="text" class="form-control @error('coupon') is-invalid   @enderror " id="coupon-name" aria-describedby="emailHelp" placeholder="Enter coupon name" name="coupon">
                            @error('coupon')
                            <div class="invalid-feedback">
                                {{ $message  }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="coupon-discount">Discount %</label>
                            <input type="text" value="{{$coupon->discount}}" class="form-control @error('discount') is-invalid   @enderror " id="coupon-discount"  placeholder="Enter discount %" name="discount">
                            @error('discount')
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
