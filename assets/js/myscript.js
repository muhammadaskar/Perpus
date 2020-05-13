/*------------------- 
|   Author : 
        - Muhammad Askar
        - Last updated : 30 April
        - Location     : Sudiang, Kota Makassar
-------------------*/

/*------------------- 
|   SWEET ALERT    |
-------------------*/
const flashData = $('.flash-data').data('flashdata')

if (flashData) {
	Swal.fire({
		title: 'Buku',
		text: 'Berhasil ' + flashData,
		type: 'success'
	})
}

// hapus
$('.tombol-kembalikan').on('click', function (e) {
	e.preventDefault()

	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "buku akan dikembalikan!",
		type: 'warning',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'kembalikan!',
		cancelButtonText: 'Batal'
	}).then((result) => {
		if (result.value) {
			document.location.href = href
		}
	})
});

$('.kirim-email').on('click', function (e) {
	e.preventDefault();
	Swal.fire({
		title: 'Coming Soon'
	})
})

$('.edit-profile').on('click', function (e) {
	e.preventDefault();
	Swal.fire({
		title: 'Coming Soon'
	})
})

// konfirmasi keluar
$('.keluar').on('click', function (e) {
	e.preventDefault()

	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "ingin keluar!",
		type: 'warning',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya',
		cancelButtonText: 'Batal'
	}).then((result) => {
		if (result.value) {
			document.location.href = href
		}
	})
})

$('.peminjam').on('click', function () {
	$(".peminjam").addClass("active")
	$(".daftar-buku").removeClass("active")
})

$('.daftar-buku').on('click', function () {
	$(".daftar-buku").addClass("active")
	$(".peminjam").removeClass("active")
})

function validasiFile() {
	var inputFile = document.getElementById('image');
	var pathFile = inputFile.value;
	var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
	if (!ekstensiOk.exec(pathFile)) {
		Swal.fire(
			'Uppps',
			'Ektenssi tidak sesuai, silahkan upload file dengan ekstensi png, jpg, jpeg',
			'error'
		)
		inputFile.value = '';
		return false;
	} else {
		//Pratinjau gambar
		if (inputFile.files && inputFile.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				document.getElementById('pratinjauGambar').innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail mt-1" style="width: 200px"/>';
			};
			reader.readAsDataURL(inputFile.files[0]);
		}
	}
}

const flash = document.getElementById('flash')
