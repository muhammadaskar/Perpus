<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>

    <div class="row">
        <div class="col-lg-10">
            <?= form_open_multipart('admin/tambahBuku'); ?>
            <div class="form-group row">
                <label for="kodeBuku" class="col-sm-2 col-form-label">Kode Buku</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="kodeBuku" aria-describedby="emailHelp" name="kode_buku">
                    <?= form_error('kode_buku', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="JuduBuku" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="JuduBuku" aria-describedby="emailHelp" name="judul_buku">
                    <?= form_error('judul_buku', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-6">
                    <select id="kategori" name="kategori" type="text" class="form-control" id="formGroupExampleInput" placeholder="Kategori" name="kategori">
                        <option value="">Pilih Kategori</option>
                        <option value="komik">Komik</option>
                        <option value="novel">Novel</option>
                        <option value="kamus">Kamus</option>
                        <option value="sains">Sains</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="pengarang" aria-describedby="emailHelp" name="pengarang">
                    <?= form_error('pengarang', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="tahun_terbit" aria-describedby="emailHelp" name="tahun_terbit">
                    <?= form_error('tahun_terbit', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Gambar</div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button class="btn btn-primary mx-auto d-block" type="submit">Simpan</button>
                </div>
            </div>
            </form>
        </div>
    </div>


</div>
</div>