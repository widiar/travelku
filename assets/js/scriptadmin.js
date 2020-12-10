var base_url = $(".baseurl").val();
$(".pulau").change(function () {
	var id = $(this).val();
	var urel = base_url + "admin/destinasiLokasi/provinsi";
	$.ajax({
		type: "post",
		url: urel,
		dataType: "html",
		data: "id_pulau=" + id,
		success: function (ok) {
			$("#provinsi").html(ok).selectpicker("refresh");
			$(".provinsi").selectpicker("refresh");
			ambildatakabupaten();
		},
	});
});
$("#provinsi").change(ambildatakabupaten);
function ambildatakabupaten() {
	var id = $("#provinsi").val();
	urel = base_url + "admin/destinasiLokasi/kabupaten";
	$.ajax({
		type: "post",
		url: urel,
		dataType: "html",
		data: "id_provinsi=" + id,
		success: function (sip) {
			$("#kabupaten").html(sip).selectpicker("refresh");
			$(".kabupaten").selectpicker("refresh");
		},
	});
}
$(document).ready(function () {
	$(".tDesti").submit(function (e) {
		e.preventDefault();
		var datanya = new FormData(this);
		datanya.append("deskripsi", CKEDITOR.instances.deskripsiD.getData());
		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			enctype: "multipart/form-data",
			data: datanya,
			contentType: false,
			cache: false,
			processData: false,
			success: function (data) {
				console.log(data);
				if (data == "Sukses") {
					Swal.fire({
						title: "Berhasil",
						text: "Data Berhasil di Kerjakan!",
						icon: "success",
					}).then((result) => {
						if (result.value) {
							window.location.href = base_url + "admin/destinasi";
						}
					});
				} else {
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "Terjadi Kesalahan Data",
					});
				}
			},
		});
	});
	$(".elok").submit(function (e) {
		e.preventDefault();
		var datanya = new FormData(this);
		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			enctype: "multipart/form-data",
			data: datanya,
			contentType: false,
			cache: false,
			processData: false,
			success: function (data) {
				if (data == "Sukses") {
					Swal.fire({
						title: "Berhasil",
						text: "Data Berhasil di Kerjakan!",
						icon: "success",
					}).then((result) => {
						if (result.value) {
							window.location.href = base_url + "admin/lokasi";
						}
					});
				} else {
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "Terjadi Kesalahan Data",
					});
				}
			},
		});
	});
	$(".hapusLokasi").click(function (e) {
		e.preventDefault();
		Swal.fire({
			title: "Anda Yakin?",
			text: "Anda tidak bisa mengembalikkan lagi!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yap, Hapus!",
		}).then((result) => {
			if (result.value) {
				Swal.fire("Terhapus!", "Lokasi sudah di hapus.", "success").then(
					(result) => {
						if (result.value) {
							window.location.href = $(this).attr("href");
						}
					}
				);
			}
		});
	});
	$(".tLokasi").submit(function (e) {
		e.preventDefault();
		var datanya = new FormData(this);
		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			enctype: "multipart/form-data",
			data: datanya,
			contentType: false,
			cache: false,
			processData: false,
			success: function (data) {
				if (data == "Sukses") {
					Swal.fire({
						title: "Berhasil",
						text: "Data Berhasil di Tambah!",
						icon: "success",
					}).then((result) => {
						if (result.value) {
							window.location.href = base_url + "admin/lokasi";
						}
					});
				} else {
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "Terjadi Kesalahan Data",
					});
				}
			},
		});
	});
	$(".tTransport").submit(function (ev) {
		ev.preventDefault();
		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success: function (sip) {
				if (sip == "Sukses") {
					Swal.fire("Sukses", "Data Berhasil di Perbarui", "success").then(
						(result) => {
							if (result.value) {
								window.location.href = base_url + "admin/transportasi";
							}
						}
					);
				} else {
					Swal.fire("Gagal", "Data Gagal di Perbarui", "warning");
				}
			},
		});
	});
	$(".hapusTransportasi").click(function (e) {
		e.preventDefault();
		Swal.fire({
			title: "Anda Yakin?",
			text: "Anda tidak bisa mengembalikkan lagi!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yap, Hapus!",
		}).then((result) => {
			if (result.value) {
				Swal.fire("Terhapus!", "Transportasi sudah di hapus.", "success").then(
					(result) => {
						if (result.value) {
							window.location.href = $(this).attr("href");
						}
					}
				);
			}
		});
	});
	$(".tHotel").submit(function (x) {
		x.preventDefault();
		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success: function (msg) {
				if (msg == "Sukses") {
					Swal.fire("Sukses", "Data Berhasil di Tambahkan", "success").then(
						(result) => {
							if (result.value) {
								window.location.href = base_url + "admin/hotel";
							}
						}
					);
				} else {
					Swal.fire("Gagal", "Data Gagal di Perbarui", "warning");
				}
			},
		});
	});
	$(".lihatBukti").click(function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr("href"),
			dataType: "json",
			success: function (ntap) {
				$(".pembayaranmodal").html(ntap[0]);
				$(".pembayaranmodalfooter").html(ntap[1]);
			},
		});
		$("#pembayaran").modal("show");
	});
	$(".ubahstatus").click(function (e) {
		e.preventDefault();
		ul = $(this).attr("href");
		Swal.fire({
			title: "Anda Yakin?",
			text: "Anda akan mengubah status pemesanan",
			icon: "question",
			showCancelButton: true,
			confirmButtonText: "Yap, Yakin!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: ul,
					success: function (msg) {
						if (msg == "Sukses") {
							Swal.fire(
								"Berhasil",
								"Pemesanan Berhasil Di Ubah",
								"success"
							).then((result) => {
								if (result.value) {
									window.location.href = base_url + "admin/invoice";
								}
							});
						} else {
							Swal.fire("Gagal", "Pemesanan Gagal di Ubah", "warning");
						}
					},
				});
			}
		});
	});
});

function bukti() {
	$(".konfirm").click(function (e) {
		e.preventDefault();
		$.ajax({
			url: $(this).attr("href"),
			success: function (msg) {
				if (msg == "Sukses") {
					Swal.fire(
						"Sukses",
						"Pembayaran Berhasil di Konfirmasi",
						"success"
					).then((result) => {
						if (result.value) {
							window.location.href = $(location).attr("href");
						}
					});
				} else {
					Swal.fire("Gagal", "Pembayaran Gagal di Konfirmasi", "error");
				}
			},
		});
	});
}
function hapusbukti() {
	$(".hapuskonfirm").click(function (e) {
		e.preventDefault();
		Swal.fire({
			title: "Anda Yakin?",
			text: "Anda tidak bisa mengembalikkan lagi!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yap!",
		}).then((result) => {
			if (result.value) {
				Swal.fire(
					"Berhasil!",
					"Bukti sudah di hapus (Tidak Valid).",
					"success"
				).then((result) => {
					if (result.value) {
						window.location.href = $(this).attr("href");
					}
				});
			}
		});
	});
}
