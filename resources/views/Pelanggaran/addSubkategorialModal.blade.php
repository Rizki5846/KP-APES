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
                                <a href="#" class="btn btn-warning btn-sm">Show</a>
                                <a href="#" class="btn btn-info btn-sm">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>