@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <center>

                            <img class="rounded-circle avatar-xl mt-5" src="{{ (!empty($adminData->profile_image) ? asset('upload/admin_images').'/'.$adminData->profile_image : asset('backend\assets\images\no_image.jpg') )}}" alt="Card image cap">
                        </center>
                        <div class="card-body">
                            <h4 class="card-title">Name: {{$adminData->name}}</h4>
                            <hr>
                            <h4 class="card-title">Email: {{$adminData->email}}</h4>
                            <hr>
                            <h4 class="card-title">User Name: {{$adminData->username}}</h4>
                            <hr>
                            <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light">Edit profile</a>
                        </div>
                    </div>
                </div>

            </div>

        </div> <!-- container-fluid -->
    </div>
@endsection
