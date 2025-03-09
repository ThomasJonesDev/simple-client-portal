<x-layouts.app>
    <div class="flex justify-self-end py-4 ">
        <form method="GET" action="/sites">
            <flux:input.group>
                <flux:input class="form-control" placeholder="Search..." name="search"/>
                <flux:button icon="magnifying-glass" type="submit">search</flux:button>
            </flux:input.group>
        </form>
    </div>
        <flux:table>
            <flux:table.columns>
                <flux:table.column>Site Name</flux:table.column>
                <flux:table.column>URL</flux:table.column>
                <flux:table.column>Description</flux:table.column>
                <flux:table.column>Created</flux:table.column>
                <flux:table.column>Last Updated</flux:table.column>
                <flux:table.column></flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                @foreach($sites as $site)
                    <flux:table.row>
                        <flux:table.cell>{{ $site->name }}</flux:table.cell>
                        <flux:table.cell>{{ $site->url }}</flux:table.cell>
                        <flux:table.cell >{{ $site->description }}</flux:table.cell>
                        <flux:table.cell>{{ $site->created_at }}</flux:table.cell>
                        <flux:table.cell>{{ $site->updated_at }}</flux:table.cell>
                        <flux:table.cell><flux:button variant="primary"><a href="/sites/{{ $site->id }}/edit">Edit</a></flux:button></flux:table.cell>
                        <flux:table.cell>
                            <form method="POST" action="/sites/{{ $site->id }}">
                                @csrf
                                @method('DELETE')
                                <flux:button type="submit" variant="danger">Delete</flux:button>
                            </form>
                        </flux:table.cell>
                    </flux:table.row>
                @endforeach
            </flux:table.rows>
        </flux:table>

    <div>
        <flux:separator />
    </div>
    <div class="flex justify-end py-6 px-6">
        <flux:button><a href="/sites/create">Add</a></flux:button>
    </div>
</x-layouts.app>
