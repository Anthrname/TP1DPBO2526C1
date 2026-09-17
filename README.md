# TP1 DPBO 2026 - Pengelolaan Data Bioskop

## Janji
Saya Najib Nurohman NIM 2509653 mengerjakan evaluasi Tugas Praktikum 1 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

---

## Deskripsi
Program sederhana untuk mengelola data film di bioskop menggunakan konsep dasar OOP (*Encapsulation* dan *Class/Object*). Program ini diimplementasikan ke dalam 4 bahasa pemrograman:
- **C++** (CLI)
- **Java** (CLI)
- **Python** (CLI)
- **PHP** (Web sederhana)

Semua implementasi mendukung operasi dasar: **Create, Read, Update, Delete (CRUD)** dan **Search** data film.

---

## Desain Kelas (Class Diagram)

```mermaid
classDiagram
    class Bioskop {
        - string id
        - string judul
        - string genre
        - int durasi
        - string foto
        + Bioskop()
        + Bioskop(id, judul, genre, durasi, foto)
        + getId() string
        + setId(id: string) void
        + getJudul() string
        + setJudul(judul: string) void
        + getGenre() string
        + setGenre(genre: string) void
        + getDurasi() int
        + setDurasi(durasi: int) void
        + getFoto() string
        + setFoto(foto: string) void
    }
```

### Komponen Kelas `Bioskop`
- **Atribut**: `id` (ID film), `judul` (Judul film), `genre` (Genre film), `durasi` (Durasi menit), `foto` (File gambar poster).
- **Method**: Constructor (default & parameter) serta Getter dan Setter untuk masing-masing atribut.

---

## Fitur Utamas
1. **Menampilkan Data Film**: Melihat seluruh daftar film yang tersimpan.
2. **Menambah Data Film**: Menambahkan film baru ke dalam daftar.
3. **Mengubah Data Film**: Mengedit informasi film berdasarkan ID.
4. **Menghapus Data Film**: Menghapus data film dari daftar berdasarkan ID.
5. **Mencari Data Film**: Mencari data film berdasarkan ID.

---

## Cara Menjalankan Program

### 1. C++
```bash
cd CPP
g++ main.cpp -o main
./main
```

### 2. Java
```bash
cd Java
javac Main.java Bioskop.java
java Main
```

### 3. Python
```bash
cd Python
python main.py
```

### 4. PHP
```bash
cd PHP
php -S localhost:8000
```
akses ke sini bray `http://localhost:8000/index.php`.

---

### Dokumentasi C++ & Java & Phyton
Interface Utama
![Interface Utama](Dokumentasi/interface%20utama.png)
---
Opsi 1
![Opsi 1](Dokumentasi/Opsi%201.png)
---
Opsi 2
![Opsi 2](Dokumentasi/Opsi%202.png)
---
Opsi 3
![Opsi 3](Dokumentasi/Opsi%203.png)
---
Data sebelum di hapus
![Data Sebelum di hapus](Dokumentasi/data%20sebelum%20di%20hapus.png)
---
Data sesudah di hapus (opsi 4)
![Data Sesudah di hapus (opsi 4)](Dokumentasi/data%20sesudah%20di%20hapus%20(opsi%204).png)
---
Opsi 5
![Opsi 5](Dokumentasi/Opsi%205.png)
---
Opsi 6
![Opsi 6](Dokumentasi/keluar%20interface%20(opsi%206).png)

### PHP
interface
![interface](Dokumentasi/Interface.png)
---
tambah data film
![tambah data film](Dokumentasi/tambah%20data%20film.png)
---
ubah data film
![ubah data film](Dokumentasi/ubah%20data%20film.png)
---
cari data film
![cari data film](Dokumentasi/cari%20data%20film.png)

