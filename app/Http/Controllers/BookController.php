<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
  public function index()
  {
    $books = new Book;
    return $books;
  }
  public function store(Request $request)
  {
    $validatedData = $request->validate([
        'title' => 'required|string|max:50',
        'category' => 'required',
        'file_name' => 'required',
        'body' => 'required|string|max:120',
      ]);

    $books = new Book;
    $books->title = $request->title;
    $books->category = $request->category;
    $books->file_name = $request->file_name;
    $books->body = $request->body;
    $books->save();
    return $books;
  }
}
