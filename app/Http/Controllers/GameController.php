<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Validator;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'games' => Game::paginate(30)
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
        $game = new Game;

        $game->name = $request->name;
        $game->image_url = $request->image_url;
        $game->description = $request->description;
        $game->gender = $request->gender;
        $game->bestAge = $request->bestAge;
        $game->released = $request->released;

        $game->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return response()->jason([
            'game' =>$game
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
            'gender' => 'required',
            'bestAge' => 'required|integer',
            'released' => 'nullable|date'
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        Store::where('id', $store->id)->update([
            'name'
        ])
    }

    /**
     * Remove the specified resource from storage.
     *            {
                "id": 1,
                "name": "The Last of US",
                "image_url": "in future",
                "description": "Fiction game",
                "gender": "fiction",
                "bestAge": 16,
                "released": "2020-07-10",
                "created_at": null,
                "updated_at": null
            }
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
