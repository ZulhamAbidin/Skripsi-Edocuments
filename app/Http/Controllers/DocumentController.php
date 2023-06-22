<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpFoundation\Response;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $documents = Document::select(['id', 'title', 'file_path']);

            return DataTables::of($documents)
                ->addColumn('action', function ($document) {
                    $actionButtons = '<a href="' . route('documents.view', $document->id) . '" class="btn btn-primary btn-sm">View</a>';
                    $actionButtons .= '<a href="' . route('documents.download', $document->id) . '" class="btn btn-success btn-sm">Download</a>';
                    return $actionButtons;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('documents.index');
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png,pdf,jpg,excel|max:10000',
        ]);

        $file = $request->file('file');
        $fileName = str_replace(' ', '_', $file->getClientOriginalName());
        $filePath = $file->storeAs('uploads', $fileName, 'public');

        Document::create([
            'title' => $request->title,
            'file_path' => $filePath,
        ]);

        return redirect()
            ->route('documents.index')
            ->with('success', 'Document uploaded successfully.');
    }

    public function download($id)
    {
        $document = Document::findOrFail($id);
        $filePath = storage_path('app/public/' . $document->file_path);
        $fileName = str_replace(' ', '-', $document->title);

        if (file_exists($filePath)) {
            return response()->download($filePath, $fileName, $document->title);
        } else {
            abort(404);
        }
    }

    //         public function download(Request $request)
    // {
    //     $documentId = $request->input('document_id');
    //     $document = Document::findOrFail($documentId);

    //     $filePath = storage_path('app/public/' . $document->file_path);
    //     if (file_exists($filePath)) {
    //         $fileName = str_replace(' ', '-', $document->title);
    //         return response()->download($filePath, $fileName);
    //     } else {
    //         // Handle jika file tidak ditemukan
    //         abort(404);
    //     }
    // }



    public function view($id)
    {
        $document = Document::findOrFail($id);
        $filePath = storage_path('app/public/' . $document->file_path);

        if (file_exists($filePath)) {
            return response()->file($filePath);
        } else {
            abort(404);
        }
    }

    // Metode lain seperti edit, update, dan destroy
}
