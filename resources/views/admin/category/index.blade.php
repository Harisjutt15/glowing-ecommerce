@extends('admin.masterLayout.master')
@section('style')
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- FixedHeader CSS -->
    <link href="https://cdn.datatables.net/fixedheader/3.2.2/css/fixedHeader.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
@endsection
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
    <div class="dashboard-page-content card">

        <div class="row mb-9 align-items-center">
            <div class="col-xxl-9">
                <div class="row">
                    <div class="col-sm-6 mb-8 mb-sm-0">
                        {{-- <h2 class="fs-4 mb-0"> Category Data Table</h2> --}}
                    </div>

                </div>
            </div>
        </div>

     
        
        <div class="row">
            <table id="developers-table" class="table table-bordered">
                {{-- {!! $dataTable->table(['class' => 'table table-bordered']) !!} --}}
                {!! $dataTable->table() !!}
            </table>
        </div>
    </div>





    <div class="modal fade" id="quickViewModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0 py-5">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0">
                    <form action="javascript:void(0)" id="category-model-form">
                         <input type="hidden"  name="id" class="form-control"
                                    id="categoryID" value=" ">
                        <div class="row ">
                            <h3>Edit Category</h3>
                            <div class="col-lg-6"> <label for="" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">
                                    Title</label>
                                <input type="text" placeholder="Enter Title of Category" name="title" class="form-control"
                                    id="categoryTitle" value=" ">
                            </div>
                            <div class="col-lg-6"> <label for="" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">
                                    <label for="" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">
                                        Show on home</label>
                                    <select name="show_on_home" id="catShowOnHome" class="form-select" id="">
                                        <option value="0">False</option>
                                        <option value="1">True</option>
                                    </select>
                            </div>
                            <div class="col-lg-7">
                                <label class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Full description</label>
                                <textarea placeholder="Type here" class="form-control" rows="4" id="catDescription" name="description"
                                    value=""></textarea>
                            </div>
                              <div class="col-lg-6 mt-3">
                               <button class="btn btn-primary" type="submit" id="category-submit-btn">Update</button>
                              </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

@section('script')
    {{-- DataTables JS (Version 1.11.5) --}}
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- Responsive, Buttons, FixedHeader JS -->
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.2/js/dataTables.fixedHeader.min.js"></script>

    <!-- Required for Export Buttons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <!-- DataTable initialization -->
    {!! $dataTable->scripts() !!}
    @include('admin.category.script')

    <script></script>
@endsection
