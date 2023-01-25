@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/setup-store.css')}}">
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

@endsection

@section('content')
<div class="content">
    <div class="breadcrumb d-flex">
      <div class="breadcrumb1 d-flex">
        <div class="bulet1"></div>
        <div class="text-bulet1">Information Store</div>
        <div class="garis1"></div>
        <div class="garis2"></div>
        <div class="garis3"></div>
        <div class="garis4"></div>
      </div>
      <div class="breadcrumb2 d-flex">
        <div class="bulet2"></div>
        <div class="text-bulet2">Personal Detail</div>
        <div class="garis1"></div>
        <div class="garis2"></div>
        <div class="garis3"></div>
        <div class="garis4"></div>
      </div>
      <div class="breadcrumb3 d-flex">
        <div class="bulet3"></div>
        <div class="text-bulet3">Complete</div>
      </div>
    </div>
    <div class="garis-batas"></div>
    <form action="{{ route('seller.setup.store') }}" method="POST">
      @csrf
      <div class="store-name">
        <h1 class="judul-store">Store Name</h1>
        <input type="text" class="input-name" id="store-name" name="name">
      </div>
      <div class="store-name">
        <h1 class="judul-store">Major</h1>
        <select name="major" id="major"  class="input-name" style="height: 50px;">
          <option value="" selected disabled >Choose Major</option>
          <option value="PPLG">PPLG</option>
          <option value="ANIMASI">ANIMASI</option>
          <option value="BRF">BRF</option>
          <option value="TEI">TEI</option>
          <option value="TJKT">TJKT</option>
        </select>
      </div>
      <div class="store-desc">
        <h1 class="judul-store">Description</h1>
        <textarea class="input-desc" id="store-desc" cols="30" rows="10" name="desc"></textarea>
      </div>
      <div class="col2">
        <div class="store-profile">
          <h1 class="judul-store">Store Profile</h1>
          <div class="needsclick dropzone" id="gallery-dropzone" required></div>
        </div>
      </div>  
        <button type="submit" class="submit-button">Next</button>
    </form>
  </div>
  <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

  <script>
    var uploadedGalleryMap = {}
        Dropzone.options.galleryDropzone = {
                url: "{{ url('profile/image') }}",
                     maxFilesize: 5, // MB
                     maxFiles: 1,
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
                 @if(isset($profile) && $profile->gallery)
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
@endsection