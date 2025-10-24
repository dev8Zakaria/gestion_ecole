<?php
use PHPUnit\Framework\TestCase;

final class ConnexionTest extends TestCase {
    public function testEnvFileExists(): void {
        $this->assertFileExists(__DIR__ . '/../.env.example');
    }
}
