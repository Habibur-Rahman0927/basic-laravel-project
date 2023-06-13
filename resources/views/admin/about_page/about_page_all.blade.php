@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">About page</h4>
                            <form action="{{ route('update.about') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$about->id}}">
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="title" value="{{ $about->title }}"
                                            name="title" type="text" placeholder="Enter title...">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="sort_title" class="col-sm-2 col-form-label">Sort Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="sort_title" value="{{ $about->sort_title }}"
                                            name="sort_title" type="text" placeholder="Enter sort title...">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="sort_description" class="col-sm-2 col-form-label">Sort Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="sort_description"
                                            name="sort_description" placeholder="Enter sort description...">{{ $about->sort_description }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="long_description" class="col-sm-2 col-form-label">Long Description</label>
                                    <div class="col-sm-10">
                                            <textarea class="form-control" id="elm1" name="long_description" type="text">{{ $about->long_description }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="about_image" class="col-sm-2 col-form-label">About Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="profile_image" name="about_image" type="file"
                                            placeholder="Enter About Image...">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="showImage" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg mt-1"
                                            src="{{ !empty($about->about_image) ? asset('/') . $about->about_image : asset('backend\assets\images\no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Slide">

                            </form>

                            <!-- end row -->
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div> <!-- container-fluid -->
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#profile_image').change(function(e) {
                e.preventDefault();
                var reader = new FileReader()
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0])
            });
        });
    </script>
@endsection
