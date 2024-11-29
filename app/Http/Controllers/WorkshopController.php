<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\WorkshopRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $workshops = Workshop::paginate();

        return view('workshop.index', compact('workshops'))
            ->with('i', ($request->input('page', 1) - 1) * $workshops->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $workshop = new Workshop();

        return view('workshop.create', compact('workshop'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkshopRequest $request): RedirectResponse
    {
        Workshop::create($request->validated());

        return Redirect::route('workshops.index')
            ->with('success', 'Workshop created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $workshop = Workshop::find($id);

        return view('workshop.show', compact('workshop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $workshop = Workshop::find($id);

        return view('workshop.edit', compact('workshop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkshopRequest $request, Workshop $workshop): RedirectResponse
    {
        $workshop->update($request->validated());

        return Redirect::route('workshops.index')
            ->with('success', 'Workshop updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Workshop::find($id)->delete();

        return Redirect::route('workshops.index')
            ->with('success', 'Workshop deleted successfully');
    }
}
