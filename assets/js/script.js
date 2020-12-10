var base_url = $(".baseurl").val();
var pilihAlamat = 0;
var paket = 0;

$(document).ready(function () {
	bsCustomFileInput.init();
	$(".plengkap").hide();
	$(".ptransport").hide();
	$(".hTanggal").hide();
	$(".alamatz").hide();
	var alas = $(".alamatSaatIni").html();
	var alal = $(".alamatLain").html();
	$(".alamatSaatIni").hide();
	$(".alamatLain").hide();

	$(".bLengkap").click(function () {
		if ($("#session").val() != "") {
			$(".hTanggal").show(350);
			paket = 1;
			$(".pilihPaket").val("1");
			if (pilihAlamat == 1) {
				milihLengkap();
			}
		} else {
			$(".ptransport").hide(350);
			$(".plengkap").show(500);
		}
	});
	$(".bTransport").click(function () {
		if ($("#session").val() != "") {
			$(".hTanggal").show(350);
			$(".pilihPaket").val("2");
			paket = 2;
			if (pilihAlamat == 1) {
				milihTransport();
			}
		} else {
			$(".plengkap").hide(350);
			$(".ptransport").show(500);
		}
	});

	$(".aLain").click(function () {
		$(".ptransport").hide(350);
		$(".plengkap").hide(350);
		$(".alamatLain").html(alal);
		$(".alamatLain").show(500);
		$(".alamatSaatIni").hide(500);
		$(".alamatSaatIni").empty();
		ambilhotel();
		$(".aProvinsi").change(function () {
			var id = $(this).val();
			var urle = base_url + "travel/ambilKabupaten";
			$.ajax({
				type: "post",
				url: urle,
				dataType: "html",
				data: "id_provinsi=" + id,
				success: function (msg) {
					$(".aKabupaten").html(msg);
				},
			});
			if (paket == 1) {
				milihLengkap();
				$(".jenisTransport").prop("selectedIndex", 0);
				$(".transports").html("<option selected>Transportasi</option>");
			} else if (paket == 2) {
				milihTransport();
				$(".jenisTransport").prop("selectedIndex", 0);
				$(".transports").html("<option selected>Transportasi</option>");
			}
		});
		pilihAlamat = 1;
	});
	$(".aSaatIni").click(function () {
		$(".alamatSaatIni").html(alas);
		$(".alamatSaatIni").show(500);
		$(".alamatLain").hide(500);
		$(".alamatLain").empty();
		ambilhotel();
		pilihAlamat = 1;
		if (paket == 1) {
			milihLengkap();
			$(".jenisTransport").prop("selectedIndex", 0);
			$(".transports").html("<option selected>Transportasi</option>");
		} else if (paket == 2) {
			milihTransport();
			$(".jenisTransport").prop("selectedIndex", 0);
			$(".transports").html("<option selected>Transportasi</option>");
		}
	});
	$("#pilihtanggal").datepicker({
		dateFormat: "dd - MM - yy",
		minDate: "+1d",
		maxDate: "+30d",
		onSelect: function () {
			$(".alamatz").show(350);
		},
	});
	$(".jenisTransport, .jenisTransport2").change(function () {
		var id = $(this).val();
		var idprov = $(".aProvinsi").val();
		var travelprov = $(".travelprov").val();
		var urel = base_url + "travel/transportasi";
		$.ajax({
			type: "post",
			url: urel,
			dataType: "html",
			data:
				"id_transport=" + id + "&id_prov=" + idprov + "&travel=" + travelprov,
			success: function (msg) {
				$(".transports, .transports2").html(msg);
			},
		});
	});
	$(".upload_bukti").submit(function (e) {
		e.preventDefault();
		var datanya = new FormData(this);
		var ul = $(location).attr("href");
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
						text: "Bukti Berhasil di Upload!",
						icon: "success",
					}).then((result) => {
						if (result.value) {
							window.location.href = ul;
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
	$(".batalkan").click(function (e) {
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
									window.location.href = $(location).attr("href");
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
	$(".provinsi").change(function () {
		var id = $(this).val();
		var ul = base_url + "user/alamat/kabupaten";
		$.ajax({
			type: "post",
			url: ul,
			dataType: "html",
			data: "id_provinsi=" + id,
			success: function (msg) {
				$(".kabupaten").html(msg);
				ambildatakecamatan();
			},
		});
	});
	$(".kabupaten").change(ambildatakecamatan);
	function ambildatakecamatan() {
		var id = $(".kabupaten").val();
		var ul = base_url + "user/alamat/kecamatan";
		$.ajax({
			type: "post",
			url: ul,
			dataType: "html",
			data: "id_kabupaten=" + id,
			success: function (msg) {
				$(".kecamatan").html(msg);
				ambildatakelurahan();
			},
		});
	}
	$(".kecamatan").change(ambildatakelurahan);
	function ambildatakelurahan() {
		var id = $(".kecamatan").val();
		var ul = base_url + "user/alamat/kelurahan";
		$.ajax({
			type: "post",
			url: ul,
			dataType: "html",
			data: "id_kecamatan=" + id,
			success: function (msg) {
				$(".kelurahan").html(msg);
			},
		});
	}
	$(".editProfile").submit(function (e) {
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
						text: "Data Berhasil di Ubah!",
						icon: "success",
					}).then((result) => {
						if (result.value) {
							window.location.href = base_url + "user/profile";
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
	$(".ubahpassword").submit(function (e) {
		e.preventDefault();
		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success: function (sip) {
				if (sip == "Sukses") {
					Swal.fire("Sukses", "Password Berhasil di Perbarui", "success").then(
						(result) => {
							if (result.value) {
								window.location.href = base_url + "user/profile";
							}
						}
					);
				} else {
					Swal.fire("Gagal", "Password yang dimasukkan Tidak Sama", "warning");
				}
			},
		});
	});
	$(".printinv").click(function () {
		window.print();
	});
});

function ambilhotel() {
	var id = $(".travelprov").val();
	var idkab = $(".travelkab").val();
	var urlh = base_url + "travel/ambilhotel";
	$.ajax({
		type: "post",
		url: urlh,
		dataType: "html",
		data: "id_provinsi=" + id + "&idkab=" + idkab,
		success: function (sip) {
			$(".hotel").html(sip);
		},
	});
}

function milihLengkap() {
	$(".pilihPaket").val("1");
	$(".ptransport").hide(350);
	$(".jenisTransport2").removeAttr("name");
	$(".transports2").removeAttr("name");
	$(".jenisTransport").attr("name", "jenis_transport");
	$(".transports").attr("name", "transportasi");
	$(".plengkap").show(500);
}
function milihTransport() {
	$(".pilihPaket").val("2");
	$(".plengkap").hide(350);
	$(".jenisTransport").removeAttr("name");
	$(".transports").removeAttr("name");
	$(".jenisTransport2").attr("name", "jenis_transport");
	$(".transports2").attr("name", "transportasi");
	$(".ptransport").show(500);
}
