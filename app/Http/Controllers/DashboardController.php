<?php

namespace App\Http\Controllers;

use App\Models\Pengesahan;
use App\Models\User;
use App\Models\Document;

class DashboardController extends Controller
{
    public function index()
    {
        $TotalDataPengesahan = Pengesahan::whereIn('status', ['Terverifikasi', 'Ditolak', 'BelumTerverifikasi'])->count();
        $DataDenganStatusTerverifikasi = Pengesahan::whereIn('status', ['Terverifikasi'])->count();
        $DataDenganStatusBelumTereverifikasi = Pengesahan::whereIn('status', ['BelumTerverifikasi'])->count();
        $DataDenganStatusDitolak = Pengesahan::whereIn('status', ['Ditolak'])->count();
        $role1Count = User::where('role_id', 1)->count();
        $role2Count = User::where('role_id', 2)->count();
        $role3Count = User::where('role_id', 3)->count();

        $TotalDocument = Document::count();

        $data = Pengesahan::all();
        $totalSum = $data->sum('Total');

        return view('dashboard', compact('TotalDataPengesahan', 'totalSum', 'DataDenganStatusTerverifikasi', 'DataDenganStatusBelumTereverifikasi', 'DataDenganStatusDitolak', 'TotalDocument', 'role3Count', 'role1Count', 'role2Count'));
    }
}

