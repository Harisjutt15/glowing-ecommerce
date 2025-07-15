<script>
    // console.log('sweet alert script');

    // To open model for image  imageUrl
    function previewImage(imageName) {
        Swal.fire({
            imageUrl: imageName,
            imageHeight: 400,
            imageWidth: 600,
            imageAlt: "image"
        });
        // console.log("eye clicked",id);
    }

    function deleteMedia(id) {
        console.log('del ',id);
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
                    url:"{{ route('admin.category.deleteImage',['id'=>':id']) }}".replace(':id',id),
                    method:"GET",
              
                    success:function(response){
                        if(response.success){
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            });

                        }
                    },
                    error:function(err){
                        console.log('Something went wront while deleting the data');
                        
                    }
                });

            }
        });

    }
</script>
