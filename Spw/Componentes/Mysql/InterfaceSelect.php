<?php

     namespace Spw\Componentes\Mysql;
     
	class InterfaceSelect

     {

          // ATRIBUTOS
		
			protected $dbc;
			public $select;
			public $from;
			public $where;
			public $orderby;
			public $limit;
			public $result;
			public $rows;


          // METODOS DE CONFIGURACAO
			
			public function Set_Conectar()
			{
				$this->dbc = \Spw\Componentes\Mysql\Conectar::Executar();
			}
			
			public function Set_Select($query)
			{
				(!empty($query)) ? $this->select = $query : $this->select = null;
			}
			
			
			public function Set_From($query)
			{
				(!empty($query)) ? $this->from = $query : $this->from = null;
			}
			
			
			public function Set_Where($query)
			{
				(!empty($query)) ? $this->where = $query : $this->where = null;
			}
			
			
			public function Set_OrderBy($query)
			{
				(!empty($query)) ? $this->orderby = $query : $this->orderby = null;
			}
			
			
			public function Set_Limit($query)
			{
				(!empty($query)) ? $this->limit = $query : $this->limit = null;
			}


        


      }