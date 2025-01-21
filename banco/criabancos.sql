CREATE TABLE Endereco (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cep VARCHAR(9),
    cidade VARCHAR(50),
    estado VARCHAR(50),
    rua VARCHAR(100),
    numeroResidencia VARCHAR(10),
    complemento VARCHAR(100)
);

CREATE TABLE Tutor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomeTutor VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    senha VARCHAR(255),
    dtNasc DATE,
    cpf VARCHAR(14) UNIQUE,
    imagem VARCHAR(50) DEFAULT 'perfilTutor.png' NOT NULL,
    idEndereco INT,
    numTel VARCHAR(15),
    FOREIGN KEY (idEndereco) REFERENCES Endereco(id)
);

CREATE TABLE Veterinario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    crm VARCHAR(20),
    email VARCHAR(100) UNIQUE,
    especialidade VARCHAR(100) DEFAULT 'Clinico Geral',
    imagem VARCHAR(50) DEFAULT 'perfilVet.png' NOT NULL,
    idEndereco INT,
    numTel VARCHAR(15),
    FOREIGN KEY (idEndereco) REFERENCES Endereco(id)
);

CREATE TABLE Pet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomePet VARCHAR(100),
    especie VARCHAR(50),
    raca VARCHAR(50),
    dtNasc DATE,
    idTutor INT,
    FOREIGN KEY (idTutor) REFERENCES Tutor(id)
);

CREATE TABLE Consulta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dataConsulta DATE,
    relatoConsulta TEXT,
    procedimentos TEXT,
    idAnimal INT,
    idVeterinario INT,
    FOREIGN KEY (idAnimal) REFERENCES Animal(id),
    FOREIGN KEY (idVeterinario) REFERENCES Veterinario(id)
);










/* modificaçõess */
ALTER TABLE Tutor
MODIFY COLUMN senha VARCHAR(255) DEFAULT '123';

alter table Veterinario
add senha VARCHAR(255) DEFAULT '123';

alter table
add imagem VARCHAR(50) DEFAULT 'perfilPet.png' NOT NULL;

ALTER TABLE Veterinario
MODIFY COLUMN senha VARCHAR(255) DEFAULT '123';


ALTER TABLE Pet
DROP FOREIGN KEY Pet_ibfk_1;

ALTER TABLE Pet
ADD CONSTRAINT Pet_ibfk_1
FOREIGN KEY (idTutor) REFERENCES Tutor(id)
ON DELETE CASCADE;
