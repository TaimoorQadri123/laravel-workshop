@extends('layout.admin')


@section('content')
    

 @if(Session::has('success'))
                    <p class="text-success">{{Session::get("success")}}</p>
              @endif


    <form action="/category/store" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$edit->id}}">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                <input type="text" value="{{$edit->cat_name}}"  name="cat_name" class="form-control" id="exampleFormControlInput1" placeholder="Category Name">
            </div>

            @error('catgory_name')
                <span class="text-danger">{{$message}}</span>
            @enderror


            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Category Image</label>
                <input type="file"  value="{{$edit->cat_image}}" name="cat_image" class="form-control" id="exampleFormControlInput1" placeholder="Category File">
                <img width="100px" height="100px" src="{{asset('uploads/'.$edit->cat_image)}}" alt="">
            </div>

            @error('cat_image')
                <span class="text-danger">{{$message}}</span>
            @enderror

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      
    </div>
    </form>


@endsection