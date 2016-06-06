<?php

class Alunos
{
    private $cnx;
    private $id;
    private $nome;
    private $nota;

    public function __construct(\PDO $cnx){
        $this->cnx = $cnx;
    }

    public function find($id){
        $query = "SELECT * FROM alunos WHERE id = :id";
        $sttm = $this->cnx->prepare($query);
        $sttm->bindValue(":id", $id);
        if($sttm->execute())
            return $sttm->fetch(\PDO::FETCH_ASSOC);
    }

    public function listar($order = null){
        $query = "SELECT * FROM alunos $order";
        $sttm = $this->cnx->query($query);
        return $sttm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function inserir(){
        $query = "INSERT INTO alunos (nome, nota) VALUES (:nome, :nota)";
        $sttm = $this->cnx->prepare($query);
        $sttm->bindValue(":nome", $this->getNome());
        $sttm->bindValue(":nota", $this->getNota());
        if($sttm->execute()) return true;
    }

    public function alterar(){
        $query = "UPDATE alunos SET nome=:nome, nota=:nota WHERE id = :id";
        $sttm = $this->cnx->prepare($query);
        $sttm->bindValue(":id", $this->getId());
        $sttm->bindValue(":nome", $this->getNome());
        $sttm->bindValue(":nota", $this->getNota());
        if($sttm->execute()) return true;
    }

    public function excluir($id){
        $query = "DELETE FROM alunos WHERE id = :id";
        $sttm = $this->cnx->prepare($query);
        $sttm->bindValue(":id", $id);
        if($sttm->execute()) return true;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     * @return Cliente
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * @param mixed $nota
     * @return Cliente
     */
    public function setNota($nota)
    {
        $this->nota = $nota;
        return $this;
    }

    /**
     * @return PDO
     */
    public function getCnx()
    {
        return $this->cnx;
    }

    /**
     * @param PDO $cnx
     * @return Cliente
     */
    public function setCnx($cnx)
    {
        $this->cnx = $cnx;
        return $this;
    }
}