-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2022-12-20 22:50:49.024

-- tables
-- Table: Akun
CREATE TABLE Akun (
    ID integer  NOT NULL,
    Nama_Lengkap varchar2(255)  NULL,
    NIK varchar2(16)  NULL,
    Email varchar2(100)  NULL,
    Password varchar2(255)  NULL,
    Role varchar2(20)  NULL,
    CONSTRAINT Akun_pk PRIMARY KEY (ID)
) ;

-- Table: Peserta
CREATE TABLE Peserta (
    P_ID Integer  NOT NULL,
    JK varchar2(10)  NULL,
    Tlp varchar2(15)  NULL,
    TmptLahir varchar2(25)  NULL,
    TglLahir date  NULL,
    K_Pendidikan varchar2(150)  NULL,
    Status varchar2(20)  NULL,
    Akun_ID integer  NOT NULL,
    CONSTRAINT Peserta_pk PRIMARY KEY (P_ID)
) ;

-- foreign keys
-- Reference: Peserta_Akun (table: Peserta)
ALTER TABLE Peserta ADD CONSTRAINT Peserta_Akun
    FOREIGN KEY (Akun_ID)
    REFERENCES Akun (ID);

-- End of file.

