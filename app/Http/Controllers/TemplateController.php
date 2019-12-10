<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Template;

class TemplateController extends Controller
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

    public function getTemplate(Request $req){
        return (new Response($req->all(),201))->header('Content-Type','application/json');
    }

    public function getTemplates(Request $req){
        return (new Response($req->all(),201))->header('Content-Type','application/json');
    }

    public function updateTemplate(Request $req){
        return (new Response($req->all(),201))->header('Content-Type','application/json');
    }

    public function deleteTemplate(Request $req){
        return (new Response($req->all(),201))->header('Content-Type','application/json');
    }

    public function createTemplate(Request $req){
        return (new Response($req->all(),201))->header('Content-Type','application/json');
    }
    //
}
