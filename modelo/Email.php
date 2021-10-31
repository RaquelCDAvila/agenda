<?php

class Email
{

  private $id;
  private $endereco;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getEndereco()
  {
    return $this->endereco;
  }

  public function setEndereco($endereco)
  {
    $this->endereco = $endereco;
  }

}

?>