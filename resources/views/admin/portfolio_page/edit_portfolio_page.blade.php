@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Portfolio</h4>
                            <form action="{{ route('update.portfolio', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="portfolio_name" class="col-sm-2 col-form-label">Portfolio Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="portfolio_name" value="{{$portfolio->portfolio_name}}"
                                            name="portfolio_name" type="text" placeholder="Enter portfolio name ...">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="portfolio_title" class="col-sm-2 col-form-label">Portfolio title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="portfolio_title" value="{{$portfolio->portfolio_title}}"
                                            name="portfolio_title" type="text" placeholder="Enter portfolio title ...">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="portfolio_description" class="col-sm-2 col-form-label">Portfolio Description</label>
                                    <div class="col-sm-10">
                                            <textarea class="form-control" id="elm1" name="portfolio_description" type="text">{{$portfolio->portfolio_description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="portfolio_image" class="col-sm-2 col-form-label">Portfolio Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="profile_image" name="portfolio_image" type="file"
                                            placeholder="Enter portfolio image...">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="showImage" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg mt-1"
                                            src="{{ !empty($portfolio->portfolio_image) ? asset('/') . $portfolio->portfolio_image : asset('backend\assets\images\no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Edit Portfolio">

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
