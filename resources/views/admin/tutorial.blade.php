@extends('admin.app')
@extends('components.footer.admin')
@extends('components.navbar.admin')
@extends('components.sidebar')@section('title', 'halaman admin')

@section('content')
<div class="flex justify-between mb-4">
    <h1 class="text-xl font-medium mb-4 text-gray-800">Data Tutorial</h1>

    <button id="modal-tambah" data-modal-target="default-modal" data-modal-show="default-modal"
     class="block text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none
      focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-emerald-600
       dark:hover:bg-emerald-700 dark:focus:ring-blue-800" type="button">
        Tambah
    </button>
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
                    Deskripsi
                </th>
                <th scope="col" class="px-6 py-3">
                    Gambar
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Aksi</span>
                </th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0
 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Tutorial
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8
                 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <div class="p-4 md:p-5 space-y-4">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-kategori">
                            <div class="mb-5">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Tutorial</label>
                                <input type="text" id="name" name="name" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm
                                 outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" required>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-3 mb-5">
                                <div class="w-full flex flex-col">
                                    <label for="id_category" class="mb-2 block text-sm font-medium">Kategori</label>
                                    <select name="id_category" id="id_category" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border
                                     border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600
                                      dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </select>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                                <textarea required id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 w-full 
                                rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"></textarea>
                            </div>
                            <div class="mb-5">
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                                <input accept="image/*" type="file" id="image" name="image" class="w-full text-sm text-gray-900 bg-gray-50 rounded-lg 
                                border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div>
                            <div class="flex items-end px-4 pt-4 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="default-modal" type="button" class="me-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 
                                focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10
                                 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                                <button type="submit" class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-blue-300 
                                font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-blue-800">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="module">
    $(function() {
        $.ajax({
            url: '/api/products',
            success: function({ data }) {
                let row = '';
                data.map(function(val, index) {
                    row += `
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 whitespace-nowrap dark:text-white">${index+1}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${val.name}</td>
                        <td>${val.description}</td>
                        <td><img src="/uploads/${val.image}" width="150"></td>
                        <td>
                            <button data-modal-target="default-modal" data-modal-show="default-modal" data-id="${val.id}" class="font-medium
                             text-blue-600 dark:text-blue-500 hover:underline modal-ubah">Ubah</button>
                            <a href="#" data-id="${val.id}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline btn-hapus">Hapus</a>
                        </td>
                    </tr>
                    `;
                });
                $('tbody').html(row);
            }
        });

        $.ajax({
            url: '/api/categories',
            success: function({ data }) {
                $.each(data, function(i, item) {
                    $('#id_category').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                });
            }
        });

        $(document).on('click', '.btn-hapus', function() {
            const id = $(this).data('id');
            const token = localStorage.getItem('token');

            const confirm_dialog = confirm('Apakah anda yakin?');
            if (confirm_dialog) {
                $.ajax({
                    url: '/api/products/' + id,
                    type: "DELETE",
                    headers: {
                        "Authorization": token
                    },
                    success: function(data) {
                        if (data.message === 'success') {
                            alert('Data berhasil dihapus');
                            location.reload();
                        }
                    }
                });
            }
        });

        $('#modal-tambah').click(function() {
            $('input[name="name"]').val('');
            $('textarea[name="description"]').val('');
            $('#default-modal').removeClass('hidden');
            $('.form-kategori').off('submit').on('submit', function(e) {
                e.preventDefault();
                const $form = $(this);
                const token = localStorage.getItem('token');
                const frmdata = new FormData(this);
                $.ajax({
                    url: '/api/products',
                    type: 'POST',
                    data: frmdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    headers: {
                        "Authorization": token
                    },
                    success: function(data) {
                        if (data.success) {
                            alert('Data berhasil ditambah');
                            location.reload();
                        }
                    }
                });
            });
        });

        $(document).on('click', '.modal-ubah', function() {
            const id = $(this).data('id');
            $.get('/api/products/' + id, function({ data }) {
                $('input[name="name"]').val(data.name);
                $('textarea[name="description"]').val(data.description);
                $('#default-modal').removeClass('hidden');
            });

            $('.form-kategori').off('submit').on('submit', function(e) {
                e.preventDefault();
                const $form = $(this);
                const token = localStorage.getItem('token');
                const frmdata = new FormData(this);
                $.ajax({
                    url: `/api/products/${id}`,
                    type: 'POST',
                    data: frmdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    headers: {
                        "Authorization": token,
                        'X-HTTP-Method-Override': 'PUT'
                    },
                    success: function(data) {
                        if (data.message === 'success') {
                            alert('Data berhasil diubah');
                            location.reload();
                        }
                    }
                });
            });
        });

        $(document).on('click', '[data-modal-hide="default-modal"]', function() {
            $('#default-modal').addClass('hidden');
        });
    });
</script>
@endpush
