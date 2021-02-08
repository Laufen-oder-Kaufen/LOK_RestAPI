<?php

namespace App\Http\Controllers\api\v1_0;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * Class ApiAuthController
 * @package App\Http\Controllers\api\v1
 *
 * @Controller(prefix="api/v1_0")
 */
class ApiAuthController extends Controller
{
    use SystemBaseDataCreator;

    /**
     * @Post("login/", as="api.v1_0.login")
     * @param Request $request
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
            ]);

        if ($validator->fails()) {
            return response()->json($validator);
        }

        $name = $request->input('name');
        $password = $request->input('password');

        $user = $this->getUser($name, $password);

        $tokencreator = $this->giveUserNewToken($user);
        $token = $tokencreator['token'];

        return ['token' => $token];
    }

    /**
     * @Post("register/", as="api.v1_0.register")
     * @param Request $request
     */
    public function register(Request $request)
    {
        // TODO: Register user with restapi
        return 'Register user is in progress';
    }


    /**
     * @param $name
     * @param $password
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    private function getUser($name, $password)
    {
        $user = User::query()->where('name', $name)->first();

        if (!Hash::check($password, $user->password)) {
            return null;
        }

        return $user;

    }
}
