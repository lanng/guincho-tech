<?php

namespace App\Exceptions;

use RuntimeException;

class InsuranceException extends RuntimeException
{
    public static function insuranceNotFound(int $id = null): self
    {
        return new self("Insurance not found: InsuranceException (ID: $id)");
    }

    public static function failedToCreateInsurance(array $data): self
    {
        $message = "Failed to create insurance: InsuranceException. \n" .
            "Validation errors: " . json_encode($data);
        return new self($message);
    }

    public static function failedToUpdateInsurance(array $data): self
    {
        $message = "Failed to update insurance: InsuranceException. \n" .
            "Validation errors: " . json_encode($data);
        return new self($message);
    }

    public static function failedToDeleteInsurance(): self
    {
        return new self("Failed to delete insurance: InsuranceException.");
    }
}
