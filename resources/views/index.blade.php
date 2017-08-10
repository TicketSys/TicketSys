@extends('master')
@section('content')
    <div class="container">
        <table class="table table-stripped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Post</th>
            </tr>
            </thead>
            <tbody>
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
