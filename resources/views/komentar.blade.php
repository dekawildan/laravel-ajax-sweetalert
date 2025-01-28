<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>

    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="sweetalert2.css">
</head>
<body>
    
<header class="float-left w-100 m-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/')}}">Buku Tamu</a>
        </div>
    </nav>
</header>
<article class="float-left w-100 m-0">
    <section class="bg-primary w-100 text-center mx-0 my-0 float-left" style="height: 250px;">
        <h2 class="text-white pt-5" style="margin-top:30px;">SELAMAT DATANG DI WEBSITE PERSONAL</h2>
    </section>
    <section class="bg-secondary w-100 px-3 py-3 mx-0 my-0 float-left">
        <section class="bg-light px-3 py-3">
            <button type="button" class="btn btn-warning" id="pesan">Tampilkan</button> 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahkomentar">+ Tambah Komentar</button>
            <h3 class="text-center"> Data Komentar</h3>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Komentar</th>
                    </tr>
                </thead>
                <tbody id="datakomentar">
                    @foreach($komentar as $k)
                    <tr>
                        <td>{{$k->id_komentar}}</td>
                        <td>{{$k->nama}}</td>
                        <td>{{$k->email}}</td>
                        <td>{{$k->komentar}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </section>
</article>
<footer class="bg-dark text-white text-center p-3 float-left w-100 m-0">
    Copyright &copy; 2025. www.bisasoftware.id All Reserved
</footer>

<div class="modal" id="tambahkomentar" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Komentar</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama..." required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email..." required>
                    </div>
                    <div class="form-group">
                        <label for="komentar">Komentar</label>
                        <textarea name="komentar" id="komentar" class="form-control" placeholder="Masukkan pesan..." required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="kirim" class="btn btn-primary">Kirim</button>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

    <script src="jquery.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="sweetalert2.all.js"></script>
    <script>
        $(document).ready(function() {
            $('#pesan').on("click", function() {
                Swal.fire({
                    title:'Informasi',
                    text:'Terima kasih atas kunjungan Anda',
                    icon:'info',
                    timer: 2000,
                    showConfirmButton: false
                });
            });

            $('#kirim').on("click", function() {
                var nama = $('#nama').val();
                var email = $('#email').val();
                var komentar = $('#komentar').val();
            if(nama == "" || email == "" || komentar == "") {
                Swal.fire({
                    title: 'Gagal',
                    text: 'Data tidak boleh kosong',
                    icon: 'error',
                    confirmButtonText: 'Tutup'
                });
                return false;
            } else {
                $.ajax({
                    url: "{{url('/komentar')}}",
                    type: "POST",
                    data: {
                        nama: nama,
                        email: email,
                        komentar: komentar,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Komentar berhasil ditambahkan',
                            icon: 'success',
                            showConfirmButton: true,
                            allowOutsideClick: false,
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            /* if(result.value) {
                                location.reload();
                            } */
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: "{{url('/komentar')}}", // Ganti dengan route yang sesuai
                                    method: 'GET',
                                    success: function(response) {
                                        let datakomen = $('#datakomentar');
                                        $.each(response, function(komentar, komentar) {
                                            let row = $('<tr></tr>');
                                            row.append('<td>' + komentar.id_komentar + '</td>');
                                            row.append('<td>' + komentar.nama + '</td>');
                                            row.append('<td>' + komentar.email + '</td>');
                                            row.append('<td>' + komentar.komentar + '</td>');
                                            datakomen.append(row);
                                        });
                                    }
                                });
                            }
                        });
                        $('#tambahkomentar').modal('hide');
                    }
                });
            }
            });
        });
        
    </script>
</body>
</html>