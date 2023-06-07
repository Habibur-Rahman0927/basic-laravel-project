@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Profile page</h4>
                            <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="name" value="{{ $editData->name }}"
                                            name="name" type="text" placeholder="Enter your name...">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label">User name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="username" value="{{ $editData->username }}"
                                            name="username" type="text" placeholder="Enter your username...">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="email" value="{{ $editData->email }}"
                                            name="email" type="email" placeholder="Enter your email...">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="profile_image" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="profile_image" name="profile_image" type="file"
                                            placeholder="Enter Profile Image...">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="showImage" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg mt-1"
                                            src="{{ asset('upload/admin_images').'/'.$editData->profile_image}}" alt="Card image cap">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">

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
