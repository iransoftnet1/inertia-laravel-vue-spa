<?php

namespace App\Http\Controllers;

use App\Models\Producer;
use Inertia\Inertia;

class ProducerController extends Controller
{
    public function index()
    {
        return Inertia::render('Producer/index', [
            'producers' => Producer::query()->paginate(15)->through(function ($customer) {
                return [
                    'id' => $customer->id,
                    'title' => $customer->title,
                ];
            })
        ]);
    }
}
