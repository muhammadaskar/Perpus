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
