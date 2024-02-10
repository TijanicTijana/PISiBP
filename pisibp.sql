create database if not exists  Novine;
use Novine;

-- Kreiranje tabele za korisnike
CREATE TABLE Korisnik (
    Korisnik_ID INT AUTO_INCREMENT PRIMARY KEY,
    Korisnik_Ime VARCHAR(50) NOT NULL,
    Korisnik_Sifra VARCHAR(100)
);


-- Kreiranje tabele za rukovaoce novinarima (urednike)
CREATE TABLE Urednik (
    Urednik_ID INT AUTO_INCREMENT PRIMARY KEY,
    Urednik_Kategorija ENUM('Politika', 'Crna hronika', 'Svet', 'Sport', 'Zabava', 'Kultura', 'Glavni urednik') NOT NULL,
    Korisnik_ID INT NOT NULL,
    FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID)
);

-- Kreiranje tabele za novinare 
CREATE TABLE Novinar (
    Novinar_ID INT AUTO_INCREMENT PRIMARY KEY,
    Novinar_Kategorija ENUM('Politika', 'Crna hronika', 'Svet', 'Sport', 'Zabava', 'Kultura') NOT NULL,
    Korisnik_ID INT NOT NULL,
    FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID)
);

-- Kreiranje tabele za obicne korisnike 
CREATE TABLE ObicanKorisnik (
    ObicanKorisnik_ID INT AUTO_INCREMENT PRIMARY KEY,
    Korisnik_ID INT NOT NULL,
    FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID)
);

-- Kreiranje tabele za komentare
CREATE TABLE Komentar (
    Komentar_ID INT AUTO_INCREMENT PRIMARY KEY ,
    Komentar_tekst TEXT NOT NULL,
    Komentar_BrojLajkova INT DEFAULT 0,
    Komentar_BrojDislajkova INT DEFAULT 0,
    Komentar_Datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	Vest_ID INT NOT NULL,
    Korisnik_ID INT NOT NULL,
    FOREIGN KEY (Vest_ID) REFERENCES Vest(Vest_ID),
    FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID)
);

-- Kreiranje tabele za lajkove komentara
CREATE TABLE LajkKomentar(
	Lajk_ID INT AUTO_INCREMENT PRIMARY KEY,
    Korisnik_ID INT NOT NULL,
    Komentar_ID INT NOT NULL,
    FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID),
    FOREIGN KEY (Komentar_ID) REFERENCES Komentar(Komentar_ID)
);


-- Kreiranje tabele za dislajkove komentara
CREATE TABLE DislajkKomentar(
	Dislajk_ID INT AUTO_INCREMENT PRIMARY KEY,
    Korisnik_ID INT NOT NULL,
    Komentar_ID INT NOT NULL,
    FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID),
    FOREIGN KEY (Komentar_ID) REFERENCES Komentar(Komentar_ID)
);

-- Kreiranje tabele za lajkove vesti
CREATE TABLE LajkVest(
	Lajk_ID INT AUTO_INCREMENT PRIMARY KEY,
    Korisnik_ID INT NOT NULL,
    Vest_ID INT NOT NULL,
	FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID),
    FOREIGN KEY (Vest_ID) REFERENCES Vest(Vest_ID)
);


-- Kreiranje tabele za dislajkove vesti
CREATE TABLE DislajkVest(
	Dislajk_ID INT AUTO_INCREMENT PRIMARY KEY,
    Korisnik_ID INT NOT NULL,
    Vest_ID INT NOT NULL,
	FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID),
    FOREIGN KEY (Vest_ID) REFERENCES Vest(Vest_ID)
);



-- Kreiranje tabele za vesti
CREATE TABLE Vest (
    Vest_ID INT AUTO_INCREMENT PRIMARY KEY,
    Vest_Naslov VARCHAR(100) NOT NULL,
    Vest_Kategorija ENUM('Politika', 'Crna hronika', 'Svet', 'Sport', 'Zabava', 'Kultura') NOT NULL,
    Vest_Tagovi VARCHAR(255),
    Vest_Datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Vest_BrojLajkova INT DEFAULT 0,
    Vest_BrojDislajkova INT DEFAULT 0,
    Urednik_ID INT NOT NULL,
    FOREIGN KEY (Urednik_ID) REFERENCES Urednik(Urednik_ID)
);


-- Kreiranje tabele Draft
CREATE TABLE Draft(
	Draft_ID INT AUTO_INCREMENT PRIMARY KEY,
    Vest_ID INT NOT NULL,
    Novinar_ID INT NOT NULL,
    FOREIGN KEY (Vest_ID) REFERENCES Vest(Vest_ID),
    FOREIGN KEY (Novinar_ID) REFERENCES Novinar(Novinar_ID)
);

-- Kreiranje tabele arhivirane vesti
CREATE TABLE ArhiviranaVest(
	ARhiviranaVest_ID INT AUTO_INCREMENT PRIMARY KEY,
    Vest_ID INT NOT NULL,
    FOREIGN KEY (Vest_ID) REFERENCES Vest(Vest_ID)
);

-- Kreiranje tabele aktuelne vesti
CREATE TABLE AktuelnaVest(
	AktuelnaVest_ID INT AUTO_INCREMENT PRIMARY KEY,
    Vest_ID INT NOT NULL,
    FOREIGN KEY (Vest_ID) REFERENCES Vest(Vest_ID)
);

-- Kreiranje tabele za tekst
CREATE TABLE ArhiviranaVest(
	Tekst_ID INT AUTO_INCREMENT PRIMARY KEY,
    Vest_ID INT NOT NULL,
    FOREIGN KEY (Vest_ID) REFERENCES Vest(Vest_ID)
);

-- Kreiranje tabele za Url
CREATE TABLE Url(
	Url_ID INT AUTO_INCREMENT PRIMARY KEY,
    Url_Tekst VARCHAR(100),
    Tekst_ID INT NOT NULL,
    FOREIGN KEY (Tekst_ID) REFERENCES Tekst(Tekst_ID)
);


-- Kreiranje tabele za slike
CREATE TABLE Slika(
	Slika_ID INT AUTO_INCREMENT PRIMARY KEY,
    Slika_Tekst VARCHAR(100),
    Tekst_ID INT NOT NULL,
    FOREIGN KEY (Tekst_ID) REFERENCES Tekst(Tekst_ID)
);


-- Kreiranje tabele za podnaslove
CREATE TABLE Podnaslov(
	Podnaslov_ID INT AUTO_INCREMENT PRIMARY KEY,
    Podnaslov_Tekst VARCHAR(500),
    Tekst_ID INT NOT NULL,
    FOREIGN KEY (Tekst_ID) REFERENCES Tekst(Tekst_ID)
);


-- Kreiranje tabele za tekst vesti
CREATE TABLE TekstTekst(
	TekstTekst_ID INT AUTO_INCREMENT PRIMARY KEY,
    TekstTekst_Tekst VARCHAR(500),
    TekstTekst_Font VARCHAR(100),
    Tekst_ID INT NOT NULL,
    FOREIGN KEY (Tekst_ID) REFERENCES Tekst(Tekst_ID)
);


-- Kreiranje tabele za citanje aktuelnih vesti
CREATE TABLE CitaAktuelnuVest(
	Korisnik_ID INT  NOT NULL PRIMARY KEY,
    AktuelnaVest_ID INT  NOT NULL PRIMARY KEY,
    FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID),
    FOREIGN KEY (AktuelnaVest_ID) REFERENCES AktuelnaVest(AktuelnaVest_ID)
);


-- Kreiranje tabele za citanje arhiviranih vesti
CREATE TABLE CitaArhiviranuVest(
	Korisnik_ID INT  NOT NULL PRIMARY KEY,
    ArhiviranaVest_ID INT  NOT NULL PRIMARY KEY,
    FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID),
    FOREIGN KEY (ArhiviranaVest_ID) REFERENCES ArhiviranaVest(ArhiviranaVest_ID)
);

-- Kreiranje tabele za odobravanje vesti
CREATE TABLE Odobrava(
	Draft_ID INT  NOT NULL PRIMARY KEY,
    Korisnik_ID INT  NOT NULL,
    FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID),
    FOREIGN KEY (Draft_ID) REFERENCES Draft(Draft_ID)
);