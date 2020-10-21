<?php

namespace App\Http\Controllers;

use App\Http\Requests\DrugSearchRequest;
use App\Services\DrugSearcher;

class SiteController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * @param  DrugSearchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function search(DrugSearchRequest $request, DrugSearcher $searcher)
    {
        $drugs = $searcher->search($request->substanceIds);

        return view('search', compact('drugs'));
    }
}
