<div class="modal fade" id="editPelanggaranModal" tabindex="-1" aria-labelledby="editPelanggaranModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPelanggaranModalLabel">Edit Pelanggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPelanggaranForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit_nama_pelanggaran">Nama Pelanggaran:</label>
                        <input type="text" class="form-control" id="edit_nama_pelanggaran" name="nama_pelanggaran" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_id_kat_pelanggaran">Kategori Pelanggaran:</label>
                        <select class="form-control" id="edit_id_kat_pelanggaran" name="id_kat_pelanggaran" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_id_sub_kategori">Sub Kategori Pelanggaran:</label>
                        <select class="form-control" id="edit_id_sub_kategori" name="id_sub_kategori" required>
                            @foreach ($subKategories as $subKategori)
                            <option value="{{ $subKategori->id }}">{{ $subKategori->nama_sub_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_poin">Poin:</label>
                        <input type="number" class="form-control" id="edit_poin" name="poin" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Pelanggaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var editModal = document.getElementById('editPelanggaranModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Button that triggered the modal
        var id = button.getAttribute('data-id');
        var nama = button.getAttribute('data-nama');
        var kategori = button.getAttribute('data-kategori');
        var subkategori = button.getAttribute('data-subkategori');
        var poin = button.getAttribute('data-poin');

        var modalTitle = editModal.querySelector('.modal-title');
        var modalForm = editModal.querySelector('#editPelanggaranForm');
        var modalNama = editModal.querySelector('#edit_nama_pelanggaran');
        var modalKategori = editModal.querySelector('#edit_id_kat_pelanggaran');
        var modalSubkategori = editModal.querySelector('#edit_id_sub_kategori');
        var modalPoin = editModal.querySelector('#edit_poin');

        modalTitle.textContent = 'Edit Pelanggaran: ' + nama;
        modalForm.action = '/pelanggaran/' + id;
        modalNama.value = nama;
        modalKategori.value = kategori;
        modalSubkategori.value = subkategori;
        modalPoin.value = poin;

        // Update subcategories dropdown based on selected category
        axios.get('/subkategori/' + kategori)
            .then(function(response) {
                var subKategories = response.data;
                modalSubkategori.innerHTML = '<option value="">Pilih Sub Kategori</option>';
                subKategories.forEach(function(subKategori) {
                    var option = document.createElement('option');
                    option.value = subKategori.id;
                    option.text = subKategori.nama_sub_kategori;
                    if (subKategori.id == subkategori) {
                        option.selected = true;
                    }
                    modalSubkategori.appendChild(option);
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    });

    // Handle category change in the edit form
    document.getElementById('edit_id_kat_pelanggaran').addEventListener('change', function() {
        var katPelanggaranId = this.value;
        var subKategoriDropdown = document.getElementById('edit_id_sub_kategori');

        // Clear existing options
        subKategoriDropdown.innerHTML = '<option value="">Pilih Sub Kategori</option>';

        // Send Ajax request
        axios.get('/subkategori/' + katPelanggaranId)
            .then(function(response) {
                var subKategories = response.data;
                subKategories.forEach(function(subKategori) {
                    var option = document.createElement('option');
                    option.value = subKategori.id;
                    option.text = subKategori.nama_sub_kategori;
                    subKategoriDropdown.appendChild(option);
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    });
</script>
