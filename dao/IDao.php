<?php
//CRUD CREATE, READ, UPDATE, DELETE

interface IDao{
    
    public function inserir($obj);
    public function selecionar($id);
    public function listarTodos();
    public function atualizar($obj);
    public function excluir($id);
    
}

?>