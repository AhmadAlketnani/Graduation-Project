@extends('dashboard.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Store</h5>
                    <small class="text-body-secondary float-end">Update store details</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.stores.update', $store->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('dashboard.includes._errors')
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.name') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="John Doe" name="name"
                                    value="{{ old('name', $store->name) }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.email') }}</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" placeholder="example@example.com" name="email"
                                    value="{{ old('email', $store->email) }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.phone') }}</label>
                            <div class="col-sm-10">
                                @php
                                $cleanPhone = str_replace('+970 ', '', old('phone', $store->phone));
                                @endphp

                                <input type="number" class="form-control" placeholder="123456789" name="phone"
                                    value="{{ $cleanPhone }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.location') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Location" name="location"
                                    value="{{ old('location', $store->location) }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.facebook') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Facebook URL" name="facebook"
                                    value="{{ old('facebook', $store->facebook) }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.instagram') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Instagram URL" name="instagram"
                                    value="{{ old('instagram', $store->instagram) }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.user') }}</label>
                            <div class="col-sm-10">
                                <select name="user_id" class="form-select">
                                    <option value="">{{ __('dashboard/table.user') }}</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('user_id', $store->user_id) == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="demo-inline-spacing">

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
