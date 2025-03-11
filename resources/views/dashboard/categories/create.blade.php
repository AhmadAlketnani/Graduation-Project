@extends('dashboard.layout.app')

@section('content')

    <nav aria-label="breadcrumb" class="p-3 mb-3 rounded-1 d-flex justify-content-between "
         style="background: #d3d3d3 !important;">
        <h2 style="margin: 0 !important;">categories</h2>
        <ol class="breadcrumb d-flex align-items-center" style="margin: 0 !important;">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="{{ route('categories.index') }}">categories</a></li>
            <li class="breadcrumb-item active">New category</li>

        </ol>
    </nav>

    <div class="tile mb-4">
        <div class="row">


            <form method="post" action="{{ route('categories.store') }}">
                @csrf
                @method('post')
                @include('dashboard.includes._errors')
                <div class="form-group mb-3">

                        <label class="form-label" >Name</label>
                        <input class="form-control"  type="text"  placeholder="category Name" value="{{ old('name') }}" name="name">
                </div>
                <div class="form-group">
                    <button class="btn btn-success"  type="submit"  ><i class="bi bi-plus-square"></i> Add</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-danger"><i class="bi bi-ban"></i> Cancel
                    </a>
                </div>

            </form>

        </div>{{-- end of row --}}
    </div>{{-- end of tile--}}

@endsection
