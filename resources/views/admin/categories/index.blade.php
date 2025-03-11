<x-layouts.app>

    <div class="mb-4 flex justify-between items-center">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Categorías</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-blue text-xs">
            Nuevo
        </a>
    </div>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3" style="width: 10px;">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $category->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $category->name }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-blue text-xs">Editar</a>
                            <form id="fmrDatos" action="{{ route('admin.categories.destroy', $category) }}" method="post">
                                @method('delete')
                                @csrf                                
                                <button type="submit" class="btn btn-red text-xs">Eliminar</button>
                            </form>                            
                        </div>
                    </td>                               
                </tr>                    
                @endforeach                
            </tbody>
        </table>
    </div>

    <script>
        $('#fmrDatos').on('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "¿Esta seguro?",
                text: "No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Si, borrar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });            
        });
    </script>

</x-layouts.app>