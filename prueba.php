<?php
public function testSePuedeCrearYObtenerComision() {
  $c = $this->crear("Nombre", "Apellido", 11111111, 35000, [2000,5000,1000,1000]);
  $this->assertEquals(112.5, $c->calcularComision());
}
}
