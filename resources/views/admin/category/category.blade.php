@extends('admin.masterLayout.master')
@section('content')
    <div class="dashboard-page-content">

        <div class="row mb-9 align-items-center justify-content-between">

            <div class="col-sm-6 mb-8 mb-sm-0">
                <h2 class="fs-4 mb-0">Categories</h2>
                {{-- <p class="mb-0">Lorem ipsum dolor sit amet.</p> --}}
            </div>

            <div class="col-sm-6 col-md-3 d-flex flex-wrap justify-content-sm-end">
                <input class="form-control border-primary w-100" type="text" placeholder="Search Categories">
            </div>
        </div>


        <div class="card mb-4 rounded-4 p-7">
            <div class="card-body p-0">
                <div class="row">
                    {{-- <div class="col-md-3">
                        <form>
                            <div class="mb-8">
                                <label for="product_name" class="mb-5 fs-13px ls-1 fw-semibold text-uppercase">Name</label>
                                <input type="text" placeholder="Type here" class="form-control" id="product_name">
                            </div>
                            <div class="mb-8">
                                <label for="product_slug" class="mb-5 fs-13px ls-1 fw-semibold text-uppercase">Slug</label>
                                <input type="text" placeholder="Type here" class="form-control" id="product_slug">
                            </div>
                            <div class="mb-8">
                                <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase">Parent</label>
                                <select class="form-select">
                                    <option>Fruit</option>
                                    <option>Snack</option>
                                </select>
                            </div>
                            <div class="mb-8">
                                <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase">Description</label>
                                <textarea placeholder="Type here" class="form-control"></textarea>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary">Create category</button>
                            </div>
                        </form>
                    </div> --}}
                    <div class="col ">
                        <div class="card-body px-0 pt-7 pb-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle table-nowrap mb-0 table-borderless">
                                    <thead class="table-light">
                                        <tr>

                                            <th scope="col" class="text-center">
                                                <div class="form-check align-middle">
                                                    <input class="form-check-input rounded-0 ms-0" type="checkbox"
                                                        id="transactionCheck01">
                                                    <label class="form-check-label" for="transactionCheck01"></label>
                                                </div>
                                            </th>
                                            {{-- <th class="align-middle" scope="col">ID --}}
                                            </th>
                                            <th class="align-middle" scope="col">Title
                                            </th>
                                            <th class="align-middle" scope="col">Slug
                                            </th>
                                            <th class="align-middle" scope="col">Description
                                            </th>
                                            <th class="align-middle" scope="col">Show on Home
                                            </th>
                                            <th class="align-middle text-center" scope="col">
                                                Actions
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody class="">

                                        @forelse($categories as $category)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input rounded-0 ms-0" type="checkbox"
                                                        id="transactionCheck-0">
                                                    <label class="form-check-label" for="transactionCheck-0"></label>
                                                </div>
                                            </td>
                                            {{-- <td><a href="#">#1</a></td> --}}

                                            <td class="text-body-emphasis">{{ $category->title ?? '-' }}</td>


                                            <td class="text-body-emphasis">{{ $category->slug }}</td>

                                            <td class="text-body-emphasis">{{ $category->description }}</td>

                                            <td>@if($category->show_on_home ==true) True @else NO @endif</td>

                                            <td class="text-center">
                                                <div class="d-flex flex-nowrap justify-content-center">
                                                    <div class="dropdown no-caret">
                                                        <a href="#" data-bs-toggle="dropdown"
                                                            class="dropdown-toggle btn btn-outline-primary btn-xs hover-white btn-hover-bg-primary py-4 px-5">
                                                            <i class="far fa-ellipsis-h"></i> </a>
                                                        <div class="dropdown-menu dropdown-menu-end m-0">
                                                            <a class="dropdown-item" href="{{ route('admin.category.edit',['id'=>$category->id]) }}">Edit</a>
                                                            <a class="dropdown-item text-danger" href="{{ route('admin.category.delete',['id'=>$category->id]) }}">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <p>No result to show</p>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
