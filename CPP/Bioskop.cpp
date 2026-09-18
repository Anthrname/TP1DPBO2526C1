#include <iostream>
#include <string>

using namespace std;

class Bioskop {
private:
    string id;
    string judul;
    string genre;
    int durasi;
    string foto;

public:
    // Constructor kosong
    Bioskop() {
        this->id = "";
        this->judul = "";
        this->genre = "";
        this->durasi = 0;
        this->foto = "";
    }

    // Constructor berparameter
    Bioskop(string id, string judul, string genre, int durasi, string foto) {
        this->id = id;
        this->judul = judul;
        this->genre = genre;
        this->durasi = durasi;
        this->foto = foto;
    }

    // Getter dan Setter
    string getId() const {
        return this->id;
    }

    void setId(string id) {
        this->id = id;
    }

    string getJudul() const {
        return this->judul;
    }

    void setJudul(string judul) {
        this->judul = judul;
    }

    string getGenre() const {
        return this->genre;
    }

    void setGenre(string genre) {
        this->genre = genre;
    }

    int getDurasi() const {
        return this->durasi;
    }

    void setDurasi(int durasi) {
        this->durasi = durasi;
    }

    string getFoto() const {
        return this->foto;
    }

    void setFoto(string foto) {
        this->foto = foto;
    }

    // Destruktor
    ~Bioskop() {
    }
};
