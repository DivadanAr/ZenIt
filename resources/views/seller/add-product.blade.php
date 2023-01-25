@extends('layout/app')

@section('css')
{{-- <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}"> --}}
<link rel="stylesheet" href="{{ asset('assets/css/add-product.css')}}">
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('content')

<div class="konten">

    <h1>Add New Product</h1>
    <form action="{{ route('seller.product.store') }}" method="POST">
        @csrf
    <div class="containerr">
    
        <div class="left-row">
            <div class="product-name">
                <p>Product Name</p>
                <input type="text" name="name" placeholder="Fill with your product name">
                <p>Maximum name for your product name contain 20 letter *</p>
            </div>
            <div class="type">
                <p>Type</p>
                <select name="type" id="">
                    <option value="" selected>Choose Your Product Type</option>
                    @foreach($category as $cate)
                    <option value="{{ $cate->name }}">{{ $cate->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="tags">
                <p>Related Tags</p>
                <div class="related-tags">
                    @foreach($tags as $tag)
                    <div>
                        <label class="lbl-inp" for="tags" id="labeltag{{ $loop->iteration }}">
                            <button onclick="checked('tags{{ $loop->iteration }}', 'labeltag{{ $loop->iteration }}', this)" class="name" type="button">{{ $tag->name }}</button>
                            <input type="checkbox" id="tags{{ $loop->iteration }}" class="tagsbtn">
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="desc">
               <p>Description</p>
                <textarea name="desc" id="" cols="62" rows="3" placeholder="Fill with your product description"></textarea>
                <p>*Maximum letter for your description 100 letters, and your description has a minimum 20 letters for
                    description</p>
            </div>
        </div>
    
        <div class="right">
            <div class="product-images">
                <p>Product Images</p>
                    <div class="image needsclick dropzone" id="gallery-dropzone"></div>
            </div>
            <div class="second-row">
                <div class="stock">
                  <p>Stock</p>
                   <input type="number" name="quantity" placeholder="Fill with your product quantity">
                </div>
                <div class="price">
                  <p>Price</p>
                    <input type="number" name="price" placeholder="Fill with your product price">
                </div>
            </div>
            <div class="major">
                <p>Product Major</p>
                <select name="major" id="">
                    <option value="PPLG" {{ auth()->user()->shop->major == 'PPLG' ? 'selected' : '' }}>PPLG</option>
                    <option value="ANIMASI" {{ auth()->user()->shop->major == 'ANIMASI' ? 'selected' : '' }}>ANIMASI</option>
                    <option value="BRF" {{ auth()->user()->shop->major == 'BRF' ? 'selected' : '' }}>BRF</option>
                    <option value="TJKT" {{ auth()->user()->shop->major == 'TJKT' ? 'selected' : '' }}>TJKT</option>
                    <option value="TE" {{ auth()->user()->shop->major == 'TE' ? 'selected' : '' }}>TE</option>
                </select>
            </div>
            <div class="btns">
                <button>
                    <a href="{{ url('seller/products') }}">Cancle</a>
                    </button>
                    <button class="upload" type="submit">Add Product</button>
            </div>
        </div>
    </div>
    </form>
    
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    
    <script>
            var uploadedGalleryMap = {}
                Dropzone.options.galleryDropzone = {
                        url: "{{ url('product/image') }}",
                             maxFilesize: 5, // MB
                             maxFiles: 4,
                             acceptedFiles: '.jpeg,.jpg,.png,.gif',
                             addRemoveLinks: true,
                             headers: {
                               'X-CSRF-TOKEN': "{{ csrf_token() }}"
                             },
                             success: function (file, response) {
                               $('form').append('<input type="hidden" name="gallery[]" value="' + response.name + '">')
                               uploadedGalleryMap[file.name] = response.name
                             },
                             removedfile: function (file) {
                               file.previewElement.remove()
                               var name = ''
                               if (typeof file.file_name !== 'undefined') {
                                 name = file.file_name
                               } else {
                                 name = uploadedGalleryMap[file.name]
                               }
                               $('form').find('input[name="gallery[]"][value="' + name + '"]').remove()
                             },
                             init: function () {
                         @if(isset($product) && $product->gallery)
                               var files =
                                 {!! json_encode($profile->gallery) !!}
                                   for (var i in files) {
                                   var file = files[i]
                                   this.options.addedfile.call(this, file)
                                   this.options.thumbnail.call(this, file, file.original_url)
                                   file.previewElement.classList.add('dz-complete')
                                   $('form').append('<input type="hidden" name="gallery[]" value="' + file.file_name + '">')
                                 }
                         @endif
                             },
                              error: function (file, response) {
                                  if ($.type(response) === 'string') {
                                      var message = response //dropzone sends it's own error messages in string
                                  } else {
                                      var message = response.errors.file
                                  }
                                  file.previewElement.classList.add('dz-error')
                                  _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                                  _results = []
                                  for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                                      node = _ref[_i]
                                      _results.push(node.textContent = message)
                                  }
                                  return _results
                              }
                         }
    </script>

    <script>
        function checked(id, id2, btnl){
            document.getElementById(id).setAttribute('checked', 'true')
            document.getElementById(id2).style.backgroundColor = '#233874'
            btnl.style.color = 'white'

            let new1 = `uncheck('${id}', '${id2}', this)` 

            btnl.setAttribute('onclick', new1)
        }

        function uncheck(id, id2, btnl){
            document.getElementById(id).removeAttribute('checked')
            document.getElementById(id2).style.backgroundColor = 'white'
            btnl.style.color = 'black'

            let new1 = `checked('${id}', '${id2}', this)` 

            btnl.setAttribute('onclick', new1)
        }   
    </script>
    @endsection

</div>    
