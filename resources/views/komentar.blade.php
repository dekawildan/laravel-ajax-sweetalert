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
    
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{'/'}}">Buku Tamu</a>
        </div>
    </nav>
</header>
<article class="container-fluid">
    <section class="bg-primary w-100">
        <button type="button" class="btn btn-warning" id="pesan">Tampilkan</button>
    </section>
</article>

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