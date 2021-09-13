@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">author</th>
                <th scope="col">title</th>
                <th scope="col">price</th>
                <th scope="col">purchased_date</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>{{ $book->author }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->price }}</td>
                <td>{{ $book->purchased_date }}</td>
                <td>
                    <a href=" {{ route('edit', ['book' => $book, 'user' => Auth::user()->id]) }}">
                        <button class="btn btn-info">編集</button>
                    </a>
                </td>

            </tr>
        </tbody>
    </table>

    <p class="m-2">メモ:{{ $book->memo }}</p>
    
@endsection
