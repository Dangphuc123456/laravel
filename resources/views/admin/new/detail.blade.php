@extends('master.admin')
@section('title', 'ctnv')
@section('main')

 <div class="box ttan12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white user"></i><ttan class="break"></ttan>Chi tiết tin tức : {{$id}}</h2>
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
                    <td>id:</td>      
                    <td>{{$id}}</td>            
                </tr>
                <tr>
                    <td>title:</td>      
                    <td>{{$title}}</td>            
                </tr>
                <tr>
                    <td>author:</td>      
                    <td>{{$author}}</td>            
                </tr>
                <tr>
                <td>content_1:</td>
                <td><p><?php echo strip_tags($tt->content_1); ?></p></td>
                </tr>
                <tr>
                    <td>content_2:</td>
                    <td><p><?php echo strip_tags($tt->content_2); ?></p></td>
                </tr>
                <tr>
                    <td>content_3:</td>
                    <td><p><?php echo strip_tags($tt->content_3); ?></p></td>
                </tr>
                <tr>
                    <td>content_4:</td>
                    <td><p><?php echo strip_tags($tt->content_4); ?></p></td>
                </tr>
                <tr>
                    <td>content_5:</td>
                    <td><p><?php echo strip_tags($tt->content_5); ?></p></td>
                </tr>

                <tr>
                    <td>image_1:</td>      
                    <td><img src="/anh/{{$image_1}}" alt="" style="width:200px;"></td>            
                </tr>
                <tr>
                    <td>image_2:</td>      
                    <td><img src="/anh/{{$image_2}}" alt="" style="width:200px;"></td>            
                </tr>
                <tr>
                    <td>image_3:</td>      
                    <td><img src="/anh/{{$image_3}}" alt="" style="width:200px;"></td>            
                </tr>
                <tr>
                    <td>image_4:</td>      
                    <td><img src="/anh/{{$image_4}}" alt="" style="width:200px;"></td>            
                </tr>
                <tr>
                    <td>image_5:</td>      
                    <td><img src="/anh/{{$image_5}}" alt="" style="width:200px;"></td>            
                </tr>
                <tr>
                    <td>created_at:</td>      
                    <td>{{$created_at}}</td>            
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