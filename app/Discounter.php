<?php
namespace App;
abstract class Discounter
{
	protected $siguientedescontador;
        protected $name;
        
	abstract public function obtenerDescuento($product_id,$cupon);
        
        public function setSiguienteDescontador(Discounter $siguientedescontador)
        {
            $this->siguientedescontador=$siguientedescontador;
        }
        
	public function __construct($name)
	{
		$this->name = $name;
	}
        protected function buscarotrodescontador($product_id,$cupon ) // delegar  resolucion a otro objeto
	{
	  	
            if ($this->siguientedescontador)
            {   
                return $this->siguientedescontador->obtenerDescuento($product_id,$cupon);
            }
	}

	
}



