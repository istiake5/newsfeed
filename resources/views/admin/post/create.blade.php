@extends('admin.adminlayouts')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add New Post</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add New Post
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="Post" action="{{ url('/post') }}" enctype="multipart/form-data">
                                    {{csrf_field()}}


                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control">
                                        <p class="help-block">Enter Category Name...</p>
                                    </div>



                                    <div class="form-group">
                                         <label>Selects</label>
                             <select   name="cat_id" id="select" class="form-control">
                                <option value="">Please select</option>
                                @foreach($cat as $category)
                                    <option value="{{ $category->id }}" @if(old('cat_id') == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                                    <div class="form-group">
                                        <label>Upload Image</label>
                                        <input type="file" name="image" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea class="form-control" name="contentt" rows="3"></textarea>
                                    </div>


                                    <div class="form-group">
                                        <label>Tag</label>
                                        <input type="text" name="tag" class="form-control">
                                        <p class="help-block">Enter Category Name...</p>
                                    </div>

                                    <div class="form-group">
                                        <label>Post Type</label>
                                        <select   name="status" id="select" class="form-control">
                                            <option value="">Please select</option>
                                            @foreach($posts as $post)
                                                <option value="{{ $post->status }}" @if(old('status') == $post->status) selected @endif>{{ $post->status }}</option>
                                            @endforeach
                                        </select>
                                    </div>




                                    <div class="form-group">
                                        <label>Author</label>

                                        <input type="hidden" name="author"  value="{{ Auth::user()->name}}"  class="form-control">

                                        <input type="text" name="name" value="{{ Auth::user()->name}}"  class="form-control" />


                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>

                                </form>
                            </div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->

                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('admin/vendor/metisMenu/metisMenu.min.js') }}"></script>


    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('admin/dist/js/sb-admin-2.js') }}"></script>

    </body>

    </html>
@endsection
