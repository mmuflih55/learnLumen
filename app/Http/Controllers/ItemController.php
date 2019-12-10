<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getItem(Request $req){
        return (new Response($req->all(),201))->header('Content-Type','application/json');
    }

    public function getItems(Request $req){
        return (new Response($req->all(),201))->header('Content-Type','application/json');
    }

    public function updateItem(Request $req){
        return (new Response($req->all(),201))->header('Content-Type','application/json');
    }

    public function deleteItem(Request $req){
        return (new Response($req->all(),201))->header('Content-Type','application/json');
    }

    public function createItem(Request $req){
        return (new Response($req->all(),201))->header('Content-Type','application/json');
    }
}
