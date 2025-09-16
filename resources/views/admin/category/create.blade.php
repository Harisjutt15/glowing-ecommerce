@extends('admin.masterLayout.master')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="dashboard-page-content">

        <div class="row mb-9 align-items-center">
            <div class="col-xxl-9">
                <div class="row">
                    <div class="col-sm-6 mb-8 mb-sm-0">
                        <h2 class="fs-4 mb-0"> @isset($category) Update @else Add New @endisset Category  </h2>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xxl-9">
                <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{ $category?->id ?? '' }}" hidden>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card mb-8 rounded-4">
                            <div class="card-body p-7">
                                    <div class="mb-8">
                                        <label for="" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">
                                            Title</label>
                                        <input type="text" placeholder="Enter Title of Category" name="title" class="form-control" id="" value="{{ old('title',$category?->title?? '') }} ">
                                    </div>
                                    <div class="mb-8">
                                        <label for="" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">
                                            Show on home</label>
                                            <select name="show_on_home" class="form-select" id="">
                                                <option  value="0" {{ old('show_on_home',$category->show_on_home ?? '') == false ? 'selected' : '' }}>False</option>
                                                <option value="1" {{ old('show_on_home',$category->show_on_home ?? '')== true ? 'selected' : '' }}>True</option>
                                            </select>
                                    </div>
                                    <div class="mb-8">
                                        <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Full description</label>
                                        <textarea placeholder="Type here" class="form-control" rows="4" name="description" value="{{ old('description') }} ">{{ $category?->description ?? '' }}</textarea>
                                    </div>

                                    <div class="col-sm-6 d-flex flex-wrap justify-content-sm-end">
                                        <button type="submit" class="btn btn-primary">@isset($category) Update @else Create
                                        @endisset</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mb-8 rounded-4">
                            <div class="card-header p-7 bg-transparent">
                                <h4 class="fs-18px mb-0 font-weight-500">Media</h4>
                            </div>
                            <div class="row justify-content-center">
                                @forelse($category?->images ?? [] as $image)
                               @include('admin.components.image-card',[
                                'id'=>$image,
                               ])
                               @include('admin.components.image-card-script')
                                @empty
                                    
                                @endforelse
                              </div>
                            <div class="card-body p-7">
                                <div class="input-upload">
                                    <input class="form-control" type="file" name="images[]" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
@include('admin.category.script')
@endsection


