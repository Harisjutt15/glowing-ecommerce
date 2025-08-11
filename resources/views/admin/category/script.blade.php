<script>
    function create() {
        window.location.href = ("{{ route('admin.category.create') }}");
    }
    $(document).ready(function() {

        $(document).on('click', '.showOnHome', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            console.log(id);

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
