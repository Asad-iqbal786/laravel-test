@extends('layouts.admin_app')

@section('main-content')


<div class="container-xxl flex-grow-1 container-p-y">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">File input</h5>
            <div class="card-body">
              <form class="forms-sample" method="post"
                @if (empty($productData['id'])) action="{{ url('/seller-add-edit-product') }}" @else
                        action="{{ url('/seller-add-edit-product', $productData['id']) }}" @endif  method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="defaultInput" class="form-label">Product name</label>
                  <input id="defaultInput" class="form-control" name="name"
                  @if (!empty($productData['name'])) value="{{ $productData['name'] }}" @else value="{{ old('name') }}" @endif
                  type="text" placeholder="Product name" />
                  @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>
                <div class="mb-3">
                  <label for="defaultInput" class="form-label"> Price</label>
                  <input id="defaultInput" class="form-control" name="price" type="number" placeholder="price"
                  @if (!empty($productData['price'])) value="{{ $productData['price'] }}" @else value="{{ old('price') }}" @endif
                  />
                  @if ($errors->has('price'))
                      <span class="text-danger">{{ $errors->first('price') }}</span>
                  @endif
                </div>
                <div class="mb-3">
                  <label for="defaultInput" class="form-label"> quantity</label>
                  <input id="defaultInput" class="form-control" name="quantity" type="number" placeholder="price"
                  @if (!empty($productData['quantity'])) value="{{ $productData['quantity'] }}" @else value="{{ old('quantity') }}" @endif
                  />
                  @if ($errors->has('quantity'))
                      <span class="text-danger">{{ $errors->first('quantity') }}</span>
                  @endif
                </div>
                <div class="mb-3">
                  <label for="defaultInput" class="form-label">Description</label>
                  <textarea id="defaultInput" class="form-control" name="description" type="text" placeholder="Default Description" >
                    @if (!empty($productData['description']))
                      {{ $productData['description'] }}
                    @endif
                  </textarea>
                  @if ($errors->has('description'))
                  <span class="text-danger">{{ $errors->first('description') }}</span>
              @endif
                </div>
                <div>
                  <label for="formFileDisabled" class="form-label"> Image </label>
                  <input class="form-control" type="file" name="image" id="formFileDisabled"  />
                  @if(!empty($productData['image']))
                  <img class="cat-img" src="{{asset('storage/admin/images/admin_photos/products/' . $productData['image'])}}" alt="" style="width: 110px; padding-top: 16px;padding-bottom: 16px;">
                      <input type="hidden" name="current_admin_image" id="current_admin_image" value="{{$productData['image']}}">
                      @endif
                </div>
                <div class="pt-4">
                  <button type="submit" class="btn btn-primary">
                        @if (!empty($productData['id']))
                          Update Product 
                        @else
                          Upload Product
                        @endif
                    </button>
                </div>
            </form>
            </div>
          </div>
    </div>
   
</div>
@endsection





@push('scripts')

@endpush
