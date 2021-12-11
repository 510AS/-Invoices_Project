<?php

namespace Database\Factories;

use App\Models\invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{

    protected $model = invoice::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'invoice_number',
            'invoice_Date',
            'Due_date',
            'product',
            'section_id',
            'Amount_collection',
            'Amount_Commission',
            'Discount',
            'Value_VAT',
            'Rate_VAT',
            'Total',
            'Status',
            'Value_Status',
            'note',
            'Payment_Date',
        ];
    }
}
