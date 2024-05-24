@extends('master.admin')
@section('topic', 'ctnv')
@section('main')

 <div class="box gtan12">
    <div class="box-header" data-original-topic>
        <h2><i class="halflings-icon white user"></i><gtan class="break"></gtan>Chi tiết tin tức : {{$id}}</h2>
        <div class="box-icon">
            <a href="#" class="btn-segting"><i class="halflings-icon white wrench"></i></a>
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
                    <td>topic:</td>      
                    <td>{{$topic}}</td>            
                </tr>
                <tr>
                <td>content_1:</td>
                <td><p><?php echo strip_tags($gt->content_1); ?></p></td>
                </tr>
                <tr>
                    <td>content_2:</td>
                    <td><p><?php echo strip_tags($gt->content_2); ?></p></td>
                </tr>
                <tr>
                    <td>content_3:</td>
                    <td><p><?php echo strip_tags($gt->content_3); ?></p></td>
                </tr>
                <tr>
                    <td>content_4:</td>
                    <td><p><?php echo strip_tags($gt->content_4); ?></p></td>
                </tr>
                <tr>
                    <td>content_5:</td>
                    <td><p><?php echo strip_tags($gt->content_5); ?></p></td>
                </tr>
                <tr>
                    <td>image:</td>      
                    <td><img src="/anh/{{$image}}" alt="" style="width:200px;"></td>            
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