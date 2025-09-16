<script>
    function create() {
        window.location.href = ("{{ route('admin.category.create') }}");
    }
    $(document).ready(function() {





        $(document).on('click', '.showOnHome', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            let check = ($(this).is(':checked') ? 'Enable' : 'Disable') + " To Show on Home";
            // console.log(check);
            Swal.fire({
                title: check,
                icon: 'question',
                text: 'Are You Sure ?',
                showCancelButton: true,
                cancelButtonText: 'Deny',
                confirmButtonText: 'Proceed',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-outline-success waves-effect waves-float waves-light me-1',
                    cancelButton: 'btn btn-outline-danger waves-effect waves-float waves-light me-1'
                }
            }).then(async (result) => {
                if (result.isConfirmed) {
                    let data = {
                        id: id,
                        bdm_check: $(this).is(':checked'),
                    };
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.category.show-on-home') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        },
                        data: {
                            id: id,
                            bdm_check: $(this).is(':checked'),
                        },
                        success: function(response) {
                            if (response.success) {
                                console.log('success');

                                window.LaravelDataTables['category-table'].ajax
                                    .reload(null,
                                        false);

                            }
                        },
                        error: function(err) {
                            // console.log(err.message);

                            console.log('Something went Wrong');
                        }
                    });



                }
            });

        });

        $(document).on('click',
            '.delete-category',
            function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {

                    if (result.isConfirmed) {
                        $.ajax({
                            type: "GET",
                            url: "{{ route('admin.category.delete', ':id') }}".replace(
                                ':id', id),
                            success: function(response) {


                                if (response.success == true) {
                                    window.LaravelDataTables['category-table'].ajax
                                        .reload(null,
                                            false);
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your Data has been deleted.",
                                        icon: "success"
                                    });

                                }
                            },
                            error: function(err) {
                                Swal.fire({
                                    title: "Opps..!",
                                    text: "Something went wrong.",
                                    icon: "danger"
                                });

                            },

                        });

                    }
                });





            });



    });

    function categoryModel(id = null, field = 'all', size = 'large') {
        // console.log('geet clicked', id);
        $.ajax({
            url: "{{ route('admin.category.editCatModel', ':id') }}".replace(':id', id),
            type: "GET",
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}'
            },
            success: function(res) {
                if (res.success) {
                    $("#categoryTitle").val(res.data.title);
                    // $("$catShowOnHome").val(res.data.show_on_home);
                    var val = res.data.show_on_home ? '1' : '0';
                    // console.log(res.data.show_on_home ,val);

                    $('#catShowOnHome').val(val);
                    $('#catDescription').val(res.data.description);
                    $('#categoryID').val(res.data.id)

                    $("#quickViewModal").modal('show');
                    console.log(res.message);
                    console.log(res.data);



                }
            },
            error: function(err) {
                console.log('Some thing went wrong');

            }

        });

    }

    $("#category-model-form").on('submit', function(e) {
        e.preventDefault();
        $("#category-submit-btn").prop('disabled', true);
        console.log('form submit');
        let data = $(this).serialize();
        console.log(data);
        let url = "{{ route('admin.category.model-store') }}";
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(res) {
                $("#quickViewModal").modal('hide');
                $('#category-model-form')[0].reset();
                console.log('success');
                window.LaravelDataTables['category-table'].ajax.reload(null, false);

            },
            error: function(xhr) {
                console.log('this', xhr);
                $("#category-submit-btn").prop('disabled', false);
                   $('.text-danger').remove();
                if (xhr.status === 422 && xhr.responseJSON.errors) {
                    let errors = xhr.responseJSON.errors;

                    $.each(errors, function(field, messages) {
                        let input = $(`[name="${field}"]`);
                        input.closest('.form-check, .form-group, .form-input-wrapper').find(
                            '.text-danger').remove();


                        input.after(
                            `<small class="text-danger d-block mt-1">${messages[0]}</small>`
                        );

                    });
                }

            }
        });

    })
</script>
