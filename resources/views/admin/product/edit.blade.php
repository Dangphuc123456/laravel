@extends('master.admin')
@section('title', 'Sửa sản phẩm')

@section('main') 
<div class="box span12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white user"></i><span class="break"></span>Sửa sản phẩm: {{$product->ProID}}</h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
    </div>
    <div class="box-content">
        <!-- <table class="table table-striped table-bordered bootstrap-datatable datatable"> -->
        <form action="{{ route('product.update',['ProID' => $product->ProID])}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="editvalue">
            <input type="hidden" name="ProID">
            <table>
            <thead>
                <tr>
                    <td>CatID</td>
                    <td><input type='text' name='CatID' id='CatID' value='{{$product->CatID}}'></td>                  
                </tr>
                <tr>
                    <td>Metatitle</td>
                    <td><input type='text' name='Metatitle' id='Metatitle' value='{{$product->Metatitle}}'></td>                  
                </tr>
                <tr>
                    <td>ProName</td>
                    <td><input type='text' name='ProName' id='ProName' value='{{$product->ProName}}'></td>                  
                </tr>
                
                <tr>
                    <td>ProImage</td>
                    <td><input type='file' name='ProImage' id='ProImage' value='{{$product->ProImage}}'></td>                  
                </tr>
                <tr>
                    <td>Tags</td>
                    <td><input type='text' name='Tags' id='Tags' value='{{$product->Tags}}'></td>                  
                </tr>
                <tr>
                    <td>MoreImage</td>
                    <td><input type='file' name='MoreImage' id='MoreImage' value='{{$product->MoreImage}}'></td>                  
                </tr>
                <tr>
                    <td>CreateBy</td>
                    <td><input type='text' name='CreateBy' id='CreateBy' value='{{$product->CreateBy}}'></td>                  
                </tr>
                   
                <tr>
                    <td>Displayhome</td>
                    <td><input type='text' name='Displayhome' id='Displayhome' value='{{$product->Displayhome}}'></td>                  
                </tr>
                <tr>
                    <td>Status</td>
                    <td><input type='text' name='Status' id='Status' value='{{$product->Status}}'></td>                  
                </tr>
                <tr>
                    <td>inventory</td>
                    <td><input type='text' name='inventory' id='inventory' value='{{$product->inventory}}'></td>                  
                </tr>
                <tr>
                    <td>price</td>
                    <td><input type='text' name='price' id='price' value='{{$product->price}}'></td>                  
                </tr>
                <tr>
                    <td>sold</td>
                    <td><input type='text' name='sold' id='sold' value='{{$product->sold}}'></td>                  
                </tr>
                <tr>
                    <td>Discount</td>
                    <td><input type='text' name='Discount' id='Discount' value='{{$product->Discount}}'></td>                  
                </tr>
                <tr>
                    <td>quantity</td>
                    <td><input type='text' name='quantity' id='quantity' value='{{$product->quantity}}'></td>                  
                </tr>
                <tr>
                    <td>ProDescription</td>
                    <td>
                        <textarea class="form-control" name='ProDescription' id='ProDescription' cols="30" rows="10">
                            {{$product->ProDescription}}
                        </textarea>
                        <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                        <script>
                            CKEDITOR.replace( 'ProDescription' );
                        </script>
                    </td>                  
                </tr>
                <tr>
                    <td>MetaDescriptions</td>
                    <td>
                        <textarea class="form-control" name='MetaDescriptions' id='MetaDescriptions' cols="30" rows="10">
                            {{$product->MetaDescriptions}}
                        </textarea>
                        <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                        <script>
                            CKEDITOR.replace( 'MetaDescriptions' );
                        </script>
                    </td>                  
                </tr>  
            <thead>
            </table>
            <div class="form-actions">
            <button type="submit" class="btn btn-primary" name="cmd">Save</button>                          
            <button type="reset" class="btn">Cancel</button>
		</div>
        </form>
    </div>
</div>
@endsection
