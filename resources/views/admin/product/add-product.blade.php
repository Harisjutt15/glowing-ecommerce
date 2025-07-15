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
                        <h2 class="fs-4 mb-0"> @isset($product)
                                Update
                            @else
                                Add New
                            @endisset Product</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xxl-9">
                <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{ $product?->id ?? '' }}" hidden>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card mb-8 rounded-4">
                                <div class="card-body p-7">
                                    <div class="mb-8">
                                        <label for="product_title" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">
                                            Title</label>
                                        <input type="text" placeholder="Title of Product" name="title"
                                            class="form-control" value="{{ old('title', $product?->title ?? '') }}"
                                            id="product_title">
                                    </div>
                                    <div class="mb-8">
                                        <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase"> Short Description</label>
                                        <textarea placeholder="Type here" class="form-control" rows="4" name="short_description">{{ old('short_description', $product?->short_description ?? '') }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-8">
                                                <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase"
                                                    for="promotional-price">Quantity</label>
                                                <input placeholder="In-Stoke" type="numeric" class="form-control"
                                                    id="" name="quantity"
                                                    value="{{ old('quantity', $product?->quantity ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-8">
                                                <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase"
                                                    for="regular-price">Regular price</label>
                                                <input placeholder="Rs" type="numeric" class="form-control" id=""
                                                    name="price" value="{{ old('price', $product?->price ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-8">
                                                <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase"
                                                    for="promotional-price">Promotional price</label>
                                                <input placeholder="Rs" type="numeric" class="form-control" id=""
                                                    name="discount_price"
                                                    value="{{ old('discount_price', $product?->discount_price ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Show on Home</label>
                                            <select class="form-select" id="currency" name="show_on_home">
                                                <option value="FALSE"
                                                    {{ old('show_on_home', $product?->show_on_home ?? '') == false ? 'selected' : '' }}>
                                                    No</option>
                                                <option value="TRUE"
                                                    {{ old('show_on_home', $product?->show_on_home ?? '') == true ? 'selected' : '' }}>
                                                    True</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase" for="currency">New
                                                Arrival</label>
                                            <select class="form-select" name="new_arrival">
                                                <option value="FALSE"
                                                    {{ old('new_arrival', $product?->new_arrival ?? '') == false ? 'selected' : '' }}>
                                                    No</option>
                                                <option value="TRUE"
                                                    {{ old('new_arrival', $product?->new_arrival ?? '') == true ? 'selected' : '' }}>
                                                    True</option>
                                            </select>
                                        </div>


                                    </div>
                                    <div class="mb-8 ">
                                        <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase" for="tax-rate">Belong to
                                            Categories</label>
                                        <select class="form-select select2" name="categories[]" multiple>
                                            @php
                                                $selectedCategories =isset($product) ? $product->categories->pluck('id')->toArray() : [];
                                            @endphp
                                            @forelse ($category as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ in_array($item->id, $selectedCategories) ? ' selected' : ''  }}>{{ $item->title }}
                                                </option>
                                            @empty
                                            @endforelse

                                            {{-- @forelse ($category as $item)
                                                <option value="{{ $item->id }}"
                                                    @foreach ($product->categories as $cat)
                                                @if ($cat->id == $item->id) selected @endif @endforeach>
                                                    {{ $item->title }}</option>
                                            @empty
                                            @endforelse --}}


                                        </select>
                                    </div>

                                    <div class="col-sm-6 d-flex flex-wrap justify-content-sm-end">
                                        <button type="submit" class="btn btn-primary">
                                            @isset($product)
                                                Update
                                            @else
                                                Create
                                            @endisset
                                        </button>
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
                                    @forelse ($product->images ?? [] as $image)
                                        @include('admin.components.image-card', [
                                            'id' => $image,
                                        ])
                                        @include('admin.components.image-card-script')

                                    @empty
                                        {{-- <p class="text-center">No Media Exist</p> --}}
                                    @endforelse

                                </div>
                                <div class="card-body p-7">
                                    <div class="input-upload">
                                        <input class="form-control" type="file" name="product_images[]" multiple>
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
