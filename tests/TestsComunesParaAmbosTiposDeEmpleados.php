<?php

class TestsComunesParaAmbosTiposDeEmpleados extends \PHPUnit\Framework\TestCase {

// Pruebas para ambas clases

	public function testSePuedeCrearYObtenerNombreYApellido() {
	  $a = $this->crear("Nombre1", "Apellido1", "11111111", "35000");
	  $this->assertEquals("Nombre1 Apellido1", $a->getNombreApellido());
	}

	public function testSePuedeCrearYObtenerDNI() {
	  $b = $this->crear("Nombre1", "Apellido1", "11111111", "35000");
	  $this->assertEquals("11111111", $b->getDNI());
	}

	public function testSePuedeCrearYObtenerSalario() {
	  $c = $this->crear("Nombre1", "Apellido1", "11111111", "35000");
	  $this->assertEquals("35000", $c->getSalario());
	}

	public function testSePuedeCrearSetearSectorYObtenerSector() {
	  $d = $this->crear("Nombre1", "Apellido1", "11111111", "35000");
	  $d->setSector("Prueba de sector");
	  $this->assertEquals("Prueba de sector", $d->getSector());
	}

	public function testSePuedeCrearYUsarElMetodotostring() {
	  $e = $this->crear("Nombre1", "Apellido1", "11111111", "35000");
	  $this->assertEquals("Nombre1 Apellido 11111111 35000", $e->__toString());
	}

	public function testNoSePuedeCrearConNombreVacio() {
	  $this->expectException(\Exception::class);
	  $h = $this->crear("", "Apellido3", "11111111", "35000");
	}

	public function testNoSePuedeCrearConApellidoVacio() {
	  $this->expectException(\Exception::class);
	  $h = $this->crear("Nombre3", "", "11111111", "35000");
	}

	public function testNoSePuedeCrearConDNIVacio() {
	  $this->expectException(\Exception::class);
	  $h = $this->crear("Nombre3", "Apellido3", "", "35000");
	}

	public function testNoSePuedeCrearConSalarioVacio() {
	  $this->expectException(\Exception::class);
	  $h = $this->crear("Nombre3", "Apellido3", "11111111", "");
	}

	public function testElDNINoContieneLetras() {
		$this->expectException(\Exception::class);
		$h = $this->crear("Nombre3", "Apellido3", "11a11111", "35000");
	}

	public function testElDNINoContieneCaracteresEspeciales() {
		$this->expectException(\Exception::class);
		$h = $this->crear("Nombre3", "Apellido3", "11!11?1/", "35000");
	}

	public function testResultadoDeGetSectorCuandoSectorNoEstaEspedificado(){
		$h = $this->crear("Nombre3", "Apellido3", "11111111", "35000");
		$this->assertEquals("No especificado", $h->getSector());
	}

/*// Pruebas para clase EmpleadoEventual

	public function testSePuedeCrearYObtenerComision() {
	  $f = $this->crear("Nombre1", "Apellido1", "11111111", "35000", ["2000","5000","1000","1000"]);
	  $this->assertEquals(112.5, $f->calcularComision());
	}

	public function testSePuedeCrearYCalcularIngresoTotal() {
	  $g = $this->crear("Nombre2", "Apellido2", "11111111", "35000", ["2000","5000","1000","1000"]);
	  $this->assertEquals(35112.5, $g->calcularIngresoTotal());
	}

	public function testNoSePuedeCrearConMontoCero() {
	  $this->expectException(\Exception::class);
	  $h = $this->crear("Nombre3", "Apellido3", "11111111", "35000", ["2000","0","1000","1000"]);
	}

	public function testNoSePuedeCrearConMontoNegativo() {
	  $this->expectException(\Exception::class);
	  $i = $this->crear("Nombre4", "Apellido4", "11111111", "35000", ["2000","-5000","1000","1000"]);
	}
*/

//Pruebas para EmpleadoPermanente

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

}
