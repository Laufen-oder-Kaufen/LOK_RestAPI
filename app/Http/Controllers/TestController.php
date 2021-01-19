<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * @Get("/hallo", as="hallo.ha")
     */
    public function hallo() {
        return 'In Bremen sagt man Moin!';
    }

}
