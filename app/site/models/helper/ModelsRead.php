<?php
namespace Site\models\helper;
use PDO;
if (!defined('URL')){
	header("Location: /");
	exit();		
}

class ModelsRead extends modelsConn {
	
	private $select;
	private $values;
	private $result;
	private $msg;
	private $query;
	private $conn;
	
	public function exeRead($tabela, $termos = null, $parseString = null) {
		if (!empty($parseString)) {
			//Caso tenha sido passado algum parâmetro, ele será colocado no array $this-> values
			parse_str($parseString, $this->values);
			
		}
		// Montando a SQL para a busca em BD
		$this->select = "SELECT * FROM {$tabela} {$termos}";
		$this->executarInstrucao();
	}

		public function exeReadEspecifico($query, $parseString = null) {
			if (!empty($parseString)) {
				PARSE_STR($parseString, $this->values);
			}
			$this->select = (string) $query;
			$this->executarInstrucao();
			
		}
		private function conexao() {
			// chamando o método da classe pai
			$this->conn = parent::getConn();
			//preparando a sql
			$this->query = $this->conn->prepare($this->select);
			//colocando o modo de exibição da query como ASSOCIAÇÃO (nome dos campos)
			$this->query->setFetchMode(PDO::FETCH_ASSOC);
		}
		
		private function getInstrucao() {
			if ($this->values) {
				foreach ($this->values as $link => $valor) {
					if ($link == 'limit' || $link == 'offset') {
						$valor = (int)$valor;
					}
					//garantido a integridade dos valores passados (bindvalue)
					$this->query->bindValue(":{$link}", $valor, (is_int($valor) ?PDO::PARAM_INT : PDO:: PARAM_STR));
					
				}
			}
			
		}
		private function executarInstrucao() {
			$this->conexao();
			try{
				//associando os atributos aos identificadores para a SQL
				$this->getInstrucao();
				$this->query->execute();
				// traz todas as linhas do registro
				$this->result = $this->query->fetchAll();
				
			}catch (PDOException $e) {
				$this->result = null;
				$this->msg = "<strong>Erro ao ler dados:</strong> {$e->getMessage()}";
			}
		}
		// GETTERS IMPORTANTES PARA ACESSO EXTERNO
		public function getResult(){
			return $this->result;
		}
    
        public function getRowCount() {
            return $this->query->rowCount();
    }
}
