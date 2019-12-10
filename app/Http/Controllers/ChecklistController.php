<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Checklist;
class ChecklistController extends Controller
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
    
    public function getChecklist(Request $req){
        return (new Response($req->all(),201))->header('Content-Type','application/json');
    }

    public function getChecklists(Request $req){
        return (new Response($req->all(),201))->header('Content-Type','application/json');
    }

    public function updateChecklist(Request $req){
        return (new Response($req->all(),201))->header('Content-Type','application/json');
    }

    public function deleteChecklist(Request $req){
        return (new Response($req->all(),201))->header('Content-Type','application/json');
    }
    
    public function createChecklist(Request $req){
        // example req
        // "data": {
        //     "attributes": {
        //       "object_domain": "contact",
        //       "object_id": "1",
        //       "due": "2019-01-25T07:50:14+00:00",
        //       "urgency": 1,
        //       "description": "Need to verify this guy house.",
        //       "items": [
        //         "Visit his house",
        //         "Capture a photo",
        //         "Meet him on the house"
        //       ],
        //       "task_id": "123"
        //     }
        //   }
        // }
        $cl = new Checklist;
        $cl->object_domain = 'test';
        $cl->object_id = '1';
        $cl->due = '2019-01-25T07:50:14+00:00';
        $cl->description = 'test'; 
        $cl->updated_by = 'test';
        $cl->urgency=0;
        $rid = $cl->save();
        $resp["data"] = $req->all();
        $resp["rid"] = $rid;
        return (new Response($resp,201))->header('Content-Type','application/json');
    }

    //
}
