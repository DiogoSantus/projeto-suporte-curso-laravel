<?php

namespace Suporte\Http\Controllers;

use Suporte\Http\Requests;
use Suporte\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Suporte\Produto;

class ProdutoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $p = Produto::all();
        return view('produtos.listar', ['produtos'=> $p ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        // passamos a acao para testar a montagem do formulário e utilziarmos
        // apensa uma visao de form para criar e editar
        return view('produtos.form', ['acao'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     * Executa quando o envio é por POST
     * 
     * @return Response
     */
    public function store(Request $r) {
        Produto::create($r->input());
        return redirect('produto')->with('mensagem-sucesso', 'Produto incluído com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $p = Produto::find($id);
        
        // se nao encontrar o produto redireciona para a principal com mensagens de erro
        if ($p == null) {
            return redirect('produto')->with('mensagem-erro', 'Produto de id '. $id . ' não encontrado !');
        }
        return view('produtos.form', ['produto'=> $p, 'acao'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $r, $id) {
        $p = Produto::find($id);

                // se nao encontrar o produto redireciona para a principal com mensagens de erro
        if ($p == null) {
            return redirect('produto')->with('mensagem-erro', 'Produto de id '. $id . ' não encontrado !');
        }
        
        $p->fill($r->input());
        $p->save();
        
        return redirect('produto')->with('mensagem-sucesso', 'Produto ' . $id . ' atualizado com sucesso !!');
    }

    /**
     * Rota usada de forma a mostrar uma tela de confirmação da exclusão
     * @param type $id
     */
    public function excluir($id) {
        $p = Produto::find($id);

                // se nao encontrar o produto redireciona para a principal com mensagens de erro
        if ($p == null) {
            return redirect('produto')->with('mensagem-erro', 'Produto de id '. $id . ' não encontrado !');
        }

        return view('produtos.excluir', ['produto'=>$p]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        Produto::destroy($id);
        
        return redirect('produto')->with('mensagem-sucesso', 'Produto ' . $id . ' excluído !!');
    }

}
