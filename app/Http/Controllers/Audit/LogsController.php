<?php

namespace App\Http\Controllers\Audit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\LoggerService;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LoggerService $service)
    {
        $logs = $service->get();

        return view('audit.log.index', compact('logs'));
    }
}
