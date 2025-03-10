<x-layouts.app>
    <form method="POST" action="{{ route('tickets.store') }}">
        @csrf
        <flux:fieldset>
            <flux:heading class="py-5">
                Please fill out the form. If we need to get in contact with you, will will contact you via your email account.
            </flux:heading>

            <flux:field>
                <flux:label>Subject</flux:label>

                <flux:input type="text" id="subject" name="subject" required/>
            </flux:field>

            <flux:field>
                <flux:label>Description</flux:label>
                <!-- TODO: Figure out why editor does not pass text -->
{{--                <flux:editor id="message" name="message" />--}}
                <flux:input id="message" name="message" class="h-100" required/>
            </flux:field>


            <div class="flex justify-end">
                <div class="px-2">
                    <flux:button><a href="{{ route('tickets') }}">Cancel</a></flux:button>
                </div>
                <div class="px-2">
                    <flux:button type="submit" variant="primary">Submit</flux:button>
                </div>
            </div>
        </flux:fieldset>
    </form>
</x-layouts.app>
