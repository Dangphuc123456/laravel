@extends('master.admin')
@section('title', 'Category Manager')
@section('main')

<div class="box span12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white user"></i><span class="break"></span></h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
    </div>
    <div class="box-content">
        <!-- <table class="table table-striped table-bordered bootstrap-datatable datatable"> -->
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <input type="hidden" name="editvalue">
                    <input type="hidden" name="CatID">
                    <table>
                    <thead>
                        
                        <tr>
                            <td>CatName</td>
                            <td><input type="text" name="CatName" id="CatName"></td>                  
                        </tr>
                        <tr>
                            <td>MetaTitle</td>
                            <td><input type="text" name="MetaTitle" id="MetaTitle" ></td>                  
                        </tr>
                        <tr>
                            <td>Stuffs</td>
                            <td><input type="text" name="Stuffs" id="Stuffs" ></td>                  
                        </tr>
                        <tr>
                            <td>RooID</td>
                            <td><input type="text" name="RooID" id="RooID" ></td>                  
                        </tr>
                        <tr>
                            <td>DisplayOrder</td>
                            <td><input type="text" name="DisplayOrder" id="DisplayOrder" ></td>                  
                        </tr>
                        <tr>
                            <td>CreateBy</td>
                            <td><input type="text" name="CreateBy" id="CreateBy" ></td>                  
                        </tr>
                        <tr>
                            <td>ModifiedDate</td>
                            <td><input type="text" name="ModifiedDate" id="ModifiedDate" ></td>                  
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td><input type="text" name="Status" id="Status" ></td>                  
                        </tr>
                        <tr>
                            <td>ShowMenu</td>
                            <td><input type="text" name="ShowMenu" id="ShowMenu" ></td>                  
                        </tr> 
                        <tr>
                        <td>MetaDescriptions</td>
                                    <td><textarea class="form-control" name='MetaDescriptions' id='MetaDescriptions' cols="30" rows="10">
                                    <?=$row["MetaDescriptions"]??"";?>
                                    </textarea>
                                    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                                    <script>
                                    CKEDITOR.replace( 'MetaDescriptions' );
                                    </script>  
                    </tr>             
                    </thead> 
                </table> 
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary" name="cmd">Save</button>                          
                    <button type="reset" class="btn">Cancel</button>
                </div>
        </form>     
    </div>
</div>
@endsection