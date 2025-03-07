<x-layouts.app>
    <flux:table>
        <flux:table.columns>
            <flux:table.column>Invoice Number</flux:table.column>
            <flux:table.column>Invoice Date</flux:table.column>
            <flux:table.column>Due Date</flux:table.column>
            <flux:table.column>Amount</flux:table.column>
            <flux:table.column>Status</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach($invoices as $invoice)
                <flux:table.row>
                    <flux:table.cell>
                        {{ $invoice->invoice_number }}
                    </flux:table.cell>

                    <flux:table.cell>
                        {{ $invoice->invoice_date }}
                    </flux:table.cell>

                    <flux:table.cell>
                        {{ $invoice->due_date}}
                    </flux:table.cell>

                    <flux:table.cell>
                        {{ $invoice->invoice_amount }}
                    </flux:table.cell>

                    <flux:table.cell>
                        @if ($invoice->invoice_status == 'PAID')
                            <flux:badge color="green" inset="top bottom">
                                {{ $invoice->invoice_status }}
                            </flux:badge>
                        @else
                            <flux:badge color="red" inset="top bottom">
                                {{ $invoice->invoice_status }}
                            </flux:badge>
                        @endif
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
</x-layouts.app>
