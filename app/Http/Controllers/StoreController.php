<?php

namespace App\Http\Controllers;

use App\Http\Services\StoreService;
use App\Store;
use Illuminate\Http\Request;
use Validator;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'array' => StoreService::index(),
            'stores' => Store::paginate(30),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Store;

        $store->name = $request->name;
        $store->site = $request->site;
        $store->description = $request->description;

        $store->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return response()->json([
            'store' => $store,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'site' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all(),
            ]);
        }

        Store::where('id', $store->id)->update([
            'name' => $request->name,
            'site' => $request->site,
            'description' => $request->description,
        ]);

        return response()->json([
            'store' => Store::where('id', $store->id)->get(),
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        if (!$store) {
            return response()->json([
                'error' => 'Loja não existe',
            ]);
        }

        Store::where('id', $store->id)->delete();

        return response()->json([
            'error' => 'Loja removida',
        ]);
    }
}
