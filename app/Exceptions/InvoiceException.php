<?php

namespace App\Exceptions;

use Exception;

class InvoiceException extends Exception
{
    public static function invoiceNotFound(int $id = null): self
    {
        return new self("Invoice not found: InvoiceException (ID: $id)");
    }

    public static function failedToCreateInvoice(Exception $data): self
    {
        $message = "Failed to create invoice: InvoiceException. \n" .
            "Exception: " . json_encode($data);
        return new self($message);
    }

    public static function failedToUpdateInvoice(array $data): self
    {
        $message = "Failed to update invoice: InvoiceException. \n" .
            "Validation errors: " . json_encode($data);
        return new self($message);
    }

    public static function failedToDeleteInvoice(): self
    {
        return new self("Failed to delete invoice: InvoiceException.");
    }

    public static function dueDateShorterThanIssueDate(): self
    {
        return new self("Due date is shorter than issue date, verify the inputs.");
    }

    public static function companyIsDisable(): self
    {
        return new self("The company informed is disabled.");
    }

    public static function valueIsNegativeOrZero(): self
    {
        return new self("The invoice value is negative or zero.");
    }

    public static function tollValueIsNegativeOrZero(): self
    {
        return new self("The toll value informed is negative or zero.");
    }

    public static function invoiceNumberDuplicated(): self
    {
        return new self("The invoice number already exists in this company.");
    }

    public static function invoiceNumberCheckFailed(Exception $exception): self
    {
        return new self("Error on check invoice number: $exception");
    }
}
