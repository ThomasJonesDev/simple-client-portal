<x-layouts.app>

    <form action="/sites" method="post">
        @csrf
        <flux:fieldset>
            <!-- Name -->
            <flux:field>
                <flux:label>Site Name</flux:label>

                <flux:input wire:model="text" type="text" id="name" name="name" required/>

            </flux:field>

            <!-- URL -->
            <flux:field>
                <flux:label>URL</flux:label>

                <flux:input wire:model="text" type="text" id="url" name="url" required/>

            </flux:field>

            <!-- Desc -->
            <flux:field>
                <flux:label>Description</flux:label>

                <flux:input wire:model="text" type="text" id="description" name="description" required/>

            </flux:field>

            <div class="flex justify-end py-4">
                <div class="px-2">
                    <flux:button><a href="/sites">Cancel</a></flux:button>
                </div>
                <div class="px-2">
                    <flux:button type="submit" variant="danger">Submit</flux:button>
                </div>
            </div>

        </flux:fieldset>
    </form>
</x-layouts.app>
