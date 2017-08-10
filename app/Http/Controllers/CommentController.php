<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\tickets;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ticket_id)
    {
        $ticket = tickets::find($ticket_id);
        $comments = Comment::where('ticket_id', $ticket_id)->paginate(5);
        return view('Admin.Comments.home', ['ticket' => $ticket, 'comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($ticket_id)
    {
        $ticket = tickets::find($ticket_id);
        return view('Admin.Comments.add',['ticket' => $ticket]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'comment' => 'required'
        ]);
        $comment = new Comment;
        $comment -> ticket_id = $request -> ticket_id;
        $comment -> comment = $request -> comment;
        $comment -> picture ='';
        $comment -> save();
        return redirect('/home/'. $request -> ticket_id .'/comments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($ticket = null, Comment $comment)
    {
        $ticket = tickets::find($ticket);
        return view('Admin.Comments.edit', ['ticket' => $ticket, 'comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update($ticket = null, Request $request, Comment $comment)
    {   
        $this->validate($request, [
        'comment' => 'required'
        ]);
        $comment -> comment = $request -> comment;;
        $comment->save();
        return redirect('/home/'.$ticket.'/comments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($ticket = null, Comment $comment)
    {
        $comment -> delete();
        return back();
    }
}
