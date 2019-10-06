<?php

public function testSePuedeCrearYObtenerComision() {
  $c = $this->crear("Nombre1", "Apellido1", 11111111, 35000, [2000,5000,1000,1000]);
  $this->assertEquals(112.5, $c->calcularComision());
}

public function testSePuedeCrearYCalcularIngresoTotal() {
  $c = $this->crear("Nombre2", "Apellido2", 11111111, 35000, [2000,5000,1000,1000]);
  $this->assertEquals(35112.5, $c->calcularIngresoTotal());
}

public function testNoSePuedeCrearConMontoCero() {
  $this->expectException(\Exception::class);
  $c = $this->crear("Nombre3", "Apellido3", 11111111, 35000, [2000,0,1000,1000]);
}

public function testNoSePuedeCrearConMontoNegativo() {
  $this->expectException(\Exception::class);
  $c = $this->crear("Nombre4", "Apellido4", 11111111, 35000, [2000,-1000,1000,1000]);
}

}
