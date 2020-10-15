@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.index')  }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('admin.subcategory.index')  }}">Sub Category</a>
            <span class="breadcrumb-item active">Edit</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Sub Category</h6>

                <div class="table-wrapper">
                    <form method="POST" action="{{ route('admin.subcategory.update', $subcategory->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="subcategory-name">Sub Category Name</label>
                            <input value="{{ $subcategory->name  }}" type="text" class="form-control @error('name') is-invalid   @enderror " id="subcategory-name" aria-describedby="emailHelp" placeholder="Enter category name" name="name">
                             @error('name')
                            <div class="invalid-feedback">
                                {{ $message  }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category_id" id="category" class="form-control @error('name') is-invalid   @enderror ">
                                @foreach($categories as $category)
                                    @if($category->id == $subcategory->category_id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error('category_id')
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
