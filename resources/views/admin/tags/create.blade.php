<x-layouts.app>
    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item :href="route('dashboard')">Dashboard</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.categories.index')">Etiquetas</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>Nuevo</flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="card">
        <form method="post" action="{{ route('admin.tags.store') }}">
            @csrf
            <flux:input label="Nombre" name="name" value="{{ old('name') }}" placeholder="Ingresa el nombre de la etiqueta" />
            <div class="flex justify-end mt-4">
                <flux:button variant="primary" type="submit">Enviar</flux:button>
            </div>           
         
        </form>
    </div>

</x-layouts.app>