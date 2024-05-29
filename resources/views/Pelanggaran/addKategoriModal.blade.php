<!-- Add Kategori Modal -->
<div class="modal fade" id="addKategoriModal" tabindex="-1" aria-labelledby="addKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKategoriModalLabel">Tambah Kategori Pelanggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Pelanggaran.storeKategori') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori:</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                </form>
                <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategoris as $kategori)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kategori->nama_kategori }}</td>
                            <td>
                                <button type="button" class="btn btn-primary edit-kategori-btn" 
                                    data-bs-toggle="modal" data-bs-target="#editKategoriModal" 
                                    data-kategori-id="{{ $kategori->id }}" 
                                    data-nama-kategori="{{ $kategori->nama_kategori }}">
                                    Edit
                                </button>
                                <form action="{{ route('Pelanggaran.destroyKategori', $kategori->id) }}" method="POST" style="display:inline;">
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

<!-- Edit Kategori Modal -->
<div class="modal fade" id="editKategoriModal" tabindex="-1" aria-labelledby="editKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKategoriModalLabel">Edit Kategori Pelanggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editKategoriForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="edit_nama_kategori" class="form-label">Nama Kategori:</label>
                        <input type="text" class="form-control" id="edit_nama_kategori" name="nama_kategori" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Kategori</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var editKategoriModal = document.getElementById('editKategoriModal');
    var editKategoriForm = document.getElementById('editKategoriForm');
    
    editKategoriModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var kategoriId = button.getAttribute('data-kategori-id');
        var namaKategori = button.getAttribute('data-nama-kategori');

        var editNamaKategoriInput = document.getElementById('edit_nama_kategori');
        editNamaKategoriInput.value = namaKategori;

        // Update form action
        editKategoriForm.action = '/kategori/' + kategoriId;
    });
});
</script>
