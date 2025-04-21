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
                    <form method="post" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        @include('dashboard.includes._errors')
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">Categoy Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="John Doe" name="name"
                                    value="{{ old('name') }}">
                            </div>
                        </div>
                <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Categoy Images</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="icon-base ti ti-file"></i></span>
                            <input type="file" class="form-control" name="image" multiple>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-label-success"><i class="ti ti-plus mr-2"></i> Save</button>
                    </div>
                    <div class="col-sm-10">
                        <a  href="{{ route('admin.categories.index') }}" class="btn btn-label-denger"><i class="ti ti-bin"></i> Cancel</a>
                    </div>
                </div>
                </form>
            </div>
        </div> {{-- end of card --}}
    </div>{{-- end of col --}}
    </div>{{-- end of row --}}
@endsection
