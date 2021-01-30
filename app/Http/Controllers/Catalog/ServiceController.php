<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(Service $service)
    {
        return view('service.index', ['service' => $service]);
    }

    public function show(Detail $detail)
    {
        return view('service.show', ['detail' => $detail]);
    }
}
