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

        <form action="{{ route('update', ['book' => $book, 'user' => Auth::user()->id]) }}" method="post" class="col-offset-2">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="author"> author </label>
                <input type="text" name="author" class=" form-control" id="" value="{{ $book->author }}" placeholder="">
            </div>
            <div class="form-group">
                <label for="title"> title </label>
                <input type="text" name="title" class="form-control" id="" value="{{ $book->title }}" placeholder="">
            </div>
            <div class="form-group">
                <label for="author"> price </label>
                <input type="text" name="price" class="form-control" id="" value="{{ $book->price }}" placeholder="">
            </div>

            <div class="form-group">
                <label for="purchased_date">purchased_date</label>
                <input type="date" name="purchsed_date" class="form-control" value="{{ $book->purchased_date }}" id="" placeholder="">
            </div>

            <div class="form-group">
                <label for="memo">memo</label>
                <input type="text" name="memo" class="form-control" value="{{ $book->memo }}" id="" placeholder="">
            </div>

            <button type="submit" class="btn btn-success">
                修正
            </button>
        </form>
    </div>
@endsection
