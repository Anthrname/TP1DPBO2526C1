class Bioskop:
    # Constructor
    def __init__(self, id: str = "", judul: str = "", genre: str = "", durasi: int = 0, foto: str = ""):
        self.__id = str(id)
        self.__judul = str(judul)
        self.__genre = str(genre)
        self.__durasi = int(durasi)
        self.__foto = str(foto)

    # Getter & Setter ID
    def getId(self) -> str:
        return self.__id

    def setId(self, id: str) -> None:
        self.__id = str(id)

    # Getter & Setter Judul
    def getJudul(self) -> str:
        return self.__judul

    def setJudul(self, judul: str) -> None:
        self.__judul = str(judul)

    # Getter & Setter Genre
    def getGenre(self) -> str:
        return self.__genre

    def setGenre(self, genre: str) -> None:
        self.__genre = str(genre)

    # Getter & Setter Durasi
    def getDurasi(self) -> int:
        return self.__durasi

    def setDurasi(self, durasi: int) -> None:
        self.__durasi = int(durasi)

    # Getter & Setter Foto
    def getFoto(self) -> str:
        return self.__foto

    def setFoto(self, foto: str) -> None:
        self.__foto = str(foto)
