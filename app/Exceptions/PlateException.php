<?php

namespace App\Exceptions;

use RuntimeException;

class PlateException extends RuntimeException
{
    public static function plateNotFound(int $id = null): self
    {
        return new self("Plate not found: PlateException (ID: $id)");
    }

    public static function failedToCreatePlate(array $data): self
    {
        $message = "Failed to create plate: PlateException. \n" .
            "Validation errors: " . json_encode($data);
        return new self($message);
    }

    public static function failedToUpdatePlate(array $data): self
    {
        $message = "Failed to update plate: PlateException. \n" .
            "Validation errors: " . json_encode($data);
        return new self($message);
    }

    public static function failedToDeletePlate(): self
    {
        return new self("Failed to delete plate: PlateException.");
    }
}
