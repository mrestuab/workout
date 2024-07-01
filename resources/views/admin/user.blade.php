@extends('admin.app')
@extends('components.footer.admin')
@extends('components.navbar.admin')
@extends('components.sidebar')

@section('title', 'User')

@section('content')
<div class="flex justify-between mb-4">
    <h1 class="text-xl font-medium mb-4 text-gray-800">Data Member</h1>
</div>
<div class="relative overflow-x-auto sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 pb-4">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection

@push('js')
<script type="module">
    $(document).ready(function() {
        $.ajax({
            url: '/api/users', 
            method: 'GET',
            success: function(response) {
                let row = '';
                response.forEach(function(val, index) {
                    row += `
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 whitespace-nowrap dark:text-white">${index + 1}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${val.name}</td>
                            <td class="px-6 py-4">${val.email}</td>
                        </tr>
                    `;
                });
                $('tbody').html(row);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching users:', error);
            }
        });
    });
</script>
@endpush