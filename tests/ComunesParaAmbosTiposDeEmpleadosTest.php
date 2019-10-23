<?php

require_once "DatosEmpleadoTest.php";

abstract class ComunesParaAmbosTiposDeEmpleadosTest extends \PHPUnit\Framework\TestCase {

	public function testObtenerNombreYApellido() {
	  $resultado = NOMBRE . " " . APELLIDO;
	  $ne = $this->crear();
	  $this->assertEquals($resultado, $ne->getNombreApellido());
	}

	public function testObtenerDNI() {
	  $ne = $this->crear();
	  $this->assertEquals(DNI, $ne->getDNI());
	}

	public function testSePuedeObtenerSalario() {
	  $ne = $this->crear();
	  $this->assertEquals(SALARIO, $ne->getSalario());
	}

	public function testSePuedeSetearYUsarGetSector(){
		$sectorParaAsignar = "Deposito";
		$ne = $this->crear();
		$ne->setSector($sectorParaAsignar);
		$this->assertEquals($sectorParaAsignar, $ne->getSector());
	}

	public function testUsarElMetodotostring() {
		$resultado = NOMBRE . " " . APELLIDO . " " . DNI . " " . SALARIO;
		$ne = $this->crear();
	  $this->assertEquals($resultado, $ne->__toString());
	}

	public function testNoSePuedeCrearConNombreVacio() {
	  $this->expectException(\Exception::class);
	  $ne = $this->crear($dni = DNI, $nombre = "", $apellido = APELLIDO, $salario = SALARIO);
	}

	public function testNoSePuedeCrearConApellidoVacio() {
	  $this->expectException(\Exception::class);
	  $ne = $this->crear($dni = DNI, $nombre = NOMBRE, $apellido = "", $salario = SALARIO);
	}

	public function testNoSePuedeCrearConDNIVacio() {
	  $this->expectException(\Exception::class);
	  $ne = $this->crear($dni = "", $nombre = NOMBRE, $apellido = APELLIDO, $salario = SALARIO);
	}

	public function testNoSePuedeCrearConSalarioVacio() {
	  $this->expectException(\Exception::class);
	  $ne = $this->crear($dni = DNI, $nombre = NOMBRE, $apellido = APELLIDO, $salario = "");
	}

	public function testElDNINoContieneLetras() {
		$this->expectException(\Exception::class);
		$ne = $this->crear($dni = "a1111111", $nombre = NOMBRE, $apellido = APELLIDO, $salario = SALARIO);
	}

	public function testElDNINoContieneCaracteresEspeciales() {
		$this->expectException(\Exception::class);
		$ne = $this->crear($dni = "!1111?1/", $nombre = NOMBRE, $apellido = APELLIDO, $salario = SALARIO);
	}

	public function testResultadoDeGetSectorCuandoSectorNoEstaEspedificado(){
		$ne = $this->crear();
		$this->assertEquals("No especificado", $ne->getSector());
	}
}
