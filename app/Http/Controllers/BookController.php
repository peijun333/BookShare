<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;

class BookController extends Controller
{

  public function index()
  {
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
        'title' => 'required|string|max:50',
        'category' => 'required',
        'file_name' => 'image',
        'body' => 'required|string|max:120',
      ]);

    $books = new Book;
    $books->author_id = $request->author_id;
    $books->title = $request->title;
    $books->category = $request->category;

    //SQLでfile_name消しとくか対策する
    $books->file_name = 'hoge';
    $books->body = $request->body;
    $books->save();
    return $books;
  }
  public function update()
  {
  }

  public function destroy()
  {
  }
}
