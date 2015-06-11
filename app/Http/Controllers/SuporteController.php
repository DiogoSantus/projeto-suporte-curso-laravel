<?php

namespace Suporte\Http\Controllers;

use Illuminate\Http\Request;

class SuporteController extends Controller {

    public function getIndex() {
        return view('suporte.form');
    }

    public function postIndex(Request $request) {
        return view('suporte.solicitacao-recebida', ['input'=>$request->all()]);
    }

}
