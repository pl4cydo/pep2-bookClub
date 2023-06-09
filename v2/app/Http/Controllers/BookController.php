<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::all();
        $categories = Category::all();
        return Inertia::render('Book/BookIndex', ['books' => $books, 'categories' => $categories]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listBooks()
    {
        return Book::all();
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function bookSearch($name) {
        $books = Book::where('title', $name)->get();
        return $books;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('Book/Create/Index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->title,
        //    $request->writter,
        //    $request->synopsis,
        //    $request->year,
        //    $request->category_id,
        //    $request->image,
        //    $request->selfComment
        // );

        $validatedData = $request->validate([
            'title' => 'required',
            'writter' => 'required',
            'synopsis' => 'required',
            'year' => 'required',
            'category_id' => 'required',
            'selfComment' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // dd($validatedData);

        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
        }

        // dd($imageName);

        $book = Book::create([
            'title' => $request->title,
            'writter' => $request->writter, // Corrected parameter name
            'synopsis' => $request->synopsis,
            'year' => $request->year,
            'category_id' => $request->category_id,
            'image' => $imageName,
            'selfComment' => $request->selfComment,
            'user_id' => auth()->id()
        ]);

        // dd($book);

        return redirect(route('dashboard'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bookView($id) 
    {
        // dd($id);
        $user = User::All();
        $categories = Category::All();
        // dd($user);
        $comments = Comment::All();
        $books = Book::where('id', $id)->get();
        return Inertia::render('Book/Components/BookView', ['books' => $books, 'comments' => $comments, 'userBook' => $user, 'categories' => $categories]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd( $request->title,
        //     $request->writter,
        //     $request->synopsis,
        //     $request->year,
        //     $request->category_id,
        //     $request->selfComment,
        //     $id
        // );

        //
        $validatedData = $request->validate([
            'title' => 'required',
            'writter' => 'required',
            'synopsis' => 'required',
            'year' => 'required',
            'category_id' => 'required',
            'selfComment' => 'required',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $book = Book::findOrFail($id);

        // $imageName = $book->image;

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time().'.'.$image->getClientOriginalExtension();
        //     $image->storeAs('public/images', $imageName);
        // }

        $book->update([
            'title' => $request->title,
            'writter' => $request->writter,
            'synopsis' => $request->synopsis,
            'year' => $request->year,
            'category_id' => $request->category_id,
            'selfComment' => $request->selfComment,
        ]);

        return $this->bookView($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Book::find($id)->delete();

        return redirect(route('profile.edit'));
    }
}
