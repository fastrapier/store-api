<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SpaController extends Controller
{
    public function index()
    {
        return response()->json(null, Response::HTTP_NOT_FOUND);
    }
}
