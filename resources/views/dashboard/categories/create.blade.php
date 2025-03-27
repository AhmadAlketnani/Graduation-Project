@extends('dashboard.layout.app')

@section('content')



    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Basic with Icons</h5>
                    <small class="text-body-secondary float-end">Merged input group</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        @include('dashboard.includes._errors')
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="icon-base bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="John Doe" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2" name="name">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Image</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="Period" class="input-group-text"><i
                                            class="icon-base bx bx-file"></i></span>
                                    <input type="file" id="Period" class="form-control phone-mask" name="image">
                                </div>
                            </div>
                        </div>


                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-label-success"><i class="bx bx-plus"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> {{-- end of card --}}
        </div>{{-- end of col --}}
    </div>{{-- end of row --}}
@endsection



