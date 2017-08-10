@extends('master')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="container">
        <form method="post" action="{{url('/tickets')}}">
            <div class="form-group row">
                {{csrf_field()}}

                <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Category</label>
                <label for="lgFormGroupInput" class="com-sm-2 col-form-label col-form-label-lg">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="title" name="title">
                </div>
            </div>
            <div class="form-group row">
                <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Description</label>
                <div class="col-sm-10">
                    <select name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Description</label>
                <div class="col-sm-10">
                    <textarea name="description" cols="80" rows="8"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Adress</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="adress">
                </div>
            </div>
            <div class="form-group row">
                <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Picture</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="picture">
                </div>
            </div>
            <div class="form-group row">
                <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Category</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="category_id">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2"></div>
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection