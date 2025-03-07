<x-layouts.app>

    <form action="/sites/{{ $site->id }}" method="post">
        @csrf
        @method('patch')

        <flux:fieldset>
            <!-- Name -->
            <flux:field>
                <flux:label>Site Name</flux:label>

                <flux:input wire:model="text" type="text" id="name" name="name" value="{{ $site->name }}" required/>

            </flux:field>

            <!-- URL -->
            <flux:field>
                <flux:label>URL</flux:label>

                <flux:input wire:model="text" type="text" id="url" name="url" value="{{ $site->url }}" required/>

            </flux:field>

            <!-- Desc -->
            <flux:field>
                <flux:label>Description</flux:label>

                <flux:input wire:model="text" type="text" id="description" name="description" value="{{ $site->description }}" required/>

            </flux:field>

            <div class="">
                    <flux:button><a href="/sites">Cancel</a></flux:button>
                    <flux:button type="submit" variant="danger">Submit</flux:button>
            </div>

        </flux:fieldset>
    </form>
</x-layouts.app>


