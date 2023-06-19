<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Message::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // dd('aaa');
        return Inertia::render('Messages/Message');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function donate()
    {
        //
        // dd('aaa');
        return Inertia::render('Donate/Donate');
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
        $validatedData = $request->validate([
            'textMessage' => 'required',
            'email' => 'required',
            'imageMessage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('imageMessage')) {
            $image = $request->file('imageMessage');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
        }

        $comment = Message::create([
            'textMessage' => $request->textMessage,
            'email' => $request->email,
            'imageMessage' => $imageName,
            'user_id' => auth()->id()
        ]);

        return redirect(route('profile.edit'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        // dd($id); 
        $message = Message::findOrFail($id);

        $message->update([
            'notification' => !($message->notification)
        ]);

        return back();
        // return redirect('message/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
