@extends('master.admin')
@section('title', 'product detail')
@section('main')

 <div class="box span12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white user"></i><span class="break"></span>Chi tiết sản phẩm : {{$ProID}}</h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
    </div>
    <div class="box-content">
        <!-- <table class="table table-striped table-bordered bootstrap-datatable datatable"> -->
        <table>
            <thead>
                <tr>
                    <td>ProID:</td>      
                    <td>{{$ProID}}</td>            
                </tr>
                <tr>
                    <td>CatID:</td>      
                    <td>{{$CatID}}</td>            
                </tr>
                <tr>
                    <td>Metatitle:</td>      
                    <td>{{$Metatitle}}</td>            
                </tr>
                <tr>
                    <td>ProName:</td>      
                    <td>{{$ProName}}</td>            
                </tr>
                <tr>
                    <td>ProDescription:</td>      
                    <td><p><?php echo strip_tags($product->ProDescription); ?></p></td>            
                </tr>
                <tr>
                    <td>ProImage:</td>      
                    <td><img src="/anh/{{$ProImage}}" alt="" style="width:200px;"></td>            
                </tr>
                <tr>
                    <td>Tags:</td>      
                    <td>{{$Tags}}</td>            
                </tr>
                <tr>
                    <td>MoreImage:</td>      
                    <td><img src="/anh/{{$MoreImage}}" alt="" style="width:200px;"></td>            
                </tr>
                <tr>
                    <td>created_at:</td>      
                    <td>{{$created_at}}</td>            
                </tr>
                <tr>
                    <td>CreateBy:</td>      
                    <td>{{$CreateBy}}</td>            
                </tr>      
                <tr>
                    <td style="vertical-align: top;">MetaDescriptions:</td>      
                    <td style="vertical-align: top;">{!! $MetaDescriptions !!}</td>            
                </tr>
                <tr>
                    <td>Displayhome:</td>      
                    <td>{{$Displayhome}}</td>            
                </tr>
                <tr>
                    <td>Status:</td>      
                    <td>{{$Status}}</td>            
                </tr>     
                <tr>
                    <td>inventory:</td>      
                    <td>{{$inventory}}</td>            
                </tr>
                <tr>
                    <td>price:</td>      
                    <td>{{$price}}</td>            
                </tr>
                <tr>
                    <td>Discount:</td>      
                    <td>{{$Discount}}</td>            
                </tr>
                <tr>
                    <td>sold:</td>      
                    <td>{{$sold}}</td>            
                </tr>
                <tr>
                    <td>quantity:</td>      
                    <td>{{$quantity}}</td>            
                </tr>
                <tr>
                    <td>updated_at:</td>      
                    <td>{{$updated_at}}</td>            
                </tr>         
            </thead> 
        </table>            
    </div>
</div>
@endsection
