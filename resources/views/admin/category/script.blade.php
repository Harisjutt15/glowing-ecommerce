<script>
    function create() {
        // console.log('script');
        window.location.href = ("{{ route('admin.category.create') }}");
    }

    function deleteCategory(id) {
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
                    url: "{{ route('admin.category.delete', ':id') }}".replace(':id', id),
                    success: function(response) {


                        if (response.success == true) {
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

    }
</script>
