<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class yearTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testPreviousMonths()
    {
        // Arrange
        $yourClassInstance = new YourClass(); // Create an instance of your class
        $yourClassInstance->currentMonth = 7; // Set initial month
        $yourClassInstance->currentYear = 2022; // Set initial year

        // Act
        $yourClassInstance->previousMonths();

        // Assert
        $this->assertEquals(1, $yourClassInstance->currentMonth); // Assuming initial month is 7
        $this->assertEquals(2021, $yourClassInstance->currentYear); // Assuming initial year is 2022
        // Add more assertions as needed

        // Optionally, you can use mocking to check if updateYear and updateMonthContainer are called
        $this->assertTrue($yourClassInstance->updateYearCalled);
        $this->assertTrue($yourClassInstance->updateMonthContainerCalled);
    }
}

