<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
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
                    $actionButtons = '';

                    $extension = pathinfo($document->file_path, PATHINFO_EXTENSION);
                    if (in_array($extension, ['jpg', 'jpeg', 'png', 'pdf'])) {
                        // Hanya menampilkan tombol "View" jika file adalah gambar atau PDF
                        $actionButtons .= '<a href="' . route('documents.view', $document->id) . '" target="_blank" class="btn btn-primary btn-sm">View</a>';
                    }
                    $actionButtons .= '<a href="' . route('documents.download', $document->id) . '" class="btn btn-success btn-sm">Download</a>';
                    // $actionButtons .= '<button class="btn btn-warning btn-sm edit-document" data-toggle="modal" data-target="#editModal" data-document-id="' . $document->id . '" data-document-title="' . $document->title . '">Edit</button>';
                    $actionButtons .= '<button class="btn btn-warning btn-sm edit-document" data-toggle="modal" data-target="#editModal" data-document-id="' . $document->id . '" data-document-title="' . $document->title . '">Edit</button>';

                    $actionButtons .= '<a href="#" class="btn btn-danger btn-sm delete-document" data-document-id="' . $document->id . '">Delete</a>';

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
            'file' => 'required|mimes:jpeg,png,pdf,jpg,xlsx,xls|max:10000',
        ]);

        $file = $request->file('file');
        $fileName = str_replace(' ', '_', $file->getClientOriginalName());
        $filePath = $file->storeAs('uploads', $fileName, 'public');

        Document::create([
            'title' => $request->title,
            'file_path' => $filePath,
        ]);

        Session::flash('success', 'Document uploaded successfully.');

        return redirect()->route('documents.index');
    }

    public function download($id)
    {
        $document = Document::findOrFail($id);

        $filePath = storage_path('app/public/' . $document->file_path);
        $fileName = str_replace(' ', '-', $document->title);
        $extension = pathinfo($document->file_path, PATHINFO_EXTENSION);

        if (file_exists($filePath)) {
            return response()->download($filePath, $fileName . '.' . $extension);
        } else {
            abort(404);
        }
    }

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

    public function delete($id)
    {
        $document = Document::findOrFail($id);

        // Hapus file terlebih dahulu
        $filePath = storage_path('app/public/' . $document->file_path);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Hapus data document dari database
        $document->delete();

        return response()->json(['message' => 'Document deleted successfully.']);
    }

    public function edit($id)
    {
        $document = Document::findOrFail($id);

        return response()->json(['document' => $document]);
    }

    public function update(Request $request, $id)
    {
        $document = Document::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:jpeg,png,pdf,jpg,xlsx,xls|max:10000',
        ]);

        $document->title = $request->title;

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            $oldFilePath = storage_path('app/public/' . $document->file_path);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            // Unggah file baru
            $file = $request->file('file');
            $fileName = str_replace(' ', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $document->file_path = $filePath;
        }

        $document->save();

        return redirect()
            ->route('documents.index')
            ->with('success', 'Dokumen berhasil diperbarui');
    }

    public function getDocuments(Request $request)
    {
        if ($request->ajax()) {
            $searchValue = $request->input('search');

            $documents = Document::select(['id', 'title', 'file_path'])
                ->where('title', 'LIKE', "%$searchValue%");

            return DataTables::of($documents)
                ->addColumn('action', function ($document) {
                    $actionButtons = '';

                    // Tambahkan tombol aksi sesuai kebutuhan
                    $actionButtons .= '<a href="' . route('documents.view', $document->id) . '" target="_blank" class="btn btn-primary btn-sm">View</a>';
                    $actionButtons .= '<a href="' . route('documents.download', $document->id) . '" class="btn btn-success btn-sm">Download</a>';
                    $actionButtons .= '<button class="btn btn-warning btn-sm edit-document" data-toggle="modal" data-target="#editModal" data-document-id="' . $document->id . '" data-document-title="' . $document->title . '">Edit</button>';
                    $actionButtons .= '<a href="#" class="btn btn-danger btn-sm delete-document" data-document-id="' . $document->id . '">Delete</a>';

                    return $actionButtons;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return abort(404);
    }

}
