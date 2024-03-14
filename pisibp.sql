create database if not exists  novine;
use novine;

-- Kreiranje tabele za korisnike
CREATE TABLE korisnik (
    Korisnik_ID INT AUTO_INCREMENT PRIMARY KEY,
    Korisnik_KorisnickoIme VARCHAR(50) NOT NULL,
    Korisnik_Sifra VARCHAR(100),
    Korisnik_Email VARCHAR(200),
    Korisnik_Pol enum("Muski", "Zenski"),
    Korisnik_Ime VARCHAR (100),
    Korisnik_Prezime VARCHAR (100)    
);


-- Kreiranje tabele za rukovaoce novinarima (urednike)
CREATE TABLE urednik (
    Urednik_ID INT AUTO_INCREMENT PRIMARY KEY,
    Urednik_Kategorija ENUM('Politika', 'Crna hronika', 'Svet', 'Sport', 'Zabava', 'Kultura', 'Glavni urednik') NOT NULL,
    -- Korisnik_ID INT NOT NULL,
    -- FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID)
    Urednik_KorisnickoIme VARCHAR(50) NOT NULL,
    Urednik_Sifra VARCHAR(100),
    Urednik_Email VARCHAR(200),
    Urednik_Pol enum("Muski", "Zenski"),
    Urednik_Ime VARCHAR (100),
    Urednik_Prezime VARCHAR (100)
);

-- Kreiranje tabele za novinare 
CREATE TABLE novinar (
    Novinar_ID INT AUTO_INCREMENT PRIMARY KEY,
    Novinar_Kategorija ENUM('Politika', 'Crna hronika', 'Svet', 'Sport', 'Zabava', 'Kultura') NOT NULL,
    -- Korisnik_ID INT NOT NULL,
    -- FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID),
    Novinar_KorisnickoIme VARCHAR(50) NOT NULL,
    Novinar_Sifra VARCHAR(100),
    Novinar_Email VARCHAR(200),
    Novinar_Pol enum("Muski", "Zenski"),
    Novinar_Ime VARCHAR (100),
    Novinar_Prezime VARCHAR (100)
);

-- Kreiranje tabele za komentare
CREATE TABLE komentar (
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
CREATE TABLE lajkKomentar(
	Lajk_ID INT AUTO_INCREMENT PRIMARY KEY,
    Korisnik_ID INT NOT NULL,
    Komentar_ID INT NOT NULL,
    FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID),
    FOREIGN KEY (Komentar_ID) REFERENCES Komentar(Komentar_ID)
);


-- Kreiranje tabele za dislajkove komentara
CREATE TABLE dislajkKomentar(
	Dislajk_ID INT AUTO_INCREMENT PRIMARY KEY,
    Korisnik_ID INT NOT NULL,
    Komentar_ID INT NOT NULL,
    FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID),
    FOREIGN KEY (Komentar_ID) REFERENCES Komentar(Komentar_ID)
);

-- Kreiranje tabele za lajkove vesti
CREATE TABLE lajkVest(
	Lajk_ID INT AUTO_INCREMENT PRIMARY KEY,
    Korisnik_ID INT NOT NULL,
    Vest_ID INT NOT NULL,
	FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID),
    FOREIGN KEY (Vest_ID) REFERENCES Vest(Vest_ID)
);


-- Kreiranje tabele za dislajkove vesti
CREATE TABLE dislajkVest(
	Dislajk_ID INT AUTO_INCREMENT PRIMARY KEY,
    Korisnik_ID INT NOT NULL,
    Vest_ID INT NOT NULL,
	FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID),
    FOREIGN KEY (Vest_ID) REFERENCES Vest(Vest_ID)
);



-- Kreiranje tabele za vesti
CREATE TABLE vest (
    Vest_ID INT AUTO_INCREMENT PRIMARY KEY,
    Vest_Naslov VARCHAR(100) NOT NULL,
    Vest_Tekst1 VARCHAR(10000) NOT NULL,
    Vest_Slika1 VARCHAR(100) ,
    Vest_Podnaslov VARCHAR(100) ,
    Vest_Tekst2 VARCHAR(100) ,
    Vest_Slika2 VARCHAR(100) ,
    Vest_Tekst3 VARCHAR(100) ,
    Vest_Kategorija ENUM('Politika', 'Crna hronika', 'Svet', 'Sport', 'Zabava', 'Kultura') NOT NULL,
    Vest_Tagovi VARCHAR(255),
    Vest_Datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Vest_BrojLajkova INT DEFAULT 0,
    Vest_BrojDislajkova INT DEFAULT 0
    -- Urednik_ID INT,
    -- FOREIGN KEY (Urednik_ID) REFERENCES Urednik(Urednik_ID)
);


-- Kreiranje tabele Draft
CREATE TABLE draft(
	Draft_ID INT AUTO_INCREMENT PRIMARY KEY,
    Vest_ID INT NOT NULL,
    Novinar_ID INT NOT NULL,
    FOREIGN KEY (Vest_ID) REFERENCES Vest(Vest_ID),
    FOREIGN KEY (Novinar_ID) REFERENCES Novinar(Novinar_ID)
);

-- Kreiranje tabele arhivirane vesti
CREATE TABLE arhiviranaVest(
	ARhiviranaVest_ID INT AUTO_INCREMENT PRIMARY KEY,
    Vest_ID INT NOT NULL,
    FOREIGN KEY (Vest_ID) REFERENCES Vest(Vest_ID)
);

-- Kreiranje tabele aktuelne vesti
CREATE TABLE aktuelnaVest(
	AktuelnaVest_ID INT AUTO_INCREMENT PRIMARY KEY,
    Vest_ID INT NOT NULL,
    FOREIGN KEY (Vest_ID) REFERENCES Vest(Vest_ID)
);

-- Kreiranje tabele za tekst
CREATE TABLE arhiviranaVest(
	Tekst_ID INT AUTO_INCREMENT PRIMARY KEY,
    Vest_ID INT NOT NULL,
    FOREIGN KEY (Vest_ID) REFERENCES Vest(Vest_ID)
);

-- Kreiranje tabele za Url
CREATE TABLE url(
	Url_ID INT AUTO_INCREMENT PRIMARY KEY,
    Url_Tekst VARCHAR(100),
    Tekst_ID INT NOT NULL,
    FOREIGN KEY (Tekst_ID) REFERENCES Tekst(Tekst_ID)
);


-- Kreiranje tabele za slike
CREATE TABLE slika(
	Slika_ID INT AUTO_INCREMENT PRIMARY KEY,
    Slika_Tekst VARCHAR(100),
    Tekst_ID INT NOT NULL,
    FOREIGN KEY (Tekst_ID) REFERENCES Tekst(Tekst_ID)
);


-- Kreiranje tabele za podnaslove
CREATE TABLE podnaslov(
	Podnaslov_ID INT AUTO_INCREMENT PRIMARY KEY,
    Podnaslov_Tekst VARCHAR(500),
    Tekst_ID INT NOT NULL,
    FOREIGN KEY (Tekst_ID) REFERENCES Tekst(Tekst_ID)
);


-- Kreiranje tabele za tekst vesti
CREATE TABLE tekstTekst(
	TekstTekst_ID INT AUTO_INCREMENT PRIMARY KEY,
    TekstTekst_Tekst VARCHAR(500),
    TekstTekst_Font VARCHAR(100),
    Tekst_ID INT NOT NULL,
    FOREIGN KEY (Tekst_ID) REFERENCES Tekst(Tekst_ID)
);


-- Kreiranje tabele za citanje aktuelnih vesti
CREATE TABLE citaAktuelnuVest(
	Korisnik_ID INT  NOT NULL PRIMARY KEY,
    AktuelnaVest_ID INT  NOT NULL PRIMARY KEY,
    FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID),
    FOREIGN KEY (AktuelnaVest_ID) REFERENCES AktuelnaVest(AktuelnaVest_ID)
);


-- Kreiranje tabele za citanje arhiviranih vesti
CREATE TABLE citaArhiviranuVest(
	Korisnik_ID INT  NOT NULL PRIMARY KEY,
    ArhiviranaVest_ID INT  NOT NULL PRIMARY KEY,
    FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID),
    FOREIGN KEY (ArhiviranaVest_ID) REFERENCES ArhiviranaVest(ArhiviranaVest_ID)
);

-- Kreiranje tabele za odobravanje vesti
CREATE TABLE odobrava(
	Draft_ID INT  NOT NULL PRIMARY KEY,
    Korisnik_ID INT  NOT NULL,
    FOREIGN KEY (Korisnik_ID) REFERENCES Korisnik(Korisnik_ID),
    FOREIGN KEY (Draft_ID) REFERENCES Draft(Draft_ID)
);
