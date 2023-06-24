<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\User;
use App\Models\Document;

class DashboardController extends Controller
{
    public function index()
    {
        $dataCount = Data::count();
        $userCount = User::count();
        $documentCount = Document::count();

        return view('dashboard', compact('dataCount', 'userCount', 'documentCount'));
    }
}

