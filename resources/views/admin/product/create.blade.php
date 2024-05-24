@extends('master.admin')
@section('title', 'product')
<!-- @push('ckeditor')
    <script src="/ckeditor/ckeditor.js"></script>
@endpush -->
@section('main')
<div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm</h6>
    </div>
    <div class="card-body">
    <form action="{{ route('product.store')}}" method="post">
            @csrf
            <input type="hidden" name="editvalue">
            <input type="hidden" name="ProID">
        </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">CatID</label>
                <input class="form-control form-control-lg mb-3" type="text" name="CatID">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">Metatitle</label>
                <input class="form-control form-control-lg mb-3" type="text" name="Metatitle">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">ProName</label>
                <input class="form-control form-control-lg mb-3" type="text" name="ProName">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">ProDescription</label>
                <textarea class="form-control form-control-lg mb-3" name="ProDescription" id="ProDescription"></textarea>
            </div>
            <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('ProDescription');
            </script>

            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">ProColor</label>
                <input class="form-control form-control-lg mb-3" type="text" name="ProColor">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">Materials</label>
                <input class="form-control form-control-lg mb-3" type="text" name="Materials">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">Size</label>
                <input class="form-control form-control-lg mb-3" type="text" name="Size">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">ProImage</label>
                <input class="form-control form-control-lg mb-3" type="file" name="ProImage">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">Tags</label>
                <input class="form-control form-control-lg mb-3" type="text" name="Tags">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">MoreImage</label>
                <input class="form-control form-control-lg mb-3" type="file" name="MoreImage">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">CreateBy</label>
                <input class="form-control form-control-lg mb-3" type="text" name="CreateBy">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">MetaDescriptions</label>
                <textarea class="form-control form-control-lg mb-3" name="MetaDescriptions" id="MetaDescriptions"></textarea>
            </div>
            <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('MetaDescriptions');
            </script>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">Displayhome</label>
                <input class="form-control form-control-lg mb-3" type="text" name="Displayhome">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">Status</label>
                <input class="form-control form-control-lg mb-3" type="text" name="Status">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">inventory</label>
                <input class="form-control form-control-lg mb-3" type="text" name="inventory">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">price</label>
                <input class="form-control form-control-lg mb-3" type="text" name="price">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">sold</label>
                <input class="form-control form-control-lg mb-3" type="text" name="sold">
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
      </form>
    </div>
  </div>

@endsection
<!-- @push('ckeditor_footer')
    <script>
        CKEDITOR.replace('Mota')
    </script>
@endpush -->