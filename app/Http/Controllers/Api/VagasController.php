<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VagasRequest;
use Illuminate\Http\Request;

class VagasController extends Controller
{
    public function StoreVagas(VagasRequest $request)
    {

        dd($request);
    }
}
