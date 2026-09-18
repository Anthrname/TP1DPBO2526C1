import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    private static Scanner scanner = new Scanner(System.in);
    private static ArrayList<Bioskop> daftarFilm = new ArrayList<>();

    // Fungsi menampilkan semua data film
    public static void tampilkanFilm() {
        System.out.println("\n=== DAFTAR FILM BIOSKOP ===");
        if (daftarFilm.isEmpty()) {
            System.out.println("Belum ada data film.");
            return;
        }

        for (int i = 0; i < daftarFilm.size(); i++) {
            Bioskop f = daftarFilm.get(i);
            System.out.println("No. " + (i + 1));
            System.out.println("ID Film     : " + f.getId());
            System.out.println("Judul Film  : " + f.getJudul());
            System.out.println("Genre       : " + f.getGenre());
            System.out.println("Durasi      : " + f.getDurasi() + " menit");
            System.out.println("File Foto   : " + f.getFoto());
            System.out.println("-----------------------------------");
        }
    }

    // Fungsi menambah data film
    public static void tambahFilm() {
        System.out.println("\n=== TAMBAH DATA FILM ===");
        System.out.print("Masukkan ID Film    : ");
        String id = scanner.nextLine().trim();

        // Validasi duplikasi ID
        for (Bioskop f : daftarFilm) {
            if (f.getId().equalsIgnoreCase(id)) {
                System.out.println("Gagal: ID Film '" + id + "' sudah terdaftar! Gunakan ID lain.");
                return;
            }
        }

        System.out.print("Masukkan Judul Film : ");
        String judul = scanner.nextLine();
        System.out.print("Masukkan Genre      : ");
        String genre = scanner.nextLine();
        System.out.print("Masukkan Durasi     : ");
        int durasi = 0;
        try {
            durasi = Integer.parseInt(scanner.nextLine().trim());
            if (durasi <= 0) {
                System.out.println("Input durasi tidak valid! Durasi harus berupa angka positif.");
                return;
            }
        } catch (NumberFormatException e) {
            System.out.println("Input durasi tidak valid! Durasi harus berupa angka.");
            return;
        }
        System.out.print("Masukkan Nama Foto  : ");
        String foto = scanner.nextLine();

        Bioskop filmBaru = new Bioskop(id, judul, genre, durasi, foto);
        daftarFilm.add(filmBaru);
        System.out.println("Data film berhasil ditambahkan!");
    }

    // Fungsi mengubah data film
    public static void ubahFilm() {
        if (daftarFilm.isEmpty()) {
            System.out.println("\nBelum ada data film untuk diubah.");
            return;
        }

        System.out.println("\n=== UBAH DATA FILM ===");
        System.out.print("Masukkan ID Film yang akan diubah: ");
        String id = scanner.nextLine().trim();

        int ketemu = -1;
        for (int i = 0; i < daftarFilm.size(); i++) {
            if (daftarFilm.get(i).getId().equalsIgnoreCase(id)) {
                ketemu = i;
                break;
            }
        }

        if (ketemu != -1) {
            System.out.print("Masukkan Judul Baru : ");
            String judul = scanner.nextLine();
            System.out.print("Masukkan Genre Baru : ");
            String genre = scanner.nextLine();
            System.out.print("Masukkan Durasi Baru: ");
            int durasi = 0;
            try {
                durasi = Integer.parseInt(scanner.nextLine().trim());
                if (durasi <= 0) {
                    System.out.println("Input durasi tidak valid! Durasi harus berupa angka positif. Perubahan dibatalkan.");
                    return;
                }
            } catch (NumberFormatException e) {
                System.out.println("Input durasi tidak valid! Perubahan dibatalkan.");
                return;
            }
            System.out.print("Masukkan Foto Baru  : ");
            String foto = scanner.nextLine();

            Bioskop f = daftarFilm.get(ketemu);
            f.setJudul(judul);
            f.setGenre(genre);
            f.setDurasi(durasi);
            f.setFoto(foto);

            System.out.println("Data film berhasil diubah!");
        } else {
            System.out.println("Data film dengan ID tersebut tidak ditemukan!");
        }
    }

    // Fungsi menghapus data film
    public static void hapusFilm() {
        if (daftarFilm.isEmpty()) {
            System.out.println("\nBelum ada data film untuk dihapus.");
            return;
        }

        System.out.println("\n=== HAPUS DATA FILM ===");
        System.out.print("Masukkan ID Film yang akan dihapus: ");
        String id = scanner.nextLine().trim();

        int ketemu = -1;
        for (int i = 0; i < daftarFilm.size(); i++) {
            if (daftarFilm.get(i).getId().equalsIgnoreCase(id)) {
                ketemu = i;
                break;
            }
        }

        if (ketemu != -1) {
            daftarFilm.remove(ketemu);
            System.out.println("Data film berhasil dihapus!");
        } else {
            System.out.println("Data film tidak ditemukan!");
        }
    }

    // Fungsi mencari data film
    public static void cariFilm() {
        if (daftarFilm.isEmpty()) {
            System.out.println("\nBelum ada data film untuk dicari.");
            return;
        }

        System.out.println("\n=== CARI DATA FILM ===");
        System.out.print("Masukkan ID Film yang dicari: ");
        String id = scanner.nextLine().trim();

        boolean ditemukan = false;
        for (int i = 0; i < daftarFilm.size(); i++) {
            Bioskop f = daftarFilm.get(i);
            if (f.getId().equalsIgnoreCase(id)) {
                System.out.println("\nData ditemukan:");
                System.out.println("ID Film     : " + f.getId());
                System.out.println("Judul Film  : " + f.getJudul());
                System.out.println("Genre       : " + f.getGenre());
                System.out.println("Durasi      : " + f.getDurasi() + " menit");
                System.out.println("File Foto   : " + f.getFoto());
                ditemukan = true;
                break;
            }
        }

        if (!ditemukan) {
            System.out.println("Film dengan ID " + id + " tidak ditemukan.");
        }
    }

    public static void main(String[] args) {
        // Data awal dummy
        daftarFilm.add(new Bioskop("F01", "Interstellar", "Sci-Fi", 169, "interstellar.jpg"));
        daftarFilm.add(new Bioskop("F02", "Oppenheimer", "Biography", 180, "oppenheimer.jpg"));

        int menu = 0;
        do {
            System.out.println("\n===============================");
            System.out.println("   PROGRAM MANAJEMEN BIOSKOP   ");
            System.out.println("===============================");
            System.out.println("1. Tampilkan Data Film");
            System.out.println("2. Tambah Data Film");
            System.out.println("3. Ubah Data Film");
            System.out.println("4. Hapus Data Film");
            System.out.println("5. Cari Data Film");
            System.out.println("6. Keluar");
            System.out.print("Pilih menu (1-6): ");

            try {
                menu = Integer.parseInt(scanner.nextLine().trim());
            } catch (Exception e) {
                System.out.println("Menu tidak valid! Masukkan angka antara 1 sampai 6.");
                continue;
            }

            switch (menu) {
                case 1:
                    tampilkanFilm();
                    break;
                case 2:
                    tambahFilm();
                    break;
                case 3:
                    ubahFilm();
                    break;
                case 4:
                    hapusFilm();
                    break;
                case 5:
                    cariFilm();
                    break;
                case 6:
                    System.out.println("Keluar dari program. Terima kasih!");
                    break;
                default:
                    System.out.println("Menu tidak valid! Pilihan harus berada di rentang 1-6.");
                    break;
            }
        } while (menu != 6);
    }
}
