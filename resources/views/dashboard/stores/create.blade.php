@extends('dashboard.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Basic with Icons</h5>
                    <small class="text-body-secondary float-end">Merged input group</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.stores.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        @include('dashboard.includes._errors')
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.name') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="John Doe" name="name"
                                    value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.email') }}</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" placeholder="200.00" name="email"
                                    value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.phone') }}</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" placeholder="30" name="phone"
                                    value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.location') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="6" name="location"
                                    value="{{ old('location') }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.facebook') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="6" name="facebook"
                                    value="{{ old('facebook') }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.instagram') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="6" name="instagram"
                                    value="{{ old('instagram') }}">
                            </div>
                        </div>
                        <div class=" row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.user') }}</label>
                            <div class="col-sm-10">
                                <select name="user_id" class="form-select">
                                    <option value="">{{ __('dashboard/table.choose user') }}</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="demo-inline-spacing ">

                            <button type="submit" class="btn btn-success mr-1">
                                <i class="ti ti-device-floppy"></i>
                                {{ __('dashboard/table.save') }}
                            </button>
                            <a href="{{ route('admin.stores.index') }}" class="btn btn-label-danger">
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
