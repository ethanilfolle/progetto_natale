CREATE DATABASE todo_app;
USE todo_app;

CREATE TABLE utente (
    id_utente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE attivita (
    id_attivita INT AUTO_INCREMENT PRIMARY KEY,
    testo VARCHAR(255) NOT NULL,
    completata BOOLEAN DEFAULT FALSE,
    id_utente INT NOT NULL,
    FOREIGN KEY (id_utente)
        REFERENCES utente(id_utente)
        ON DELETE CASCADE
);

INSERT INTO utente (nome, email, password)
VALUES ('Anas', 'anas@email.it', 'password123');

INSERT INTO utente (nome, email, password)
VALUES ('Ethan', 'ethan@email.it', 'password456');

INSERT INTO attivita (testo, id_utente)
VALUES ('Studiare informatica', 1);

INSERT INTO attivita (testo, id_utente)
VALUES ('Fare i compiti di matematica', 1);

INSERT INTO attivita (testo, id_utente)
VALUES ('Preparare interrogazione', 2);

SELECT * FROM attivita WHERE id_utente = 1;

SELECT * testo FROM attivita WHERE id_utente = 1 AND completata = FALSE;

SELECT * utente.nome, attivita.testo, attivita.completata FROM utente JOIN attivita ON utente.id_utente = attivita.id_utente;

DELETE FROM attivita WHERE id_attivita = 2;

DELETE FROM utente WHERE id_utente = 2;