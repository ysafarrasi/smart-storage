<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Status;

class APIStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $statuses = Status::all();

        return response()->json($statuses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'loadCellID' => 'required',
            'tanggal' => 'required',
            'time_in' => 'required',
            'time_out' => 'required',
        ]);

        $status = Status::create($request->only([
            'loadCellID',
            'tanggal',
            'time_in',
            'time_out',
        ]));

        return response()->json($status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $status = Status::find($id);

        if (!$status) {
            return response()->json([
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        return response()->json($status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'loadCellID' => 'required',
            'tanggal' => 'required',
            'time_in' => 'required',
            'time_out' => 'required',
        ]);

        $status = Status::find($id);

        if (!$status) {
            return response()->json([
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $status->update($request->only([
            'loadCellID',
            'tanggal',
            'time_in',
            'time_out',
        ]));

        return response()->json($status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $status = Status::find($id);

        if (!$status) {
            return response()->json([
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $status->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus',
        ]);
    }
}

