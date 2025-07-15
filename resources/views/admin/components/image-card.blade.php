 {{-- <div class=""> --}}
 {{-- <img src="{{ asset('images/'.$image->image) }}" height="100px" width="80px" alt="" title=""> --}}
 <div class="col-10 card my-2">
     <div class="card-body">
         <p class="card-title">{{ $image->image_name }}</p>
         <div> <span>({{ $image->image_size ?? '-' }})</span>
             <span>({{ $image->created_at->diffForHumans() ?? '-' }})</span>
         </div>
         {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
         <a href="javascript:void(0);" onclick="previewImage('{{ asset('images/' . $image->image_name) }}')" class="m-1"
          data-bs-toggle='tooltip' data-bs-placement='top'
          data-bs-custom-class='tooltip-primary' title='
          Preview File'><i class="bi bi-eye"></i></a>
         <a href="{{ route('admin.category.download',['id'=>$image->id]) }}" class="mx-5"  data-bs-toggle='tooltip' data-bs-placement='top'
         data-bs-custom-class='tooltip-primary' title='Download File'><i class="bi bi-download"></i></a>
         <a href="javascript:void(0);" onclick="(deleteMedia('{{ $image->id }}'))" class="m-1"
             data-bs-toggle="tooltip" data-placement="top" title="Delete File"><i class="bi bi-trash"></i></a>

     </div>
 </div>
 {{-- </div>  --}}

 {{-- data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-primary" data-bs-title="Preview Agreements" --}}
