
<?php

require_once "ComunesParaAmbosTiposDeEmpleadosTest.php";
require_once "DatosEmpleadoTest.php";

class ParaEmpleadoEventualTest extends ComunesParaAmbosTiposDeEmpleadosTest {

    public function crear (
        // Datos para el método crear   
	$montos = MONTOS,    
	$dni = DNI,    
	$salario = SALARIO,
	$nombre = NOMBRE,
        $apellido = APELLIDO
      ) {

        // Instancia la clase con los parámetross del método
        $ne = new \App\EmpleadoEventual(
	    $montos,	
	    $dni,
	    $salario,
	    $nombre,
            $apellido
        );
        return $ne;
    }

    public function testSePuedeObtenerComision() {
        $montosDeLasVentas = [2000, 5000, 1000, 1000];
        $total = ((2000 + 5000 + 1000 + 1000) / 4) * 0.05;
        $ne = $this->crear($montos = $montosDeLasVentas, $dni = DNI, $salario = SALARIO);
        $this->assertEquals($total, $ne->calcularComision());
    }

    public function testSePuedeCalcularIngresoTotal() {
        $montosDeLasVentas = [2000, 5000, 1000, 1000];
        $comision = ((2000 + 5000 + 1000 + 1000) / 4) * 0.05;
        $total = $comision + SALARIO;
        $ne = $this->crear($montos = $montosDeLaVentas, $dni = DNI, $salario = SALARIO);
        $this->assertEquals($total, $ne->calcularIngresoTotal());
    }

    public function testNoSePuedeCrearConMontoCero() {
        $this->expectException(\Exception::class);
        $ne = $this->crear($montosDeLasVentas = [2000,0,1000,1000], $dni = DNI, $salario=SALARIO);
    }

    public function testNoSePuedeCrearConMontoNegativo() {
        $this->expectException(\Exception::class);
        $ne = $this->crear($montosDeLasVentas = [2000, -5000, 1000, 1000], $dni = DNI, $salario = SALARIO);
    }
}
