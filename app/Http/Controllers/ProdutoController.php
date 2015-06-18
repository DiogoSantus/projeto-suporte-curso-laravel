<?php

namespace Suporte\Http\Controllers;

use Suporte\Http\Requests;
use Suporte\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Suporte\Produto;

// usamos para lancar uma excecao com redirecionamento de resposta
use \Illuminate\Http\Exception\HttpResponseException;

class ProdutoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $p = Produto::all();
        return view('produtos.listar', ['produtos' => $p]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        // passamos a acao para testar a montagem do formulário e utilizamos
        // apensa uma visao de form para criar e editar
        return view('produtos.form', ['acao' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     * Executa quando o envio é por POST
     * 
     * @see http://laravel.com/docs/5.1/validation#available-validation-rules
     * @return Response
     */
    public function store(Request $r) {
        // vamos validar a entrada de dados antes de permitir a tentativa de persistir em banco
        // passamos primeiramente o objeto de request recebido por parâmetro
        // depois passamos um array com as regras de validacao
        // as regras sao o nome do campo => o conjunto de regras
        // veja as regras em http://laravel.com/docs/5.1/validation#available-validation-rules
        // Da forma como estamos fazendo, caso a validação falhe, o Laravel
        // redireciona para a url que chamou esta funcao, caso contrario continua 
        // a execucao do codigo
        // as msg de erro sao adicionadas em uma variavel chamada errors, assim
        // mudaremos a logica de mostrar os erros na visao
        $this->validate($r, [
            'nome' => 'required|max:50',
        ]);

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
        // em relacao ao exemplo anterior, paramos de copiar e colar esta 
        // logica de pesquisar pelo produto e mostrar erro caso nao encontre
        $p = $this->findOrError($id);
        return view('produtos.form', ['produto' => $p, 'acao' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $r, $id) {
        // leia os comentarios na funcao store
        $this->validate($r, [
            'nome' => 'required|max:50',
        ]);

        // em relacao ao exemplo anterior, paramos de copiar e colar esta 
        // logica de pesquisar pelo produto e mostrar erro caso nao encontre
        $p = $this->findOrError($id);

        $p->fill($r->input());
        $p->save();

        return redirect('produto')->with('mensagem-sucesso', 'Produto ' . $id . ' atualizado com sucesso !!');
    }

    /**
     * Rota usada de forma a mostrar uma tela de confirmação da exclusão
     * @param type $id
     */
    public function excluir($id) {
        // em relacao ao exemplo anterior, paramos de copiar e colar esta 
        // logica de pesquisar pelo produto e mostrar erro caso nao encontre
        $p = $this->findOrError($id);
        return view('produtos.excluir', ['produto' => $p]);
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

    /**
     * Pesquisa po um produto com o $id passado, caso não encontra redireciona 
     * para a url passada e monta o erro com nossa mensagem padrao
     * 
     * Caso encontra retorna o modelo do Produto
     * 
     * @param type $id
     */
    private function findOrError($id) {
        $p = Produto::find($id);

        // se nao encontrar o produto redireciona para a principal com mensagens de erro
        if ($p == null) {
            // mudamos a forma de retornar mensagens de erros para usar o padrao do Laravel 
            // validators, veja os comentarios na funcao store
            $errors = new \Illuminate\Support\MessageBag(['Produto de id ' . $id . ' não encontrado !']);

            throw new HttpResponseException($this->redirecionaWithErrors($errors));
        }

        return $p;
    }

    private function redirecionaWithErrors($errors) {
        return redirect('produto')->withErrors($errors);
    }

}
