from Bioskop import Bioskop

def tampilkan_film(daftar_film):
    print("\n=== DAFTAR FILM BIOSKOP ===")
    if not daftar_film:
        print("Belum ada data film.")
        return

    for i, f in enumerate(daftar_film):
        print(f"No. {i + 1}")
        print(f"ID Film     : {f.getId()}")
        print(f"Judul Film  : {f.getJudul()}")
        print(f"Genre       : {f.getGenre()}")
        print(f"Durasi      : {f.getDurasi()} menit")
        print(f"File Foto   : {f.getFoto()}")
        print("-----------------------------------")

def tambah_film(daftar_film):
    print("\n=== TAMBAH DATA FILM ===")
    id_film = input("Masukkan ID Film    : ")
    judul = input("Masukkan Judul Film : ")
    genre = input("Masukkan Genre      : ")
    durasi = int(input("Masukkan Durasi     : "))
    foto = input("Masukkan Nama Foto  : ")

    film_baru = Bioskop(id_film, judul, genre, durasi, foto)
    daftar_film.append(film_baru)
    print("Data film berhasil ditambahkan!")

def ubah_film(daftar_film):
    print("\n=== UBAH DATA FILM ===")
    id_film = input("Masukkan ID Film yang akan diubah: ")

    ketemu = -1
    for i, f in enumerate(daftar_film):
        if f.getId().lower() == id_film.lower():
            ketemu = i
            break

    if ketemu != -1:
        judul = input("Masukkan Judul Baru : ")
        genre = input("Masukkan Genre Baru : ")
        durasi = int(input("Masukkan Durasi Baru: "))
        foto = input("Masukkan Foto Baru  : ")

        daftar_film[ketemu].setJudul(judul)
        daftar_film[ketemu].setGenre(genre)
        daftar_film[ketemu].setDurasi(durasi)
        daftar_film[ketemu].setFoto(foto)

        print("Data film berhasil diubah!")
    else:
        print("Data film dengan ID tersebut tidak ditemukan!")

def hapus_film(daftar_film):
    print("\n=== HAPUS DATA FILM ===")
    id_film = input("Masukkan ID Film yang akan dihapus: ")

    ketemu = -1
    for i, f in enumerate(daftar_film):
        if f.getId().lower() == id_film.lower():
            ketemu = i
            break

    if ketemu != -1:
        daftar_film.pop(ketemu)
        print("Data film berhasil dihapus!")
    else:
        print("Data film tidak ditemukan!")

def cari_film(daftar_film):
    print("\n=== CARI DATA FILM ===")
    id_film = input("Masukkan ID Film yang dicari: ")

    ditemukan = False
    for f in daftar_film:
        if f.getId().lower() == id_film.lower():
            print("\nData ditemukan:")
            print(f"ID Film     : {f.getId()}")
            print(f"Judul Film  : {f.getJudul()}")
            print(f"Genre       : {f.getGenre()}")
            print(f"Durasi      : {f.getDurasi()} menit")
            print(f"File Foto   : {f.getFoto()}")
            ditemukan = True if True else False
            break

    if not ditemukan:
        print(f"Film dengan ID {id_film} tidak ditemukan.")

def main():
    # Data awal dummy
    daftar_film = [
        Bioskop("F01", "Interstellar", "Sci-Fi", 169, "interstellar.jpg"),
        Bioskop("F02", "Oppenheimer", "Biography", 180, "oppenheimer.jpg")
    ]

    while True:
        print("\n===============================")
        print("   PROGRAM MANAJEMEN BIOSKOP   ")
        print("===============================")
        print("1. Tampilkan Data Film")
        print("2. Tambah Data Film")
        print("3. Ubah Data Film")
        print("4. Hapus Data Film")
        print("5. Cari Data Film")
        print("6. Keluar")
        menu = input("Pilih menu (1-6): ")

        if menu == "1":
            tampilkan_film(daftar_film)
        elif menu == "2":
            tambah_film(daftar_film)
        elif menu == "3":
            ubah_film(daftar_film)
        elif menu == "4":
            hapus_film(daftar_film)
        elif menu == "5":
            cari_film(daftar_film)
        elif menu == "6":
            print("Keluar dari program. Terima kasih!")
            break
        else:
            print("Menu tidak valid!")

if __name__ == "__main__":
    main()
