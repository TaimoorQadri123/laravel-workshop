 
 @extends('layout.admin')


@section('content')
 
 <form action="/categorystore" method="post" enctype="multipart/form-data">
        @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Product Name">
            </div>

            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror


              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Product Desc</label>
                <input type="text" name="desc" class="form-control" id="exampleFormControlInput1" placeholder="Product Desc">
            </div>

            @error('desc')
                <span class="text-danger">{{$message}}</span>
            @enderror



            
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Product Price</label>
                <input type="number" name="price" class="form-control" id="exampleFormControlInput1" placeholder="Product Price">
            </div>

            @error('price')
                <span class="text-danger">{{$message}}</span>
            @enderror



            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Product Quantity</label>
                <input type="number" name="price" class="form-control" id="exampleFormControlInput1" placeholder="Product Quantity">
            </div>

            @error('qty')
                <span class="text-danger">{{$message}}</span>
            @enderror



            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Product Categry</label>
                
                <select name="category_id" id="" class="form-control">
                    <option value="" disabled selected>Select Category</option>

                    @foreach ($category as $categories)
                        <option value="{{$categories->id}}">{{$categories->cat_name}}</option>
                    @endforeach
                </select>
            </div>

            @error('qty')
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

    @endsection