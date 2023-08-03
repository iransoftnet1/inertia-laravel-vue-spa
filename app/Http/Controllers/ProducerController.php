<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProducerUpdateRequest;
use App\Models\Producer;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProducerController extends Controller
{
    public function index()
    {
        return Inertia::render('Producer/index', [
            'producers' => Producer::query()->paginate(5)->through(function ($producer) {
                return [
                    'id' => $producer->id,
                    'title' => $producer->title,
                    'description' => $producer->description,
                ];
            })
        ]);
    }

    public function edit(Producer $producer)
    {
        return Inertia::render('Producer/edit', [
            'producer' => $producer
        ]);
    }

    public function update(ProducerUpdateRequest $request, Producer $producer)
    {
        $producer->update($request->all());
        return Redirect::route('producers.index')->with('message','producer edited successfully');
    }


}
