<?php
class Viaje{
    private $codigo;
    private $destino;
    private $cantMaxima;
    private $pasajeros;
    private $responsable;

    public function __construct($cod, $des, $cantMax,$pasaj,$res){
        $this->codigo = $cod;
        $this->destino = $des;
        $this->cantMaxima = $cantMax;
        $this->pasajeros = $pasaj;
        $this->responsable = $res;
    }


	public function getCodigo() {
		return $this->codigo;
	}

	public function setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	public function getDestino() {
		return $this->destino;
	}

	public function setDestino($destino) {
		$this->destino = $destino;
	}

	public function getCantMaxima() {
		return $this->cantMaxima;
	}

	public function setCantMaxima($cantMaxima) {
		$this->cantMaxima = $cantMaxima;
	}

	public function getPasajeros() {
		return $this->pasajeros;
	}

	public function setPasajeros($pasajeros) {
		$this->pasajeros = $pasajeros;
	}

    public function getResponsable() {
		return $this->responsable;
	}
    public function setResponsable($value) {
		$this->responsable = $value;
	}

	public function modificarPasajero($dniP){
		$encontrado = false;
		$j=0;
		while($j < count($this->getPasajeros()) && !$encontrado){
			$pasajero = $this->getPasajeros()[$j]; 
			if ($pasajero->getNroDocumento() == $dniP){
				$encontrado = true;
				echo "Que dato del pasajero desa modificar?\n 1)Nombre \n 2)Apellido \n 3)Teléfono \n";
				$opc = trim(fgets(STDIN));
				switch($opc){
					case 1:
						echo "Ingrese el nuevo nombre\n";
						$nom = trim(fgets(STDIN));
						$pasajero->setNombre($nom);
						break;
					case 2:
						echo "Ingrese el nuevo apellido\n";
						$ape = trim(fgets(STDIN));
						$pasajero->setNombre($ape);
						break;
					case 3:
						echo "Ingrese el nuevo teléfono\n";
						$tel = trim(fgets(STDIN));
						$pasajero->setNombre($tel);
						break;
					default:
						"Ingrese una opcion válida\n";
				}
			}
		}
	}

	public function modificarResponsable(){
		echo "Que dato del responsable desa modificar? \n 1)Número de empleado \n 2)Número de licencia \n 3)Nombre \n 4)Apellido \n";
		$opc = trim(fgets(STDIN));
		$objResponsable = $this->getResponsable(); 
		switch($opc){
			case 1:
				echo "Ingrese el nuevo número de empleado\n";
				$nroEmp = trim(fgets(STDIN));
				$objResponsable->setNroEmpleado($nroEmp);
				break;
			case 2:
				echo "Ingrese el nuevo número de licencia\n";
				$nroLic = trim(fgets(STDIN));
				$objResponsable->setNroLicencia($nroLic);
				break;
			case 3:
				echo "Ingrese el nuevo nombre\n";
				$nom = trim(fgets(STDIN));
				$objResponsable->setNombre($nom);
				break;
			case 4:
				echo "Ingrese el nuevo apellido\n";
				$ape = trim(fgets(STDIN));
				$objResponsable->setNombre($ape);
				break;
			default:
				"Ingrese una opcion válida\n";
		}
	}
	
	private function repitePasajero($dni){
		$repite = false;
		$encontrado = false;
		$j = 0;
		while($j < count($this->getPasajeros()) && !$encontrado){
			$pasajero = $this->getPasajeros()[$j]; 
			if ($pasajero->getNroDocumento() == $dni){
				$encontrado = true;
				$repite = true;
			}
			$j++;
		
		}
		return $repite;
	}
	public function cargarPasajero(){
		$cargaExitosa = false;
		echo "Ingrese el número de documento\n";
		$dniP = trim(fgets(STDIN));
		if (!$this->repitePasajero($dniP)){
			echo "Ingrese el nombre del pasajero\n";
			$nomP = trim(fgets(STDIN));
			echo "Ingrese el apellido\n";
			$apeP = trim(fgets(STDIN));
			echo "Ingrese el número de telefono\n";
			$telP = trim(fgets(STDIN));
			$objPasajero = new Pasajero ($nomP, $apeP, $dniP, $telP);
			$colP = $this->pasajeros;
			array_push($colP, $objPasajero);
			$this->setPasajeros($colP);
			$cargaExitosa = true;
		}
		return $cargaExitosa;
		}

	public function cargarResponsable(){
		echo "Ingrese el número de empleado del responsable\n";
		$nroEmp = trim(fgets(STDIN));
		echo "Ingrese el número de licencia\n";
		$nroLic = trim(fgets(STDIN));
		echo "Ingrese el nombre\n";
		$nomR = trim(fgets(STDIN));
		echo "Ingrese el apellido\n";
		$apeR = trim(fgets(STDIN));
		$responsable = new ResponsableV($nroEmp, $nroLic, $nomR, $apeR); 
		$this->setResponsable($responsable);
	}

    public function __toString(){
       $cad = "";
       foreach($this->getPasajeros() as $pasajero){
        $cad.= $pasajero;
       }
        return 
        "Código: ".$this->codigo.
        "\nDestino: ".$this->destino.
        "\nCantidad Máxima de pasajeros: ". $this->cantMaxima.
        "\nLos pasajeros son: \n". $cad.
        "\nEl responsable del viaje es: \n".$this->getResponsable();
    }
}