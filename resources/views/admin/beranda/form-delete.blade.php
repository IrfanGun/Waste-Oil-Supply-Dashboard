<div>

    <form action="{{route('admin.beranda.destroy', $user)}}">
        @csrf
        @method('DELETE')
        <header>
        </header>
        <body>

            <span>Hapus User</span>
            <h1>Apakah Anda Ingin Menghapus Pengguna Atas Nama</h1>
        </body>
        <footer>
            <button>Tidak</button>
            <button type="submit">Iya, Hapus</button>
        </footer>
    </form>


</div>
