<?php

namespace Suporte\Http\Controllers;

use Illuminate\Http\Request;

class SuporteController extends Controller {

    /**
     * Esta funcao nao esta no padrao do route controller, portanto como eh
     * chamada por get, segue com segunda parte da uri, sendo chamada assim
     * suporte/list
     */
    public function getList() {
        $suportes = \Suporte\Suporte::all();
        return view('suporte.listar', ['suportes'=>$suportes]);
    }

    /**
     * Como queremos que a rota /suporte liste as solicitações, redirecionamos
     * por padrao a entrada nesta rota para o suporte/list 
     */
    public function getIndex() {
        return redirect('suporte/list');
    }
    
    /**
     * Aproveitamos o route::controller para criar diretamente a rota para
     * suporte/create que mostre o formulário, sabendo que ela será chamada 
     * pelo método get (prefixo no nome da função)
     * 
     * Ainda passamos os produtos para popular o campo select no formulário,
     * veja que invertemos os campos nome e id para que o select coloque-os corretamente
     * no html que montar para cada option
     */
    public function getCreate() {        
        return view('suporte.form',
                ['produtos'=>  \Suporte\Produto::all(['nome', 'id'])]
            );
    }

    /**
     * Salva a solicitação no banco e mostra para o usuário
     */
    public function postIndex(Request $request) {
//        dd($request->all());
        
        $this->validate($request, [
            'nome' => 'required|min:3',
            'email' => 'required|email',
            'data' => 'date_format:"d/m/Y"',
            'descricao' => 'required|min:10',
        ]);
        
        \Suporte\Suporte::create($request->all());
        return view('suporte.solicitacao-recebida', ['input'=>$request->all()]);
    }

    private function redirecionaWithErrors($errors) {
        return redirect('produto')->withErrors($errors);
    }

}
