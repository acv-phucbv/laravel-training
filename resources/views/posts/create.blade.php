@extends('layouts.app')
@section('title', 'Create New Post')
@section('content')
    <a href="/posts" class="btn btn-info">Back</a>
    <div class="col-lg-8 col-lg-offset-2">
        <center><h1>Create New Post</h1></center>
        <form class="form-horizontal" action="{{ route('posts.store') }}" method="post">
            {{ csrf_field() }}
            <fieldset>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Title">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <textarea class="form-control" rows="5" name="content" id="content" placeholder="Content"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <span>Choise the feature image</span>
                        <input data-preview="#preview" id="feature-image" name="feature-image" type="file" class="file-loading" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12 col-lg-offset-4">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </div>
            </fieldset>
        </form>
        <script>
            var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' +
                    'onclick="alert(\'Call your custom code here.\')">' +
                    '<i class="glyphicon glyphicon-tag"></i>' +
                    '</button>';
            $("#feature-image").fileinput({
                overwriteInitial: true,
                maxFileSize: 1500,
                showClose: false,
                showCaption: false,
                browseLabel: '',
                removeLabel: '',
                browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
                removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
                removeTitle: 'Cancel or reset changes',
                elErrorContainer: '#kv-avatar-errors-1',
                msgErrorClass: 'alert alert-block alert-danger',
                defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar" style="width:160px">',
                layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
                allowedFileExtensions: ["jpg", "png", "gif"]
            });
        </script>
        @include('posts.partials.errors')
    </div>
@endsection