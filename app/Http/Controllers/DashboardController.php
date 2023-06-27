<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\User;
use App\Models\Document;

class DashboardController extends Controller
{
    public function index()
    {
        $TotalData = Data::whereIn('status', ['Terverifikasi', 'Ditolak', 'BelumTerverifikasi'])->count();
        $DataDenganStatusTerverifikasi = Data::whereIn('status', ['Terverifikasi'])->count();
        $DataDenganStatusBelumTereverifikasi = Data::whereIn('status', ['BelumTerverifikasi'])->count();
        $DataDenganStatusDitolak = Data::whereIn('status', ['Ditolak'])->count();
        $role1Count = User::where('role_id', 1)->count();
        $role2Count = User::where('role_id', 2)->count();
        $role3Count = User::where('role_id', 3)->count();

        $TotalDocument = Document::count();

        return view('dashboard', compact('TotalData', 'DataDenganStatusTerverifikasi', 'DataDenganStatusBelumTereverifikasi', 'DataDenganStatusDitolak', 'TotalDocument', 'role3Count', 'role1Count', 'role2Count'));
    }
}
