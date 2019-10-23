<?php

require_once "ComunesParaAmbosTiposDeEmpleadosTest.php";
require_once "DatosEmpleadoTest.php";

class ParaEmpleadoPermanenteTest extends ComunesParaAmbosTiposDeEmpleadosTest {

		public function crear(
			// Datos para el método crear
			$nombre = NOMBRE,
			$apellido = APELLIDO,
			$dni = DNI,
			$salario = SALARIO,
			$fechaIngreso = null
		) {
			if (is_null($fechaIngreso)) {
				$fechaIngreso = new \DateTime();
			}

		  // Instancia la clase con los parámetross del método
			$ne = new \App\EmpleadoPermanente(
					$nombre,
					$apellido,
					$dni,
					$salario,
					$fechaIngreso
			);
			return $ne;
	}

	public function testGetFechaIngreso(){
			$ne = $this->crear();
			$this->assertEquals(is_a($ne->getFechaIngreso(), 'DateTime'), true);
	}

	public function testCalcularComision() {
			$fechaIngreso = new \DateTime("-2 years");
			$fechaActual = new \DateTime();
			$antiguedad = $fechaIngreso->diff($fechaActual);
			$ne = $this->crear($nombre = NOMBRE, $apellido = APELLIDO, $dni = DNI, $salario = SALARIO, $fechaIngreso = $fechaIngreso);
			$comision = $antiguedad->y . "%";
			$this->assertEquals($comision, $ne->calcularComision());
	}

	public function testCalcularIngresoTotal() {
			$fechaIngreso = new \DateTime("-2 years");
			$fechaActual = new \DateTime();
			$antiguedad = $fechaIngreso->diff($fechaActual);
			$ingresoTotal = SALARIO + ((SALARIO * $antiguedad->y ) / 100);
			$ne = $this->crear($nombre = NOMBRE, $apellido = APELLIDO, $dni = DNI, $salario = SALARIO, $fechaIngreso = $fechaIngreso);
			$this->assertEquals($ingresoTotal, $ne->calcularIngresoTotal());
	}

	public function testCalcularAntiguedad() {
			$fechaIngreso = new \DateTime("- 2 years");
			$fechaActual = new \DateTime();
			$antiguedad = $fechaIngreso->diff($fechaActual);
			$ne = $this->crear($nombre = NOMBRE, $apellido = APELLIDO, $dni =DNI, $salario = SALARIO, $fechaIngreso = $fechaIngreso);
			$this->assertEquals($ne->calcularAntiguedad(), $antiguedad->y);
	}

	public function testGetFechaDeIngresoSiLaFechaDeIngresoNoFueProporcionada(){
			$ne = $this->crear();
			$fechaDeHoy = new \DateTime();
			$resultadoEsperado = $fechaDeHoy->format('Y-m-d');
			$resultadoObtenido = $ne->getFechaIngreso();
			$resultadoObtenido = $resultadoObtenido->format('Y-m-d');
			$this->assertEquals($resultadoEsperado, $resultadoObtenido);
	}

	public function testCalcularAntiguedadSiLaFechaDeIngresoNoFueProporcionada(){
			$ne = $this->crear();
			$this->assertEquals("0" ,$ne->calcularAntiguedad());
	}

	public function testIngresoDeFechaFutura() {
			$this->expectException(\Exception::class);
			$fechaActual = new \DateTime();
			$fechaFutura = $fechaActual->add(new \DateInterval('P10D'));
			$ne = $this->crear($nombre = NOMBRE, $apellido = APELLIDO, $dni = DNI, $salario = SALARIO, $fechaIngreso = $fechaFutura);
	}
}
