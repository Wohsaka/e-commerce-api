<?php

namespace App\Http\Controllers;

use App\Models\ShoppingHistory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ShoppingHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataArray = ShoppingHistory::all();
        $newArray = [];
        $counter = 0;

        foreach ($dataArray as $array) {
            $newArray[$counter] = $array;
            $newArray[$counter]['pucharse'] = json_decode($array['pucharse']);
            $counter += 1;
        }

        return $newArray;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'pucharse' => 'required',
            'total' => 'required',
        ]);

        return DB::insert('INSERT INTO shopping_histories (email, pucharse, total) VALUES (?, ?, ?)', [
            $request['email'],
            json_encode($request['pucharse']),
            $request['total'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        $dataArray = ShoppingHistory::where('email', 'like', $email)->get();
        $newArray = [];
        $counter = 0;

        foreach ($dataArray as $array) {
            $newArray[$counter] = $array;
            $newArray[$counter]['pucharse'] = json_decode($array['pucharse']);
            $counter += 1;
        }

        return $newArray;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
