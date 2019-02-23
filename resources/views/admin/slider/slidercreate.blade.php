@extends('admin.adminlayouts')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slider</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add New Slider
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="Post" action="{{ url('/slider') }}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control">
                                        <p class="help-block">Enter Slider Title...</p>
                                    </div>

                                    <div class="form-group">
                                        <label>Upload Image</label>
                                        <input type="file" name="image" class="form-control-file">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>

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
