-- a female mother dog is called a dam.  This is a table to hold the mother dogs, so that is why the table is called Dams.
CREATE TABLE Dams (
    damId           int             NOT NULL,
    name            varchar(50)    NOT NULL,
    description     text            NOT NULL,
    PRIMARY KEY (damId)
);

CREATE TABLE Puppies (
    puppyId         int             NOT NULL,
    DamId           int             NOT NULL,
    name            varchar(50)    NOT NULL,
    birthdate       date            NOT NULL,
    details         text            NOT NULL,
    sold            boolean,
    PRIMARY KEY (puppyId),
    FOREIGN KEY (damId) REFERENCES Dams(damId)
);

CREATE TABLE Images (
    imageId         int             NOT NULL,
    imgPath         varchar(150)   NOT NULL,
    imgDescription  varchar(100)   NOT NULL,
    puppyId         int,    /* nullable because you might want to just add pictures for the gallery */
    damId           int,    /* nullable for same reason as puppyId */
    PRIMARY KEY (imageId),
    FOREIGN KEY (puppyId) REFERENCES Puppies(puppyId),
    FOREIGN KEY (damId) REFERENCES Dams(damId)
);

CREATE TABLE users (
    userId          int             NOT NULL,
    userName        varchar(50)    NOT NULL,
    userPassword    varchar(100)   NOT NULL,
    PRIMARY KEY (userId)
);