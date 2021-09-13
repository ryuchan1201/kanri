<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        return view('book.index', ['user' => $user]);
    }

    public function create()
    {

        $user = Auth::user();

        return view('book.create', ['user' => $user]);
    }

    public function store(Request $request){
        // $request->validate([
        //     'title' => 'required|max:255',
        //     'author' => 'required|max:255',
        //     'price' => 'required|max:255',
        //     'memo' => 'required|max:255',
        //     'purchased_date' => 'required|date',
        // ]);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'price' => $request->price,
            'memo' => $request->memo,
            'purchased_date' => $request->input('date'),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('index')->with('success', '登録しました');


    }

    public function show(User $user, Book $book)
    {
        if (Auth::user()->id !== $book->user_id) {

            return abort('404');
        } else {

            return view('book.show', ['book' => $book]);
        }
    }

    public function edit(Book $book)
    {

        if (Auth::user()->id !== $book->user_id) {

            return abort('404');
        } else {

            return view('book.edit', ['book' => $book]);
        }
    }

    public function update(Request $request, $id){

        // $request->validate([
        //     'title' => 'required|max:255',
        //     'author' => 'required|max:255',
        //     'price' => 'required|max:255',
        //     'purchased_date' => 'required|date',
        // ]);

        $book = Book::find($id);
        $book->update($request->all());

        return redirect()->route('show', ['book' => $book])->with('success', 'updateしました！');
    }

    public function destroy(Book $book){
        $book->delete();

        return redirect()->route('index')->with('success', '削除しました');
    }


}
