CREATE TABLE user_admin(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
)

CREATE TABLE sorties_musicales(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title_album VARCHAR(255) NOT NULL,
    details_on_album TEXT(650000) NOT NULL,
    created_at DATETIME NOT NULL,
    PRIMARY KEY (id)
)

CREATE TABLE concerts_evenements(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    type_evenement VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    details_evenement TEXT(650000) NOT NULL,
    created_at DATETIME NOT NULL,
    PRIMARY KEY (id)
)


