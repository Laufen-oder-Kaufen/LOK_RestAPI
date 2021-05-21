<?php

namespace App\Http\Controllers\api\v1_0;

use App\Http\Controllers\Controller;
use App\Models\Playerdata;
use App\Models\User;
use Illuminate\Http\Request;


/**
 * Class PlayerdataController
 * @package App\Http\Controllers\api\v1_0
 *
 *
 * @Controller(prefix="api/v1_0")
 */
class PlayerdataController extends Controller
{

    /**
     * @Post("getplayerdata/", as="api.v1_0.getplayerdata")
     *
     * @param Request $request
     */
    public function getPlayerdata(Request $request)
    {
        $user = User::query()->where('token', $request->input('auth_token'))->first();

        if ($user == null) {
            return response()->json(['error' => 'token not found'], 404);
        }

        return response()->json(['data' => $user->playerdata->data], 200);

    }

    /**
     * @Post("setplayerdata/", as="api.v1_0.setplayerdata")
     */
    public function setPlayerdata(Request $request) {
        $user = User::query()->where('token', $request->input('auth_token'))->first();

        if ($user == null) {
            return response()->json(['error' => 'token not found'], 404);
        }

        if ($user->playerdata == null) {
            Playerdata::query()->create([
                'user_id' => $user->id,
                'data' => $request->input('playerdata'),
            ]);
            return response(['success' => 'success'], 200);
        } else {
            $pd = $user->playerdata;
            $pd->data = $request->input('playerdata');
            $pd->save();
            return response(['success' => 'success'], 200);
        }

    }

}
