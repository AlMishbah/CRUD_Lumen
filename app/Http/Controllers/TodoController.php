<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index() {
        $data = Todo::all();
        return response()->json($data);
    }

    public function buat(Request $request) {
        $buat = Todo::create([
            'activty' => $request->activty,
            'description' => $request->description
        ]);
        if ($buat->save()) {
            $data = ["Message" => "Data berhasil dibuat"];
            return response()->json($data);
        }
    }

    public function updateTodo(Request $request) {
        $updateData = Todo::find($request->id);
        $updateData->activty = $request->input('activty');
        $updateData->description = $request->input('description');

        if ($updateData->save()) {
            $data = ["Message" => "Data berhasil diupdate"];
            return response()->json($data);
        }
    }

    public function hapus($id)
    {
        $hapus =  Todo::find($id);

        if ($hapus) {
            $hapus->delete();
            $data = [
                "message" => "success_deleted"
            ];
        } else {
            $data = [
                "message" => "id nost found",
            ];
        }

        return response()->json($data);
    }
}
