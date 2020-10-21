<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubstanceRequest;
use App\Models\Substance;
use App\Services\SubstanceService;

class SubstanceController extends Controller
{
    /** @var SubstanceService */
    private $service;

    /**
     * @param ProductService $service
     */
    public function __construct(SubstanceService $service)
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
        $substances = Substance::get();

        return view('substances.index', compact('substances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('substances.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SubstanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubstanceRequest $request)
    {
        $this->service->add($request->name, $request->visible);

        return redirect()->route('substances.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Substance $substance
     * @return \Illuminate\Http\Response
     */
    public function show(Substance $substance)
    {
        return view('substances.view', compact('substance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Substance $substance
     * @return \Illuminate\Http\Response
     */
    public function edit(Substance $substance)
    {
        return view('substances.edit', compact('substance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SubstanceRequest  $request
     * @param  Substance $substance
     * @return \Illuminate\Http\Response
     */
    public function update(SubstanceRequest $request, Substance $substance)
    {
        $this->service->update($substance, $request->name, $request->visible);

        return redirect()->route('substances.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Substance $substance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Substance $substance)
    {
        $this->service->delete($substance);

        return redirect()->route('substances.index');
    }
}
