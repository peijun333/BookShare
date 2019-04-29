<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        'file_name' => 'image',
        'body' => 'required|string|max:120',
      ]);

    $books = new Book;

    logger(Auth::user());

    if(Auth::check()){
      logger('ログインしています');
    } else {
      logger('ログインしていません');
    }
    //author_idは変更する
    $books->author_id = 1;
    $books->title = $request->title;
    $books->category = $request->category;

    //SQLでfile_name消しとくか対策する
    $books->file_name = 'hoge';
    $books->body = $request->body;
    $books->save();
    return $books;
  }
}
