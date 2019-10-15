<?php

require_once "TestsComunesParaAmbosTiposDeEmpleados.php";
require_once "DatosEmpleado.php";

class TestsParaEmpleadoPermanente extends TestsComunesParaAmbosTiposDeEmpleados {

public function testGetFechaIngresoParaUnaFechaDeIngresoIngresadaManualmente() {
	$i = $this->crear("Nombre4", "Apellido4", "11111111", "35000", "2019-10-10");
	$this->assertEquals("2019-10-10", $i->getFechaIngreso());
}

public function testCalcularComisionConResultadoEsperadoRespectoAlDia141019() {
	$i = $this->crear("Nombre4", "Apellido4", "11111111", "35000", "2019-10-10");
	$this->assertEquals(4, $i->calcularComision());
}

public function testCalcularIngresoTotalConResultadoEsperadoRespectoAlDia141019() {
	$i = $this->crear("Nombre4", "Apellido4", "11111111", "35000", "2019-10-10");
	$this->assertEquals(36400, $i->calcularIngresoTotal());
}

public function testCalcularantiguedadConResultadoEsperadoRespectoAlDia141019() {
	$i = $this->crear("Nombre4", "Apellido4", "11111111", "35000", "2012-10-10");
	$this->assertEquals(2560, $i->calcularAntiguedad());
}

public function testGetFechaIngresoParaUnaFechaDeIngresoSinEspecificarConRespectoAlDia141019() {
	$i = $this->crear("Nombre4", "Apellido4", "11111111", "35000");
	$this->assertEquals("2019-10-14", $i->getFechaIngreso());
}

public function testCalcularAntiguedadParaUnaFechaDeIngresoSinEspecificarConRespectoAlDia141019() {
	$i = $this->crear("Nombre4", "Apellido4", "11111111", "35000");
	$this->assertEquals(0, $i->getFechaIngreso());
}

public function testNoSePuedeCrearEmpleadoConFechaDeIngresoPosteriorALaActualConRespectoAlDia141019() {
	$this->expectException(\Exception::class);
	$i = $this->crear("Nombre4", "Apellido4", "11111111", "35000", "2019-10-20");
}
