@extends('layouts.app')

@section('content')



    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('store') }}" method="post" class="col-offset-2">
            @csrf

            <div class="form-group">
                <label for="author"> author </label>
                <input type="text" name="author" class=" form-control" id="" value="" placeholder="">
            </div>
            <div class="form-group">
                <label for="title"> title </label>
                <input type="text" name="title" class="form-control" id="" value="title" placeholder="">
            </div>
            <div class="form-group">
                <label for="author"> price </label>
                <input type="text" name="price" class="form-control" id="" value="price" placeholder="">
            </div>

            <div class="form-group">
                <label for="memo"> memo </label>
                <input type="text" name="memo" class="form-control" id="" value="memo" placeholder="">
            </div>

            <div class="form-group">
                <label for="purchased_date">purchased_date</label>
                <input type="date" class="form-control" value="purchased_date" id="" placeholder="">
            </div>

            <button type="submit" class="btn btn-success">
                登録
            </button>
        </form>
    </div>
@endsection
