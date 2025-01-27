<?php
    //$nome = "luiz";
    //$idade = 20;
    //$altura = 1.79;

    //$concat = "$nome, $idade anos, $altura de altura";
    
    class Pessoa {
        public $nome;
        public $idade;

        function __construct($nome,$idade) {
          $this->nome = $nome;
          $this->idade = $idade;  
        }

        function get_nome() {
            return $this->nome;
        }

        function get_idade() {
            return $this->idade;
        }
    };

    $luiz = new Pessoa("luiz",20);
    $victor = new Pessoa("victor",20);
    $miguel = new Pessoa("miguel",9);

    $pessoas = array($luiz,$victor,$miguel);

    foreach ($pessoas as $i) {
        $nome = $i->get_nome();
        if ($i->get_idade() >= 18) {
            echo "$nome, maior de idade <br>";
        } else {
            echo "$nome, menor de idade <br>";
        };
    }
?>