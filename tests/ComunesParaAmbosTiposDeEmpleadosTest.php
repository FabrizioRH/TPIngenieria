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
	  $ne = $this->crear($nombre = "");
	}

	public function testNoSePuedeCrearConApellidoVacio() {
	  $this->expectException(\Exception::class);
	  $ne = $this->crear($apellido = "");
	}

	public function testNoSePuedeCrearConDNIVacio() {
	  $this->expectException(\Exception::class);
	  $ne = $this->crear($dni = "");
	}

	public function testNoSePuedeCrearConSalarioVacio() {
	  $this->expectException(\Exception::class);
	  $ne = $this->crear($salario = "");
	}

	public function testElDNINoContieneLetras() {
		$this->expectException(\Exception::class);
		$ne = $this->crear($dni = "11a11111");
	}

	public function testElDNINoContieneCaracteresEspeciales() {
		$this->expectException(\Exception::class);
		$ne = $this->crear($dni = "11!11?1/");
	}

	public function testResultadoDeGetSectorCuandoSectorNoEstaEspedificado(){
		$ne = $this->crear();
		$this->assertEquals("No especificado", $ne->getSector());
	}
}
