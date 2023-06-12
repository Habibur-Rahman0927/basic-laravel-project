@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Home Slide page</h4>
                            <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="title" value="{{ $homeSlider->title }}"
                                            name="title" type="text" placeholder="Enter title...">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="sort_title" class="col-sm-2 col-form-label">Sort Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="sort_title" value="{{ $homeSlider->sort_title }}"
                                            name="sort_title" type="text" placeholder="Enter sort title...">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="video_url" class="col-sm-2 col-form-label">Video URL</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="video_url" value="{{ $homeSlider->video_url }}"
                                            name="video_url" type="url" placeholder="Enter video url...">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="profile_image" class="col-sm-2 col-form-label">Slider Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="profile_image" name="profile_image" type="file"
                                            placeholder="Enter Profile Image...">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="showImage" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg mt-1"
                                            src="{{ !empty($homeSlider->home_slide) ? asset('upload/home_slide') . '/' . $homeSlider->home_slide : asset('backend\assets\images\no_image.jpg') }}"
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
