<?php
Class Processo extends ConexaoPdo
{
    private $Query;
	private $DadosCampos   = [];
	private $PreparaCampos = [];
	private $DadosExtras   = [];
    
	public function __construct()
	{
		parent::__construct();

	}

   // ########################################################################
   //                     CRUD INFORMAÇÃO
   // ########################################################################
    
    //lista dados
    public function lista($campos, $tabela, $where = null, $busca = null, $ordem = null)
    {
     	$this->Query = "SELECT {$campos} FROM {$tabela} ";
        if(!empty($where) && !empty($busca)){
           $this->Query .= "WHERE $where = '$busca' ";
        }
        if(!empty($ordem)){
           $this->Query .= "ORDER BY {$ordem} ASC ";
        }
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }

    public function gameCount($tabela, $column, $game)
    {
     	$this->Query = "SELECT count(*) as 'total' FROM {$tabela} WHERE $column = '$game'";
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }

    public function getWinners()
    {  
        $this->Query = "SELECT name,points FROM tb_points ";    
        $this->Query.= "ORDER BY points DESC LIMIT 3";      
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }

    //lista aprovador
    public function listaAp($campos, $tabela, $ordem = null)
    {
         $this->Query = "SELECT {$campos} FROM {$tabela} WHERE id NOT IN (1,10)";
        if(!empty($ordem)){
           $this->Query .= "ORDER BY {$ordem} ASC ";
        }
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }

    //lista checkins do aprovador
    public function listaCheck($email)
    {
        $this->Query = "SELECT id, nome, email, pagamento, cad_finalizado FROM tb_cadastro WHERE emailaprovador = '$email'";
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }

    //busca dados 
    public function getDadosSimple($campos, $tabela, $id)
    {   
      unset($this->PreparaCampos);
      $this->PreparaCampos[':id'] = (int)$id;
      $this->Query = "SELECT {$campos} FROM {$tabela} WHERE id = :id ";
      $this->ExecuteSQL($this->Query, $this->PreparaCampos);
      return $this->ListarDadosAll();
    }

    //busca dados
    public function getDadosComposto($campos, $tabela, array $busca, array $extras)
    {  
    $this->PreparaDados($busca);
    $this->PreparaCampos($busca);
    $this->PreparaExtras($extras);
      $this->Query = "SELECT {$campos} FROM {$tabela} ";
    $this->Query.= " WHERE ". implode(' AND ', $this->DadosCampos); 
    $this->Query.= " ". implode(' ', $this->DadosExtras); 
      $this->ExecuteSQL($this->Query, $this->PreparaCampos);
    return $this->ListarDadosAll();
    }
 
    //insere dados novos
    public function newDados(array $campos, $tabela)
    {
		 $this->PreparaDados($campos);
		 $keys = array_keys($campos);
		 $this->Query = ("INSERT INTO {$tabela} (".implode(',', $keys).") VALUES (:".implode(",:", $keys).")");
         $this->ExecuteSQL($this->Query, $this->PreparaCampos); 
         $id = $this->UltimoId();
         $this->Desconecta();
         return $id;
	}

    //seta os dados
	public function setDados(array $campos, $tabela, $email){

        $this->PreparaDados($campos);
		$this->PreparaCampos($campos);
		$this->PreparaCampos[':email'] = (string)$email;
		$this->Query = "UPDATE {$tabela} SET ".implode(',', $this->DadosCampos)." WHERE email = :email";
        $this->ExecuteSQL($this->Query, $this->PreparaCampos); 
        $this->Desconecta();
	}

    //delete dados
	public function delDados($tabela, $id)
	{   
        unset($this->PreparaCampos);
     	$this->PreparaCampos[':id'] = (int)$id;
		$this->Query = "DELETE FROM {$tabela} WHERE id = :id";
        $this->ExecuteSQL($this->Query, $this->PreparaCampos); 
        $this->Desconecta();
	}

    //Conta inscritos
    public function getCountTotal()
    {  
        $this->Query = "SELECT COUNT(id) AS qtd FROM tb_cadastro";    
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }

    //Conta inscritos
    public function getCountInscritos()
    {  
        $this->Query = "SELECT COUNT(id) AS qtd FROM tb_cadastro WHERE cad_finalizado = 'SIM'";    
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }

    //Conta inscritos
    public function getCountInscritosOpen()
    {  
        $this->Query = "SELECT COUNT(id) AS qtd FROM tb_cadastro WHERE cad_finalizado = 'NAO'";    
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }

    //Conta acessos hoje
    public function getCountAcessados()
    {  
        $this->Query = "SELECT COUNT(id) AS qtd FROM tb_cadastro ";    
        $this->Query.= " WHERE cad_acesso IS NOT NULL";      
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }

    //Conta cadastros hoje
    public function getCountCadHoje()
    {  
        $dataAtual = date('Y-m-d');
        $this->Query = "SELECT COUNT(id) AS qtd FROM tb_cadastro ";    
        $this->Query.= " WHERE (DATE_FORMAT(cad_cadastro,'%Y-%m-%d') = '$dataAtual') AND cad_finalizado = 'SIM'";      
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }
	
	//Conta cadastros pagos
    public function getCountPagos()
    {  
        $this->Query = "SELECT COUNT(id) AS qtd FROM tb_cadastro ";    
        $this->Query.= " WHERE pagamento = 'SIM' and pagamento_lampada = 'NAO'";      
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }	
	
	//Conta datas escolhidas dia 02
    public function getdata02()
    {  
        $this->Query = "SELECT COUNT(id) AS qtd FROM tb_cadastro ";    
        $this->Query.= " WHERE dataEvent = '02/04-04/04'";      
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }	
		
		//Conta datas escolhidas dia 03
    public function getdata03()
    {  
        $this->Query = "SELECT COUNT(id) AS qtd FROM tb_cadastro ";    
        $this->Query.= " WHERE dataEvent = '03/04-04/04'";      
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }	
		
		//Conta datas escolhidas dia 04
    public function getdata04()
    {  
        $this->Query = "SELECT COUNT(id) AS qtd FROM tb_cadastro ";    
        $this->Query.= " WHERE dataEvent = '04/04-06/04'";      
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }	
	
	
	//Conta cadastros pendentes open pix
    public function getCountAGRD()
    {  
        $this->Query = "SELECT COUNT(id) AS qtd FROM tb_cadastro ";    
        $this->Query.= " WHERE pagamento = 'AGRD'";      
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }	
	
	//PAGAMENTO VIA LAMPADA
    public function getCountPAGOLAMPADA()
    {  
        $this->Query = "SELECT COUNT(id) AS qtd FROM tb_cadastro ";    
        $this->Query.= " WHERE pagamento_lampada = 'SIM'";      
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }

    //Conta cadastros gerais
    public function getCountCad()
    {  
        $this->Query = "SELECT COUNT(id) AS qtd FROM tb_cadastro ";    
        $this->Query.= " WHERE cad_finalizado = 'SIM'";      
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }

    //Conta cadastros gerais concluidos e não aprovados ainda
    public function getCountApro()
    {  
        $this->Query = "SELECT COUNT(id) AS qtd FROM tb_aprovador ";    
        $this->Query.= " WHERE usu_finalizado = 'SIM'";      
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }    
	
	//Conta cadastros feitos e pendentes de aprovação
    public function getCountAguaAprov()
    {  
        $this->Query = "SELECT COUNT(id) AS qtd FROM tb_cadastro ";    
        $this->Query.= " WHERE cad_finalizado = 'SIM' AND pagamento = 'NAO'";      
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }	
	
	//Conta pagos no grupo A
    public function getCountPAGOGRUPOA()
    {  
        $this->Query = "SELECT COUNT(id) AS qtd FROM tb_cadastro ";    
        $this->Query.= " WHERE `categoria` = 'A' AND pagamento = 'SIM'";      
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }	
	
	//Conta pagos demais Grupos
    public function getCountPAGODEMAISGRUPOS()
    {  
        $this->Query = "SELECT COUNT(id) AS qtd FROM tb_cadastro ";    
        $this->Query.= " WHERE `categoria` <> 'A' AND pagamento = 'SIM'";      
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }

    public function getFinalizaEvento(){

        $dataAtual   = date('Y-m-d H:i:s');
        $nomeTabela  = 'tb_cadastro_'.date('d_m_Y');

        $this->Query = "CREATE TABLE IF NOT EXISTS $nomeTabela  LIKE tb_cadastro;
        INSERT $nomeTabela  SELECT * FROM tb_cadastro;";
        $this->ExecuteSQL($this->Query);

        $this->Query = "TRUNCATE TABLE tb_cadastro"; 
        $this->ExecuteSQL($this->Query);

        $this->newDados(array('tab_nome'=>$nomeTabela, 'tab_data_cadastro'=> $dataAtual), 'tb_table_clone');
    
    }

    public function getLocalizar($campos, $texto)
    {   
        $ativaCpf = false;

        $this->Query = "SELECT id, $campos 
        cad_online, date_format(cad_data_login,'%d-%m-%Y %H:%m') AS acesso, cad_ativo FROM tb_cadastro WHERE ";    

        if(filter_var($texto, FILTER_VALIDATE_EMAIL)){
            $this->Query.= " email LIKE :texto "; 
        }elseif(is_numeric($texto) AND strlen($texto)==11){
            $ativaCpf = true;
            $texto = substr($texto,0,3).".".substr($texto,3,3).".".substr($texto,6,3)."-".substr($texto,9,2);
            $this->Query.= " cpf = :texto "; 
        }else{
            $this->Query.= " (nome LIKE :texto) "; 
        } 

        unset($this->PreparaCampos);
        $this->PreparaCampos[':texto'] = (!$ativaCpf)?'%'.trim($texto).'%':trim($texto); 
        $this->ExecuteSQL($this->Query, $this->PreparaCampos);
        return $this->ListarDadosAll();
    }
    public function getTodosApp($campos)
    {   
        $this->Query = "SELECT id, $campos 
        cad_online, date_format(cad_data_login,'%d-%m-%Y %H:%m') AS acesso, cad_ativo FROM tb_cadastro WHERE cad_finalizado = 'SIM' AND pagamento = 'NAO' AND justifyAreaChange = '' AND categoria = 'B' OR cad_finalizado = 'SIM' AND pagamento = 'NAO' AND justifyAreaChange is NULL AND categoria = 'B'";  
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }

    public function getTodos($campos)
    {   
        $this->Query = "SELECT id, $campos 
        cad_online, date_format(cad_data_login,'%d-%m-%Y %H:%m') AS acesso, cad_ativo FROM tb_cadastro WHERE cad_finalizado = 'SIM' AND pagamento = 'SIM' AND justifyAreaChange = '' OR cad_finalizado = 'SIM' AND pagamento = 'SIM' AND justifyAreaChange is NULL";  
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }

    public function getPedidos($campos)
    {   
        $this->Query = "SELECT id, $campos 
        cad_online, date_format(cad_data_login,'%d-%m-%Y %H:%m') AS acesso, cad_ativo FROM tb_cadastro WHERE cad_finalizado = 'SIM' AND segmentoChange != '' OR cad_finalizado = 'SIM' AND areaChange != ''";  
        $this->ExecuteSQL($this->Query);
        return $this->ListarDadosAll();
    }


   // ########################################################################
   //                      METODOS DE PREPARAÇÃO
   // ########################################################################

	private function PreparaDados(array $dados)
	{  
        unset($this->PreparaCampos);
   		foreach($dados as $chave =>$valor){
			$this->PreparaCampos[':'.$chave] = (is_numeric($valor))? (int)$valor:(string)$valor;
        }
    } 


    private function PreparaCampos(array $campos)
	{
        unset($this->DadosCampos);
   		foreach($campos as $chave =>$valor){
			$this->DadosCampos[] =  $chave." = :".$chave;
        }
    }


     private function PreparaExtras(array $extras)
	{
        unset($this->DadosExtras);
   		foreach($extras as $chave =>$valor){
			$this->DadosExtras[] =  $chave."  ".$valor;
        }
    }      

}
?>