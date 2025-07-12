<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function TermsAndCondition(){
        return view('document.terms');
    }

}
