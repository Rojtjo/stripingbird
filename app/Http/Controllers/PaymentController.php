<?php

namespace App\Http\Controllers;

use App\InvoiceRepository;

use App\Http\Requests;

class PaymentController extends Controller
{
    /**
     * @var InvoiceRepository
     */
    private $invoices;

    /**
     * PaymentController constructor.
     * @param InvoiceRepository $invoices
     */
    public function __construct(InvoiceRepository $invoices)
    {
        $this->invoices = $invoices;
    }

    /**
     * @param string $invoiceId
     * @return \Illuminate\View\View
     */
    public function showPaymentPage($invoiceId)
    {
        $invoice = $this->invoices->getById($invoiceId);

        if($invoice->hasBeenPaid()) {
            return view('payment.paid');
        }

        return view('payment.show', [
            'invoice' => $invoice
        ]);
    }
}
