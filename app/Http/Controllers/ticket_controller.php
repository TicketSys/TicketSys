<?php

namespace App\Http\Controllers;

use App\TicketCategory;
use Illuminate\Http\Request;
use App\tickets;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ticket_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = tickets::all()->toArray();

        return view('index', compact('tickets'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $categories = TicketCategory::all();
        return view('tickets.new_ticket', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = new tickets([
            'title'             => $request->get('title'),
            'description'       => $request->get('description'),
            'picture'           => $request->get('picture'),
            'adress'            => $request->get('adress'),
            'category_id'       => $request->get('category_id'),
        ]);

        $ticket->save();
        return redirect('/tickets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
