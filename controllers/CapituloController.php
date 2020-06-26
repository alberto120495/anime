<?php
require_once 'models/capitulo.php';
class CapituloController
{
    public function index(){
        $id = $_GET['id_rel'];
        $ncap = $_GET['cap'];
        $capitulo = new Capitulo();
        $capitulo->setId_rel($id);
        $capitulo->setCapitulo($ncap);
        $cap = $capitulo->verCapitulo();    
        
        $num = new Capitulo();
        $num->setId_rel($id);
        $numCap = $num->numCapitulos();


        require_once 'views/capitulo/ver.php';
    }

    
}