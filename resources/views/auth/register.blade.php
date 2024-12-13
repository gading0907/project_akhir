<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Siswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h2 class="text-center text-primary font-weight-bold mb-4">Registrasi Siswa</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('register.submit') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_siswa" class="text-secondary">Nama Siswa</label>
                                <input type="text" name="nama_siswa" class="form-control" placeholder="Masukkan nama lengkap" required>
                            </div>
                            <div class="form-group">
                                <label for="kelas" class="text-secondary">Kelas</label>
                                <input type="text" name="kelas" class="form-control" placeholder="Masukkan kelas" required>
                            </div>
                            <div class="form-group">
                                <label for="jurusan" class="text-secondary">Jurusan</label>
                                <select name="jurusan" class="form-control" required>
                                    <option value="">Pilih Jurusan</option>
                                    <option value="TJKT">TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI (TJKT)</option>
                                    <option value="TKJ">TEKNIK KOMPUTER DAN JARINGAN (TKJ)</option>
                                    <option value="PLPG">PENGEMBANGAN PERANGKAT LUNAK DAN GIM (PLPG)</option>
                                    <option value="RPL">REKAYASA PERANGKAT LUNAK (RPL)</option>
                                    <option value="BC">BROADCASTING DAN PERFILMAN (BC)</option>
                                    <option value="PF">PERFILMAN (PF)</option>
                                    <option value="ANIMASI">ANIMASI</option>
                                    <option value="TO">TEKNIK OTOMOTIF (TO)</option>
                                    <option value="TL">JURUSAN TEKNIK KETENAGALISTRIKAN (TL)</option>
                                    <option value="TE">TEKNIK ELEKTRONIKA (TE)</option>
                                    <option value="AKL">AKUNTANSI DAN KEUANGAN LEMBAGA (AKL)</option>
                                    <option value="GEOSPASIAL">PROGRAM KEAHLIAN TEKNIK GEOSPASIAL</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-secondary">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-secondary">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Buat password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block font-weight-bold">Registrasi</button>
                        </form>

                        <div class="text-center mt-4">
                            <p class="text-secondary">Sudah punya akun? <a href="{{ route('login') }}" class="text-primary font-weight-bold">Login di sini</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
