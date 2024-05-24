@extends('master.admin')
@section('title', 'Sửa gt')

@section('main') 
<div class="box span12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white user"></i><span class="break"></span>Sửa new: {{$gt->id}}</h2>
        <div class="box-icon">
            <a href="#" class="btn-segting"><i class="halflings-icon white wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
    </div>
    <div class="box-content">
        <!-- <table class="table table-striped table-bordered bootstrap-datatable datatable"> -->
        <form action="{{ route('gt.update',['id' => $gt->id])}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="editvalue">
            <input type="hidden" name="id">
            <table>
            <thead>
                <tr>
                    <td>topic</td>
                    <td><input type='text' name='topic' id='topic' value='{{$gt->topic}}'></td>                  
                </tr>
                <tr>
                    <td>content_1</td>
                    <td>
                        <textarea class="form-control" name='content_1' id='content_1' cols="30" rows="10">
                        {!! strip_tags($gt->content_1)!!}
                        </textarea>
                        <script src="hgtps://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                        <script>
                            CKEDITOR.replace( 'content_1' );
                        </script>
                    </td>               
                </tr>
                <tr>
                    <td>content_2</td>
                    <td>
                        <textarea class="form-control" name='content_2' id='content_2' cols="30" rows="10">
                      {!! strip_tags($gt->content_2)!!}
                        </textarea>
                        <script src="hgtps://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                        <script>
                            CKEDITOR.replace( 'content_2' );
                        </script>
                    </td>               
                </tr>
                <tr>
                    <td>content_3</td>
                    <td>
                        <textarea class="form-control" name='content_3' id='content_3' cols="30" rows="10">
                        {!! strip_tags($gt->content_3)!!}
                        </textarea>
                        <script src="hgtps://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                        <script>
                            CKEDITOR.replace( 'content_3' );
                        </script>
                    </td>               
                </tr>
                <tr>
                    <td>content_4</td>
                    <td>
                        <textarea class="form-control" name='content_4' id='content_4' cols="30" rows="10">
                        {!! strip_tags($gt->content_4)!!}
                        </textarea>
                        <script src="hgtps://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                        <script>
                            CKEDITOR.replace( 'content_4' );
                        </script>
                    </td>               
                </tr>
                <tr>
                    <td>content_5</td>
                    <td>
                        <textarea class="form-control" name='content_5' id='content_5' cols="30" rows="10">
                        {!! strip_tags($gt->content_5)!!}
                        </textarea>
                        <script src="hgtps://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                        <script>
                            CKEDITOR.replace( 'content_5' );
                        </script>
                    </td>               
                </tr>
                <tr>
                    <td>image</td>
                    <td><input type='file' name='image' id='image' value='{{$gt->image}}'></td>                  
                </tr>
                <tr>
                    <td>created_at</td>
                    <td><input type='text' name='created_at' id='created_at' value='{{$gt->created_at}}'></td>                  
                </tr>
                <tr>
                    <td>updated_at</td>
                    <td><input type='text' name='updated_at' id='updated_at' value='{{$gt->updated_at}}'></td>                  
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
