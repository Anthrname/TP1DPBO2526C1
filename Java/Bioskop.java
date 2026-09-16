public class Bioskop {
    // Atribut privat (Encapsulation)
    private String id;
    private String judul;
    private String genre;
    private int durasi;
    private String foto;

    // Constructor kosong
    public Bioskop() {
        this.id = "";
        this.judul = "";
        this.genre = "";
        this.durasi = 0;
        this.foto = "";
    }

    // Constructor berparameter
    public Bioskop(String id, String judul, String genre, int durasi, String foto) {
        this.id = id;
        this.judul = judul;
        this.genre = genre;
        this.durasi = durasi;
        this.foto = foto;
    }

    // Getter dan Setter
    public String getId() {
        return this.id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getJudul() {
        return this.judul;
    }

    public void setJudul(String judul) {
        this.judul = judul;
    }

    public String getGenre() {
        return this.genre;
    }

    public void setGenre(String genre) {
        this.genre = genre;
    }

    public int getDurasi() {
        return this.durasi;
    }

    public void setDurasi(int durasi) {
        this.durasi = durasi;
    }

    public String getFoto() {
        return this.foto;
    }

    public void setFoto(String foto) {
        this.foto = foto;
    }
}
