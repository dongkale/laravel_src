@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('message'))
                <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
            @endif
            @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <div class="card">
                <div class="card-header">Change Password</div>
                <div class="card-body">
                    <form action="{{ url('change-password') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            {{-- <label>Current Password</label> --}}
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Current Password') }}</label>
                            <div class="col-md-6">
                                <input type="password" name="current_password" class="form-control" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            {{-- <label>New Password</label> --}}
                            <label class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>
                            <div class="col-md-6">
                                <input type="password" name="password" class="form-control" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            {{-- <label>Confirm Password</label> --}}
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input type="password" name="password_confirmation" class="form-control" />
                            </div>
                        </div>

                        {{-- <div class="mb-3 text-end">
                            <hr>
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div> --}}

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
