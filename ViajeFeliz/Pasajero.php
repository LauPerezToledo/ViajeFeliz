<?php
class Pasajero{
    private $nombre;
    private $apellido;
    private $nroDocumento;
    private $telefono;

    public function __construct($nom, $ape, $dni, $tel){
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->nroDocumento = $dni;
        $this->telefono = $tel;
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

	public function getNroDocumento() {
		return $this->nroDocumento;
	}

	public function setNroDocumento($value) {
		$this->nroDocumento = $value;
	}

    public function setTelefono($telefono) {
		$this->nombre = $telefono;
	}

	public function getTelefono() {
		return $this->telefono;
	}


    public function __toString(){
        return"Nombre: ".$this->getNombre().
        "\nApellido: ".$this->getApellido().
        "\nNúmero de documento: ".$this->getNroDocumento().
        "\nNúmero de teléfono: ".$this->getTelefono()."\n";
    }
}