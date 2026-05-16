<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - EcoJac
|--------------------------------------------------------------------------
|
| Aqui ficam as rotas da sua API para o TCC EcoJac.
| O tema é focado no descarte correto de lixo seletivo.
|
*/

// 1. Rota de Status da API
Route::get('/status', function () {
    return response()->json([
        'projeto' => 'EcoJac API',
        'status' => 'Online',
        'mensagem' => 'A API de descarte seletivo está funcionando corretamente.',
        'versao' => '1.0.0'
    ]);
});

// 2. Rota de Pontos de Coleta (Exemplo)
Route::get('/pontos-coleta', function () {
    return response()->json([
        'mensagem' => 'Lista de locais para descarte de lixo seletivo.',
        'dados' => [
            [
                'id' => 1,
                'nome' => 'Ecoponto Central',
                'endereco' => 'Rua da Reciclagem, 123',
                'tipos_aceitos' => ['Plástico', 'Papel', 'Metal', 'Vidro']
            ],
            [
                'id' => 2,
                'nome' => 'Posto Coleta Bairro Verde',
                'endereco' => 'Av. Sustentável, 456',
                'tipos_aceitos' => ['Pilhas', 'Baterias', 'Óleo de Cozinha']
            ]
        ]
    ]);
});

// 3. Rota de Tipos de Resíduos
Route::get('/tipos-residuos', function () {
    return response()->json([
        'mensagem' => 'Categorias de materiais para separação correta.',
        'categorias' => [
            ['slug' => 'plastico', 'cor_padrao' => 'Vermelho', 'descricao' => 'Garrafas PET, embalagens plásticas, etc.'],
            ['slug' => 'papel', 'cor_padrao' => 'Azul', 'descricao' => 'Jornais, revistas, caixas de papelão.'],
            ['slug' => 'metal', 'cor_padrao' => 'Amarelo', 'descricao' => 'Latas de alumínio, tampinhas de garrafa.'],
            ['slug' => 'vidro', 'cor_padrao' => 'Verde', 'descricao' => 'Garrafas, potes de conserva (sempre limpos).']
        ]
    ]);
});

// 4. Rota de Dicas de Descarte
Route::get('/dicas', function () {
    return response()->json([
        'mensagem' => 'Dicas rápidas para um descarte mais eficiente.',
        'dicas' => [
            'Lave as embalagens antes de descartar para evitar mau cheiro e contaminação.',
            'Amasse as latas de alumínio e garrafas PET para ocupar menos espaço.',
            'Papel sujo com gordura (como caixa de pizza) não é reciclável; descarte no lixo orgânico.',
            'Pilhas e baterias nunca devem ser jogadas no lixo comum; leve a postos específicos.'
        ]
    ]);
});
