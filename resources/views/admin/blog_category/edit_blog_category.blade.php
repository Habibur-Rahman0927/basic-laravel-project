@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Blog Category</h4>
                            <form action="{{ route('update.blog.category', $blogCategory->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="blog_category" class="col-sm-2 col-form-label">Blog Category Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="blog_category" value="{{$blogCategory->blog_category}}" name="blog_category"
                                            type="text" placeholder="Enter blog category ...">
                                        @error('blog_category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Blog Category">

                            </form>

                            <!-- end row -->
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div> <!-- container-fluid -->
    </div>
@endsection
