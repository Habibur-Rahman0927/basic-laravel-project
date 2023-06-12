@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Change Password page</h4>
                            <br/>
                            <form action="{{ route('update.password') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="oldPassword" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="oldPassword" value=""
                                            name="oldPassword" type="password" placeholder="Enter your old password...">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="newPassword" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="newPassword" value=""
                                            name="newPassword" type="password" placeholder="Enter your New password...">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="confirmPassword" value=""
                                            name="confirmPassword" type="password" placeholder="Enter your Confirm password...">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">

                            </form>

                            <!-- end row -->
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div> <!-- container-fluid -->
    </div>
@endsection
