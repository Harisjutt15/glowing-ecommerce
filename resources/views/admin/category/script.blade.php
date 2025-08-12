<script>
    function create() {
        window.location.href = ("{{ route('admin.category.create') }}");
    }
    $(document).ready(function() {

//         $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });




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

        // function deleteCategory(id) {
        // }

    });
</script>
