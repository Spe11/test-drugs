<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DrugRequest;
use App\Http\Requests\ProductRequest;
use App\Models\db\Product;
use App\Models\Drug;
use App\Services\DrugService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DrugController extends Controller
{
    /** @var DrugService */
    private $service;

    public function __construct(DrugService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drugs = Drug::with(['substances'])->get();

        return view('drugs.index', compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drugs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DrugRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DrugRequest $request)
    {
        $this->service->add($request->name, $request->substanceIds);

        return redirect()->route('drugs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drug = Drug::with('substances')->where('id', $id)->first();

        if (null === $drug) {
            throw new NotFoundHttpException;
        }

        return view('drugs.view', compact('drug'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drug = Drug::findOrFail($id);

        return view('drugs.edit', compact('drug'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DrugRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DrugRequest $request, $id)
    {
        /** @var Drug */
        $drug = Drug::findOrFail($id);

        $this->service->update($drug, $request->name, $request->substanceIds);

        return redirect()->route('drugs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drug $drug)
    {
        $this->service->delete($drug);

        return redirect()->route('drugs.index');
    }
}
