<?php

namespace App;

use MoneyBird\Invoice\Service;

class InvoiceRepository
{
    /**
     * @var Service
     */
    private $service;

    /**
     * InvoiceRepository constructor.
     * @param Service $service
     */
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function getById($invoiceId)
    {
        $invoice = $this->service->getByInvoiceId($invoiceId);

        return new Invoice(
            $invoice->invoiceId,
            $invoice->totalPriceInclTax,
            $invoice->totalPaid,
            $invoice->totalUnpaid
        );
    }
}
