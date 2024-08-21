<?php

namespace App\Exceptions;

use RuntimeException;

class DriverException extends RuntimeException
{
    public static function driverNotFound(int $id = null): self
    {
        return new self("Driver not found: DriverException (ID: $id)");
    }

    public static function failedToCreateDriver(array $data): self
    {
        $message = "Failed to create driver: DriverException. \n" .
            "Validation errors: " . json_encode($data);
        return new self($message);
    }

    public static function failedToUpdateDriver(array $data): self
    {
        $message = "Failed to update driver: DriverException. \n" .
            "Validation errors: " . json_encode($data);
        return new self($message);
    }

    public static function failedToDeleteDriver(): self
    {
        return new self("Failed to delete driver: DriverException.");
    }
}
