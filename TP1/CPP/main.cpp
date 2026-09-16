#include <iostream>
#include <vector>
#include <string>
#include "Bioskop.cpp"

using namespace std;

// Fungsi untuk menampilkan semua data film
void tampilkanFilm(vector<Bioskop>& daftarFilm) {
    cout << "\n=== DAFTAR FILM BIOSKOP ===" << endl;
    if (daftarFilm.empty()) {
        cout << "Belum ada data film." << endl;
        return;
    }

    for (int i = 0; i < daftarFilm.size(); i++) {
        cout << "No. " << (i + 1) << endl;
        cout << "ID Film     : " << daftarFilm[i].getId() << endl;
        cout << "Judul Film  : " << daftarFilm[i].getJudul() << endl;
        cout << "Genre       : " << daftarFilm[i].getGenre() << endl;
        cout << "Durasi      : " << daftarFilm[i].getDurasi() << " menit" << endl;
        cout << "File Foto   : " << daftarFilm[i].getFoto() << endl;
        cout << "-----------------------------------" << endl;
    }
}

// Fungsi untuk menambah data film
void tambahFilm(vector<Bioskop>& daftarFilm) {
    string id, judul, genre, foto;
    int durasi;

    cout << "\n=== TAMBAH DATA FILM ===" << endl;
    cout << "Masukkan ID Film    : ";
    cin >> id;
    cin.ignore();
    cout << "Masukkan Judul Film : ";
    getline(cin, judul);
    cout << "Masukkan Genre      : ";
    getline(cin, genre);
    cout << "Masukkan Durasi     : ";
    cin >> durasi;
    cin.ignore();
    cout << "Masukkan Nama Foto  : ";
    getline(cin, foto);

    Bioskop filmBaru(id, judul, genre, durasi, foto);
    daftarFilm.push_back(filmBaru);

    cout << "Data film berhasil ditambahkan!" << endl;
}

// Fungsi untuk mengubah data film
void ubahFilm(vector<Bioskop>& daftarFilm) {
    string id;
    cout << "\n=== UBAH DATA FILM ===" << endl;
    cout << "Masukkan ID Film yang akan diubah: ";
    cin >> id;
    cin.ignore();

    int ketemu = -1;
    for (int i = 0; i < daftarFilm.size(); i++) {
        if (daftarFilm[i].getId() == id) {
            ketemu = i;
            break;
        }
    }

    if (ketemu != -1) {
        string judul, genre, foto;
        int durasi;

        cout << "Masukkan Judul Baru : ";
        getline(cin, judul);
        cout << "Masukkan Genre Baru : ";
        getline(cin, genre);
        cout << "Masukkan Durasi Baru: ";
        cin >> durasi;
        cin.ignore();
        cout << "Masukkan Foto Baru  : ";
        getline(cin, foto);

        daftarFilm[ketemu].setJudul(judul);
        daftarFilm[ketemu].setGenre(genre);
        daftarFilm[ketemu].setDurasi(durasi);
        daftarFilm[ketemu].setFoto(foto);

        cout << "Data film berhasil diubah!" << endl;
    } else {
        cout << "Data film dengan ID tersebut tidak ditemukan!" << endl;
    }
}

// Fungsi untuk menghapus data film
void hapusFilm(vector<Bioskop>& daftarFilm) {
    string id;
    cout << "\n=== HAPUS DATA FILM ===" << endl;
    cout << "Masukkan ID Film yang akan dihapus: ";
    cin >> id;

    int ketemu = -1;
    for (int i = 0; i < daftarFilm.size(); i++) {
        if (daftarFilm[i].getId() == id) {
            ketemu = i;
            break;
        }
    }

    if (ketemu != -1) {
        daftarFilm.erase(daftarFilm.begin() + ketemu);
        cout << "Data film berhasil dihapus!" << endl;
    } else {
        cout << "Data film tidak ditemukan!" << endl;
    }
}

// Fungsi untuk mencari data film
void cariFilm(vector<Bioskop>& daftarFilm) {
    string id;
    cout << "\n=== CARI DATA FILM ===" << endl;
    cout << "Masukkan ID Film yang dicari: ";
    cin >> id;

    bool ditemukan = false;
    for (int i = 0; i < daftarFilm.size(); i++) {
        if (daftarFilm[i].getId() == id) {
            cout << "\nData ditemukan:" << endl;
            cout << "ID Film     : " << daftarFilm[i].getId() << endl;
            cout << "Judul Film  : " << daftarFilm[i].getJudul() << endl;
            cout << "Genre       : " << daftarFilm[i].getGenre() << endl;
            cout << "Durasi      : " << daftarFilm[i].getDurasi() << " menit" << endl;
            cout << "File Foto   : " << daftarFilm[i].getFoto() << endl;
            ditemukan = true;
            break;
        }
    }

    if (!ditemukan) {
        cout << "Film dengan ID " << id << " tidak ditemukan." << endl;
    }
}

int main() {
    vector<Bioskop> daftarFilm;

    // Data awal dummy
    daftarFilm.push_back(Bioskop("F01", "Interstellar", "Sci-Fi", 169, "interstellar.jpg"));
    daftarFilm.push_back(Bioskop("F02", "Oppenheimer", "Biography", 180, "oppenheimer.jpg"));

    int menu = 0;
    do {
        cout << "\n===============================" << endl;
        cout << "   PROGRAM MANAJEMEN BIOSKOP   " << endl;
        cout << "===============================" << endl;
        cout << "1. Tampilkan Data Film" << endl;
        cout << "2. Tambah Data Film" << endl;
        cout << "3. Ubah Data Film" << endl;
        cout << "4. Hapus Data Film" << endl;
        cout << "5. Cari Data Film" << endl;
        cout << "6. Keluar" << endl;
        cout << "Pilih menu (1-6): ";
        
        if (!(cin >> menu)) {
            break;
        }

        switch (menu) {
            case 1:
                tampilkanFilm(daftarFilm);
                break;
            case 2:
                tambahFilm(daftarFilm);
                break;
            case 3:
                ubahFilm(daftarFilm);
                break;
            case 4:
                hapusFilm(daftarFilm);
                break;
            case 5:
                cariFilm(daftarFilm);
                break;
            case 6:
                cout << "Keluar dari program. Terima kasih!" << endl;
                break;
            default:
                cout << "Menu tidak valid!" << endl;
                break;
        }
    } while (menu != 6);

    return 0;
}
