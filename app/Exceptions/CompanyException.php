<?php

namespace App\Exceptions;

use RuntimeException;

class CompanyException extends RuntimeException
{
    public static function companyNotFound(int $id = null): self
    {
        return new self("Company not found: CompanyException (ID: $id)");
    }

    public static function failedToCreateCompany(array $data): self
    {
        $message = "Failed to create company: CompanyException. \n" .
            "Validation errors: " . json_encode($data);
        return new self($message);
    }

    public static function failedToUpdateCompany(array $data): self
    {
        $message = "Failed to update company: CompanyException. \n" .
            "Validation errors: " . json_encode($data);
        return new self($message);
    }

    public static function failedToDeleteCompany(): self
    {
        return new self("Failed to delete company: CompanyException.");
    }
}
