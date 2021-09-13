@extends('layouts.app')

@section('content')

    <div class="mb-4 d-flex justify-content-between container d-flex mb-2">
        <h3 class="hoge">
            {{ $user->name }}の本管理アプリ
        </h3>
        <a href="{{ route('create') }}" class="btn btn-info align-items-center justify-content-center">create new book</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">author</th>
                <th scope="col">title</th>
                <th scope="col">price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($user->books as $item)

                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->author }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <a href="{{ route('show', ['user' => $user->id, 'book' => $item->id]) }}">
                            <button class="btn btn-primary">詳細</button>
                        </a>
                        <form action="{{ route('destroy', $item->id) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>

                    </td>
            @endforeach
            </tr>


        </tbody>
    </table>



@endsection
