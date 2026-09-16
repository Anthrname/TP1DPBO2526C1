<?php

class Bioskop {
    // Atribut privat (Encapsulation)
    private string $id;
    private string $judul;
    private string $genre;
    private int $durasi;
    private string $foto;

    // Constructor
    public function __construct(string $id = "", string $judul = "", string $genre = "", int $durasi = 0, string $foto = "") {
        $this->id = $id;
        $this->judul = $judul;
        $this->genre = $genre;
        $this->durasi = $durasi;
        $this->foto = $foto;
    }

    // Getter dan Setter ID
    public function getId(): string {
        return $this->id;
    }

    public function setId(string $id): void {
        $this->id = $id;
    }

    // Getter dan Setter Judul
    public function getJudul(): string {
        return $this->judul;
    }

    public function setJudul(string $judul): void {
        $this->judul = $judul;
    }

    // Getter dan Setter Genre
    public function getGenre(): string {
        return $this->genre;
    }

    public function setGenre(string $genre): void {
        $this->genre = $genre;
    }

    // Getter dan Setter Durasi
    public function getDurasi(): int {
        return $this->durasi;
    }

    public function setDurasi(int $durasi): void {
        $this->durasi = $durasi;
    }

    // Getter dan Setter Foto
    public function getFoto(): string {
        return $this->foto;
    }

    public function setFoto(string $foto): void {
        $this->foto = $foto;
    }
}
?>
