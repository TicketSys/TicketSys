@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-11 col-md-11 col-lg-11">
                            <strong>ID:{{$ticket -> id}} - </strong>
                            <span>{{$ticket -> title}}</span>
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-1">
                            <span class="btn btn-default glyphicon glyphicon-resize-full" aria-hidden="true" onclick="$( this ).parent().parent().parent().next().toggleClass('hidden'); $( this ).toggleClass('glyphicon-resize-full');$( this ).toggleClass('glyphicon-resize-small')"></span>
                        </div>
                    </div>
                </div>
                <div class="panel-body hidden">
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <img style="width: 100%; height: auto;" src="{{$ticket -> picture}}" alt="Image" class="thumbnail">
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            {{$ticket -> description}}
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <span class="glyphicon glyphicon-folder-open"> </span> <strong>{{$ticket -> category -> category}}</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <span class="glyphicon glyphicon-flag"> </span><strong>{{$ticket -> status-> status}}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Comments Section -->
            <div class="panel panel-default">
                <div class="panel-heading">Comments</div>
                <div class="panel-body">
                    @foreach ($comments as $comment)
                    <div class="comment thumbnail">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <img style="width: 100%; height: auto;" src="{{$comment -> picture}}" alt="Image" class="thumbnail">
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                {{$comment -> comment}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4 col-sm-offset-8 col-md-offset-8 col-lg-offset-8 text-right">
                                <form action="/home/{{$ticket -> id}}/comments/{{$comment -> id}}" method="POST" class="form-inline" role="form">
                                <a href="/home/{{$ticket -> id}}/comments/{{$comment -> id}}/edit" class="btn btn-default glyphicon glyphicon-edit"></a>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-default glyphicon glyphicon-trash"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <a href="/home/{{$ticket -> id}}/comments/create" class="btn btn-default glyphicon glyphicon-plus"></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                            <?php echo $comments -> render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center;">
            <a href="/home" class="btn btn-default glyphicon glyphicon-home"></a>
        </div>
    </div>
</div>
@endsection