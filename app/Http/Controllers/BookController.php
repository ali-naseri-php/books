<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use App\Models\Sale;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function addKala(Book $book){
        $user=auth()->user();
        $sale= new Sale();
        $sale->book=$book->id;
        $sale->user=$user->id;
        $sale->status=0;
        $sale->save();
        return redirect()->back();
    }
    public function viewAdd()
    {
        return view('book-add');

    }

    public function store(StoreBookRequest $request)
    {
        $file_name = time() . "." . $request->image->extension();
        $book = new Book;
        $book->name = $request->name;
        $book->price = $request->price;
        $book->name_author = $request->name_author;
        $book->image = $file_name;
        $book->save();
        $request->image->move(public_path('images'), $file_name);
        return redirect('/');


    }

    public function adminAll()
    {
        $data = Book::all();
        return view('all-book', ['data' => $data]);

    }

    public function delete(Book $book)
    {
        $book->delete();
        return redirect()->back();



    }
}
