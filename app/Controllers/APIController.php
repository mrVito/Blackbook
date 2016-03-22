<?php namespace App\Controllers;

use App;
use Query;
use Response;

class APIController
{
    public function index()
    {
        $people = Query::selectFrom('people')->get();

        return Response::json(['data' => $people]);
    }

    public function hate($id)
    {
        $person = Query::selectFrom('people')->where('id', $id)->get();

        if(count($person) == 0) {
            App::abort(404);
        }

        $hates = $person[0]['hates'] + 1;

        Query::updateOn('people', ['hates' => $hates])->where('id', $id)->get();

        return Response::json([
            'success' => 'Resource updated',
            'data' => ['id' => $id]
        ]);
    }

    public function unhate($id)
    {
        $person = Query::selectFrom('people')->where('id', $id)->get();

        if(count($person) == 0) {
            App::abort(404);
        }

        Query::updateOn('people', ['hates' => '0'])->where('id', $id)->get();

        return Response::json([
            'success' => 'Resource updated',
            'data' => ['id' => $id]
        ]);
    }
}