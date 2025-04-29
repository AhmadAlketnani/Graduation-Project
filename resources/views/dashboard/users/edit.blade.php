@extends('dashboard.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    {{-- <h5 class="mb-0">Basic with Icons</h5> --}}
                    <small class="text-body-secondary float-end">Edit User</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('dashboard.includes._errors')
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label"> {{ __('dashboard/table.name') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="John Doe" name="name"
                                    value="{{ old('name', $user->name) }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.email') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="you@example.com" name="email"
                                    value="{{ old('email', $user->email) }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.password') }}</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Leave blank to keep current password" name="password">
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.confirm_password') }}</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Repeat the new password" name="password_confirmation">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">{{ __('dashboard/table.status') }}</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-success">
                                    <input class="form-check-input" type="checkbox" id="customCheckSuccess"
                                        @checked(old('status', $user->status) == App\Models\User::STATUS_ACTIVE) name="status"
                                        value="{{ App\Models\User::STATUS_ACTIVE }}">
                                    <label class="form-check-label" for="customCheckSuccess">{{ __('dashboard/table.active') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="demo-inline-spacing ">

                            <button type="submit" class="btn btn-success mr-1">
                                <i class="ti ti-device-floppy"></i>
                                {{ __('dashboard/table.update') }}
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-label-danger">
                                <i class="ti ti-ban"></i>
                                {{ __('dashboard/table.cancel') }}
                            </a>

                        </div>
                    </form>
                </div>
            </div> {{-- end of card --}}
        </div>{{-- end of col --}}
    </div>{{-- end of row --}}
@endsection
