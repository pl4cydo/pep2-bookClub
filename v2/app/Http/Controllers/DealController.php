<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Deal;
use App\Models\User;
use Illuminate\Http\Request;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Deal::All();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        //
        return User::All();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd(
        //     $request->idBook,
        //     $request->idUser,
        //     $request->text,
        //     $request->dealBookId            
        // );

        $deal = Deal::create([
            'book_id' => $request->idBook, 
            'user_id' => $request->idUser,
            'text' => $request->text,
            'deal_book_id' => $request->dealBookId,            
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function show(Deal $deal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function edit(Deal $deal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $deal = Deal::find($id);
        $book = Book::find($deal->book_id);
        $book2 = Book::find($deal->deal_book_id);
        $deal->update([
            'finish' => true
        ]);
        $book->update([
            'deal' => true
        ]);
        $book2->update([
            'deal' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // dd($id);
        $wish = Deal::find($id);
        $wish->delete();
    }
}
