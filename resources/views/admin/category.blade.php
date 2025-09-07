@extends('layout.admin')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

              @if(Session::has('success'))
                    <p class="text-success">{{Session::get("success")}}</p>
              @endif


            <div class="card">
                <div class="card-title">
                    <a href="" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add Category</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($category as $categories)
                            <tr>
                                <td>{{$categories->cat_name}}</td>
                                <td>
                                    <img width="200px" height="200px" src="{{asset('uploads/'.$categories->cat_image)}}" alt="">
                                </td>
                                <td>
                                    <a href="/categorydelete/{{$categories->id}}" class="btn btn-danger">Delete</a>
                                    <a href="" class="btn btn-success">Update</a>
                                </td>
                        </tr>
                        @endforeach
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/categorystore" method="post" enctype="multipart/form-data">
        @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                <input type="text" name="cat_name" class="form-control" id="exampleFormControlInput1" placeholder="Category Name">
            </div>

            @error('catgory_name')
                <span class="text-danger">{{$message}}</span>
            @enderror


            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Category Image</label>
                <input type="file" name="cat_image" class="form-control" id="exampleFormControlInput1" placeholder="Category File">
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
  </div>
</div>

@endsection