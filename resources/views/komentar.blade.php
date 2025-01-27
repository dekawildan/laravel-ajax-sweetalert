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
                <tbody>
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
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="komentar">Komentar</label>
                        <textarea name="komentar" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
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
                    icon:'warning',
                    timer:2000,
                    showConfirmButton:false,
                });
            });
        });
        Swal.fire({
            title: 'Berhasil',
            text: 'Website anda berhasil di akses',
            icon: 'success',
            confirmButtonText: 'Tutup'
        });
        
    </script>
</body>
</html>