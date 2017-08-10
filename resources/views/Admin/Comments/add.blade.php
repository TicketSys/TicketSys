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
            <!-- Comment Section -->
            <div class="panel panel-default">
                <div class="panel-heading">Comments</div>
                <div class="panel-body">
                    <div class="comment thumbnail">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <form action="/home/{{$ticket -> id}}/comments/" method="POST" role="form">
                                {{ csrf_field() }}
                                <legend>Comment</legend>
                            
                                <div class="form-group">
                                    <label for="">Add Comment</label>
                                    <input type="hidden" name="ticket_id" value="{{$ticket -> id}}">
                                    <textarea class="form-control" name="comment"></textarea>
                                </div>
                                <!-- Error Messages -->
                                @if ($errors->any())
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        @foreach ($errors->all() as $error)
                                        <div class="alert alert-warning alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <span class="glyphicon glyphicon-exclamation-sign"></span> {{ $error }}
                                        </div>
                                    @endforeach 
                                    </div>
                                </div>
                                @endif
                                <!-- End Error Messages -->
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center;">
            <a href="/home" class="btn btn-default glyphicon glyphicon-home"></a>
            <a href="/home/{{$ticket -> id}}/comments/" class="btn btn-default glyphicon glyphicon-comment"></a>
        </div>
    </div>
</div>
@endsection