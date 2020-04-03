<div class="conteiner mt-3">
    <div class="row ml-4 mb-4">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row ml-4 mb-4">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/mahasiswa/cariData" method="POST">
                <div class="input-group mb-3 ml-4 col-lg-12">
                    <input type="text" class="form-control" placeholder="Masukkan Nama" id="keyword" name="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="tombolCari" type="submit">Cari</button>
                    </div>
                </div>
            </form>
            <ul>
                <h3>Daftar Mahasiswa</h3>
                <?php foreach ($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item
                    "><?= $mhs['nama'] ?>
                        <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Yakin ? ');">HAPUS</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']; ?>">UBAH</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary float-right ">DETAIL</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>


















<!-- Modal -->
<div class="modal fade" id="formModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="NIM">NIM</label>
                        <input type="text" class="form-control" id="NIM" name="NIM" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" id="kelas" name="kelas">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>