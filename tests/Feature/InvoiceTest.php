<?php

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

uses(RefreshDatabase::class)->in('Feature');

beforeEach(function () {
    $this->user = User::factory()->create();
    Sanctum::actingAs($this->user);
});

it('can fetch a list of invoices', function () {
    Invoice::factory()->count(3)->create();

    $response = getJson('/api/invoices');

    $response->assertOk()
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'invoice_number',
                    'company_id',
                    'value',
                    'issue_date',
                    'due_date',
                    'status',
                    'created_at',
                    'updated_at',
                ]
            ]
        ]);
});

it('user can create a new invoice', function () {
    $invoiceData = Invoice::factory()->create()->toArray();

    $response = postJson('/api/invoices', $invoiceData);

    $response->assertCreated()
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'invoice_number',
                    'company_id',
                    'value',
                    'issue_date',
                    'due_date',
                    'status',
                    'created_at',
                    'updated_at',
                ]
            ]
        ])->assertJson([
           'data' => [
               'invoice_number' => $invoiceData['invoice_number'],
           ]
        ]);
    $this->assertDatabaseHas('invoices', ['invoice_number' => $invoiceData['invoice_number']]);
});

it('user can replace an invoice using PUT', function () {
    $invoice = Invoice::factory()->create();
    $replaceData = Invoice::factory()->make()->toArray();

    $response = putJson("/api/invoices/{$invoice->id}", $replaceData);

    $response->assertOk()
        ->assertJson([
            'data' => [
                'id' => $invoice->id,
                'invoice_number' => $replaceData['invoice_number'],
            ],
        ]);

    $this->assertDatabaseHas('invoices', ['id' => $invoice->id, 'invoice_number' => $replaceData['invoice_number']]);

});

it('user can delete an invoice', function () {
    $invoice = Invoice::factory()->create();

    $response = deleteJson("/api/invoices/{$invoice->id}");

    $response->assertNoContent();

    $this->assertDatabaseMissing('invoices', ['id' => $invoice->id]);
});
