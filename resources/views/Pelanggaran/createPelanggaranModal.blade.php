<div class="modal fade" id="createPelanggaranModal" tabindex="-1" aria-labelledby="createPelanggaranModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPelanggaranModalLabel">Tambah Pelanggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Pelanggaran.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_pelanggaran">Nama Pelanggaran:</label>
                        <input type="text" class="form-control" id="nama_pelanggaran" name="nama_pelanggaran" required>
                    </div>
                    <div class="form-group">
                        <label for="id_kat_pelanggaran">Kategori Pelanggaran:</label>
                        <select class="form-control" id="id_kat_pelanggaran" name="id_kat_pelanggaran" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_sub_kategori">Sub Kategori Pelanggaran:</label>
                        <select class="form-control" id="id_sub_kategori" name="id_sub_kategori" required>
                            @foreach ($subKategories as $subKategori)
                            <option value="{{ $subKategori->id }}">{{ $subKategori->nama_sub_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="poin">Poin:</label>
                        <input type="number" class="form-control" id="poin" name="poin" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Pelanggaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('id_kat_pelanggaran').addEventListener('change', function() {
        var katPelanggaranId = this.value;
        var subKategoriDropdown = document.getElementById('id_sub_kategori');

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
