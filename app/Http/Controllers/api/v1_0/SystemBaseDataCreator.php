<?php

namespace app\Http\Controllers\api\v1_0;

trait SystemBaseDataCreator
{

    protected function randomString(
        $length = 8,
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    )
    {
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    protected function giveUserNewToken($user, $token = null)
    {
        if ($token == null || $token == '') {
            $token = $this->randomString(16);
        }

        $user->token = $token;
        $user->save();

        return [
            'token' => $token,
            'instance' => $user,
        ];
    }
}
