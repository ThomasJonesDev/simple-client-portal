<x-layouts.app>
    <h1>Support</h1>

    <div class="justify-self-end">
        <form method="GET" action="/support/create">
            <flux:button variant="primary" type="submit">Submit new support ticket</flux:button>
        </form>
    </div>

    @foreach($support_tickets as $ticket)
        <flux:card class="my-2 grid grid-cols-2">
            <div>
                <p class="font-bold">{{ $ticket->subject }}</p>
                <p class="py-2">{{ $ticket->message }}</p>
            </div>
            <div class="justify-self-end">
                @if($ticket->status == 'OPEN')
                    <flux:badge color="orange" inset="top bottom">
                        <p>{{ $ticket->status }}</p>
                    </flux:badge>
                @else
                    <flux:badge color="green" inset="top bottom">
                        <p>{{ $ticket->status }}</p>
                    </flux:badge>
                @endif
            </div>
            <div class="align-text-bottom">
                <p>Created: {{ $ticket->created_at}}</p>
                <p>Last Updated:{{$ticket->updated_at }}</p>
            </div>

        </flux:card>
    @endforeach
</x-layouts.app>
