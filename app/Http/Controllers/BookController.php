<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Book;

class BookController extends Controller
{

  public function index()
  {
    $posted = DB::table('books')
    ->join('users', 'books.author_id', '=', 'users.id')
    ->select('books.id', 'users.name', 'books.title', 'books.category', 'books.file_name')
    ->get();
    return $posted;
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
        'title' => 'required|string|max:50',
        'category' => 'required',
        'image_file' => 'image',
        'body' => 'required|string|max:120',
      ]);

    //バリデートする
    $filePath = $request->image_file->store('public/cavers'); 

    $books = new Book;
    $books->author_id = $request->author_id;
    $books->title = $request->title;
    $books->category = $request->category;

    $books->file_name = basename($filePath);
    $books->body = $request->body;
    $books->save();
  }
  public function update()
  {
  }

  public function destroy()
  {
  }

  public function entry($id)
  {
    $entry = DB::table('books')
    ->join('users', 'books.author_id', '=', 'users.id')
    ->select('users.name', 'books.title', 'books.category', 'books.body', 'books.file_name')
    ->where('books.id', '=', $id)
    ->get();
    return $entry;
  }
}
