<script>
    console.log('file is oke');
    $(document).on('click', '.producyShoeOnHome', function(e) {
        e.preventDefault();
        let checkId = $(this).data('id');
        let shoeOnHome = $(this).is(':checked');
        let title = ($(this).is(':checked') ? 'Enable' : 'Disable') + " To Show on Home";
        // console.log('clicked', checkId,shoeOnHome);
        Swal.fire({
            title: title,
            // text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('admin.product.show-on-home') }}",
                    type: "POST",

                    data: {
                        id: checkId,
                        is_checked: shoeOnHome,
                    },
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        if (res.success) {
                            window.LaravelDataTables['product-table'].ajax.reload(null,
                                false);
                            // console.log(res.message);
                            Swal.fire({
                                title: "Success!",
                                text: res.message,
                                icon: "success"
                            });
                        }

                    },
                    error: function(err) {
                        console.log(err.message);

                    }
                });


            }
        });

    })

    $(document).on('click', '.deleteProduct', function(e) {
        e.preventDefault();
        const ProId = $(this).data('id');
        console.log('clicked', ProId);
        Swal.fire({
            title: 'Are You Sure',
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!"
        }).then((result) => {
            if (result.isConfirmed) {
               let turl= "{{ route('admin.product.delete',['id'=> ':id']) }}".replace(':id',ProId);
               console.log(turl);
               
                $.ajax({
                    type: "GET",
                    url:turl,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        if (res.success) {
                            window.LaravelDataTables['product-table'].ajax.reload(null,
                                false);
                            // console.log(res.message);
                            Swal.fire({
                                title: "Success!",
                                text: res.message,
                                icon: "success"
                            });
                        }

                    },
                    error: function(err) {
                        console.log(err.message);

                    }
                });


            }
        });

    })

    
</script>