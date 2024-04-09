<?php
class ResponsableV{
    private $nroEmpleado;
    private $nroLicencia;
    private $nombre;
    private $apellido;

    public function __construct($nroEmp, $nroLic, $nom, $ape){
        $this->nroEmpleado = $nroEmp;
        $this->nroLicencia = $nroLic;
        $this->nombre = $nom;
        $this->apellido = $ape;

    }

	public function getNroEmpleado() {
		return $this->nroEmpleado;
	}

	public function setNroEmpleado($value) {
		$this->nroEmpleado = $value;
	}

	public function getNroLicencia() {
		return $this->nroLicencia;
	}

	public function setNroLicencia($value) {
		$this->nroLicencia = $value;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function setNombre($value) {
		$this->nombre = $value;
	}

	public function getApellido() {
		return $this->apellido;
	}

	public function setApellido($value) {
		$this->apellido = $value;
	}

    public function __toString(){
        return
        "Número de empleado: ".$this->getNroEmpleado().
        "\nNúmero de licencia: ".$this->getNroLicencia().
        "\nNombre: ". $this->getNombre().
        "\nApellido: ". $this->getApellido()."\n";
    }
        
}