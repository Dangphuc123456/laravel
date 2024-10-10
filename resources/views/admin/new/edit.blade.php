@extends('master.admin')
@section('title', 'Sửa nv')

@section('main') 
<div class="box span12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white user"></i><span class="break"></span>Sửa new: {{$tt->id}}</h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
    </div>
    <div class="box-content">
        <!-- <table class="table table-striped table-bordered bootstrap-datatable datatable"> -->
        <form action="{{ route('tt.update',['id' => $tt->id])}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="editvalue">
            <input type="hidden" name="id">
            <table>
            <thead>
                <tr>
                    <td>title</td>
                    <td><input type='text' name='title' id='title' value='{{$tt->title}}'></td>                  
                </tr>
                <tr>
                    <td>author</td>
                    <td><input type='text' name='author' id='author' value='{{$tt->author}}'></td>                  
                </tr>
                <tr>
                    <td>content_1</td>
                    <td>
                        <textarea class="form-control" name='content_1' id='content_1' cols="30" rows="10">
                        {!!$tt->content_1!!}
                        </textarea>
                       <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

                        <script>
                            CKEDITOR.replace( 'content_1' );
                        </script>
                    </td>               
                </tr>
                <tr>
                    <td>content_2</td>
                    <td>
                        <textarea class="form-control" name='content_2' id='content_2' cols="30" rows="10">
                        {!!$tt->content_2!!}
                        </textarea>
                       <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

                        <script>
                            CKEDITOR.replace( 'content_2' );
                        </script>
                    </td>               
                </tr>
                <tr>
                    <td>content_3</td>
                    <td>
                        <textarea class="form-control" name='content_3' id='content_3' cols="30" rows="10">
                        <p>{!! strip_tags($tt->content_3)!!}</p>
                        </textarea>
                       <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

                        <script>
                            CKEDITOR.replace( 'content_3' );
                        </script>
                    </td>               
                </tr>
                <tr>
                    <td>content_4</td>
                    <td>
                        <textarea class="form-control" name='content_4' id='content_4' cols="30" rows="10">
                        {!! strip_tags($tt->content_4 )!!}
                        </textarea>
                       <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

                        <script>
                            CKEDITOR.replace( 'content_4' );
                        </script>
                    </td>               
                </tr>
                <tr>
                    <td>content_5</td>
                    <td>
                        <textarea class="form-control" name='content_5' id='content_5' cols="30" rows="10">
                        {!! strip_tags($tt->content_5)!!}
                        </textarea>
                       <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

                        <script>
                            CKEDITOR.replace( 'content_5' );
                        </script>
                    </td>               
                </tr>
                <tr>
                    <td>content_6</td>
                    <td>
                        <textarea class="form-control" name='content_6' id='content_6' cols="30" rows="10">
                        {!! strip_tags($tt->content_6)!!}
                        </textarea>
                       <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

                        <script>
                            CKEDITOR.replace( 'content_6' );
                        </script>
                    </td>               
                </tr>
                <tr>
                    <td>content_7</td>
                    <td>
                        <textarea class="form-control" name='content_7' id='content_7' cols="30" rows="10">
                        {!! strip_tags($tt->content_7)!!}
                        </textarea>
                       <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

                        <script>
                            CKEDITOR.replace( 'content_7' );
                        </script>
                    </td>               
                </tr>
                <tr>
                    <td>content_8</td>
                    <td>
                        <textarea class="form-control" name='content_8' id='content_8' cols="30" rows="10">
                        {!! strip_tags($tt->content_8)!!}
                        </textarea>
                       <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

                        <script>
                            CKEDITOR.replace( 'content_8' );
                        </script>
                    </td>               
                </tr>
                <tr>
                    <td>content_9</td>
                    <td>
                        <textarea class="form-control" name='content_9' id='content_9' cols="30" rows="10">
                        {!! strip_tags($tt->content_9)!!}
                        </textarea>
                       <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

                        <script>
                            CKEDITOR.replace( 'content_9' );
                        </script>
                    </td>               
                </tr>
                <tr>
                    <td>image_1</td>
                    <td><input type='file' name='image_1' id='image_1' value='{{$tt->image_1}}'></td>                  
                </tr>
                <tr>
                    <td>image_2</td>
                    <td><input type='file' name='image_2' id='image_2' value='{{$tt->image_2}}'></td>                  
                </tr>
                <tr>
                    <td>image_3</td>
                    <td><input type='file' name='image_3' id='image_3' value='{{$tt->image_3}}'></td>                  
                </tr>
                <tr>
                    <td>image_4</td>
                    <td><input type='file' name='image_4' id='image_4' value='{{$tt->image_4}}'></td>                  
                </tr>
                <tr>
                    <td>image_5</td>
                    <td><input type='file' name='image_5' id='image_5' value='{{$tt->image_5}}'></td>                  
                </tr>
                <tr>
                    <td>created_at</td>
                    <td><input type='text' name='created_at' id='created_at' value='{{$tt->created_at}}'></td>                  
                </tr>
                <tr>
                    <td>updated_at</td>
                    <td><input type='text' name='updated_at' id='updated_at' value='{{$tt->updated_at}}'></td>                  
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
