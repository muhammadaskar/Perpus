<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Perpus PTI <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    })
</script>

<script src="<?= base_url('assets/js/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('assets/'); ?>js/myscript.js"></script>

<script>
    function validasiFile() {
        var inputFile = document.getElementById('image');
        var pathFile = inputFile.value;
        var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
        if (!ekstensiOk.exec(pathFile)) {
            Swal.fire(
                'Uppps',
                'Ektensi file tidak sesuai, silahkan upload file dengan ekstensi png, jpg, jpeg',
                'error'
            )
            inputFile.value = '';
            return false;
        } else if (inputFile.files.length > 0) {

            for (const i = 0; i <= inputFile.files.length - 1; i++) {
                const fsize = inputFile.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file. 
                if (file > 2048) {
                    Swal.fire(
                        'Uppps',
                        'Ukuran file telalu besar',
                        'error'
                    )
                }
            }
        } else {
            //Pratinjau gambar
            if (inputFile.files && inputFile.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('pratinjauGambar').innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail mt-1" style="width: 200px"/>';
                };
                reader.readAsDataURL(inputFile.files[0]);
            }
        }
    }
</script>

</body>

</html>