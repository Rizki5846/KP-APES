<!-- Add Sub Kategori Modal -->
<div class="modal fade" id="addSubKategoriModal" tabindex="-1" aria-labelledby="addSubKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubKategoriModalLabel">Tambah Sub Kategori Pelanggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Pelanggaran.storeSubKategori') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_kat_pelanggaran">Kategori Pelanggaran:</label>
                        <select class="form-control" id="id_kat_pelanggaran" name="id_kat_pelanggaran" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_sub_kategori" class="form-label">Nama Sub Kategori:</label>
                        <input type="text" class="form-control" id="nama_sub_kategori" name="nama_sub_kategori" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Sub Kategori</button>
                </form>

                <hr>

                <h5 class="mt-4">Daftar Sub Kategori Pelanggaran</h5>
                <table class="table table-striped mt-2">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Sub Kategori</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subKategories as $subKategori)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $subKategori->nama_sub_kategori }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm edit-subkategori-btn" 
                                        data-bs-toggle="modal" data-bs-target="#editSubKategoriModal" 
                                        data-subkategori-id="{{ $subKategori->id }}" 
                                        data-nama-subkategori="{{ $subKategori->nama_sub_kategori }}" 
                                        data-id-kat-pelanggaran="{{ $subKategori->id_kat_pelanggaran }}">
                                    Edit
                                </button>
                                <form action="{{ route('Pelanggaran.destroySubKategori', $subKategori->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Edit Sub Kategori Modal -->
<div class="modal fade" id="editSubKategoriModal" tabindex="-1" aria-labelledby="editSubKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubKategoriModalLabel">Edit Sub Kategori Pelanggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editSubKategoriForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit_id_kat_pelanggaran">Kategori Pelanggaran:</label>
                        <select class="form-control" id="edit_id_kat_pelanggaran" name="id_kat_pelanggaran" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_nama_sub_kategori" class="form-label">Nama Sub Kategori:</label>
                        <input type="text" class="form-control" id="edit_nama_sub_kategori" name="nama_sub_kategori" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Sub Kategori</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var editSubKategoriModal = document.getElementById('editSubKategoriModal');
    var editSubKategoriForm = document.getElementById('editSubKategoriForm');
    
    editSubKategoriModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var subKategoriId = button.getAttribute('data-subkategori-id');
        var namaSubKategori = button.getAttribute('data-nama-subkategori');
        var idKatPelanggaran = button.getAttribute('data-id-kat-pelanggaran');

        var editNamaSubKategoriInput = document.getElementById('edit_nama_sub_kategori');
        var editIdKatPelanggaranSelect = document.getElementById('edit_id_kat_pelanggaran');

        editNamaSubKategoriInput.value = namaSubKategori;
        editIdKatPelanggaranSelect.value = idKatPelanggaran;

        // Update form action
        editSubKategoriForm.action = '/subkategori/' + subKategoriId;
    });
});
</script>
