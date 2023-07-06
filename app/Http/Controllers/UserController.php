<?php
namespace App\Http\Controllers;

use DataTables;
use App\Models\Role;
use App\Models\User;
use App\Models\Pengesahan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax() || $request->header('X-Requested-With') == 'XMLHttpRequest') {
            $data = User::with('role') // Menambahkan relasi 'role' dengan eager loading
                ->where('id', '!=', auth()->user()->id)
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('management.edit', ['id' => $row->id]);
                    $deleteUrl = route('management.destroy', ['id' => $row->id]);

                    $editBtn = '<button class="btn btn-sm btn-primary btn-edit" data-id="' . $row->id . '">Edit</button>';
                    $deleteBtn = '<button class="btn btn-sm btn-danger btn-delete mx-1" data-id="' . $row->id . '">Delete</button>';

                    // Periksa role_id sebelum menampilkan tombol "Visit"
                    $viewBtn = '';
                    if ($row->role_id !== 1 && $row->role_id !== 2) {
                        $viewBtn = '<a href="' . route('visit.show', $row->id) . '" class="view btn btn-sm btn-info btn-md">Visit User</a>';
                    }

                    return $editBtn . $deleteBtn . $viewBtn;
                })
                ->addColumn('role_name', function ($row) {
                    return $row->role->name; // Mengakses kolom 'name' pada relasi 'role'
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('management.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('management.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        $validatedData['password'] = isset($validatedData['password']) ? Hash::make($validatedData['password']) : $user->password;

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->role_id = $validatedData['role_id'];

        $user->save();

        Alert::success('Success', 'Data berhasil diperbaharui.')
            ->persistent(true)
            ->autoClose(3000);

        return redirect()
            ->route('management.index')
            ->with('success', 'User berhasil diperbaharui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

    public function show($user_id)
    {
        $user = User::findOrFail($user_id);
        $pengesahans = Pengesahan::where('user_id', $user_id)->get();

        return view('visit.show', compact('user', 'pengesahans'));
    }
}
