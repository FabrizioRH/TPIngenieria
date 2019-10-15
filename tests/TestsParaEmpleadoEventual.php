<?php

require_once "TestsComunesParaAmbosTiposDeEmpleados.php";
require_once "DatosEmpleado.php";

class TestsParaEmpleadoEventual extends TestsComunesParaAmbosTiposDeEmpleados {

    public function crear (
        // Datos para el método crear
        $nombre = NOMBRE,
        $apellido = APELLIDO,
        $dni = DNI,
        $salario = SALARIO,
        $montos = MONTOS
      ) {

        // Instancia la clase con los parámetross del método
        $ne = new \App\EmpleadoEventual(
            $nombre,
            $apellido,
            $dni,
            $salario,
            $montos
        );
        return $ne;
    }

    public function testSePuedeObtenerComision() {
        $montosDeLasVentas = [2000, 5000, 1000, 1000];
        $total = ((2000 + 5000 + 1000 + 1000) / 4) * 0.05;
        $ne = $this->crear($salario = SALARIO, $montos = $montosDeLasVentas);
        $this->assertEquals($total, $ne->calcularComision());
    }

    public function testSePuedeCalcularIngresoTotal() {
        $montosDeLasVentas = [2000, 5000, 1000, 1000];
        $comision = ((2000 + 5000 + 1000 + 1000) / 4) * 0.05;
        $total = $comision + SALARIO;
        $ne = $this->crear($salario = SALARIO, $montos=$montosDeLasVentas);
        $this->assertEquals($total, $ne->calcularIngresoTotal());
    }

    public function testNoSePuedeCrearConMontoCero() {
        $this->expectException(\Exception::class);
        $ne = $this->crear($salario=SALARIO, $montosDeLasVentas=[2000, 0, 1000, 1000]);
    }

    public function testNoSePuedeCrearConMontoNegativo() {
        $this->expectException(\Exception::class);
        $ne = $this->crear($salario=SALARIO, $montosDeLasVentas=[2000, -5000, 1000, 1000]);
    }
}
