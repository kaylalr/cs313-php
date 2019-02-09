-- a female mother dog is called a dam.  This is a table to hold the mother dogs, so that is why the table is called Dams.
CREATE TABLE Dams (
    damId           SERIAL UNIQUE   NOT NULL,
    name            varchar(50)     NOT NULL,
    description     text            NOT NULL,
    PRIMARY KEY (damId)
);

CREATE TABLE Puppies (
    puppyId         SERIAL UNIQUE   NOT NULL,
    DamId           int             NOT NULL,
    name            varchar(50)     NOT NULL,
    birthdate       date            NOT NULL,
    details         text            NOT NULL,
    sold            boolean,
    male            boolean         NOT NULL,
    PRIMARY KEY (puppyId),
    FOREIGN KEY (damId) REFERENCES Dams(damId)
);

CREATE TABLE Images (
    imageId         SERIAL UNIQUE  NOT NULL,
    imgPath         varchar(150)   NOT NULL,
    imgDescription  varchar(100)   NOT NULL,
    puppyId         int,    /* nullable because you might want to just add pictures for the gallery */
    damId           int,    /* nullable for same reason as puppyId */
    PRIMARY KEY (imageId),
    FOREIGN KEY (puppyId) REFERENCES Puppies(puppyId),
    FOREIGN KEY (damId) REFERENCES Dams(damId)
);

CREATE TABLE users (
    userId          SERIAL UNIQUE  NOT NULL,
    userName        varchar(50)    NOT NULL,
    userPassword    varchar(100)   NOT NULL,
    PRIMARY KEY (userId)
);

-- insert mother dogs
INSERT INTO Dams Values (
    DEFAULT,
    'Daisy',
    'Description'
);
INSERT INTO Dams Values (
    DEFAULT,
    'Misty',
    'Description'
);
INSERT INTO Dams Values (
    DEFAULT,
    'Poppy',
    'Description'
);
-- insert puppies
INSERT INTO Puppies Values (
    DEFAULT,
    1,
    'Everest',
    '2018-09-09',
    'details',
    false,
    true
);
INSERT INTO Puppies Values (
    DEFAULT,
    1,
    'Hogan',
    '2018-4-18',
    'important info',
    false,
    true
);
INSERT INTO Puppies Values (
    DEFAULT,
    1,
    'Charles',
    '2018-4-18',
    'info',
    false,
    true
);
INSERT INTO Puppies Values (
    DEFAULT,
    2,
    'Alaska',
    '2018-9-10',
    'important details',
    false,
    true
);
INSERT INTO Puppies Values (
    DEFAULT,
    2,
    'Artic',
    '2018-9-10',
    'info',
    false,
    true
);
INSERT INTO Puppies Values (
    DEFAULT,
    3,
    'Tiger',
    '2018-9-11',
    'details',
    false,
    true
);
INSERT INTO Puppies Values (
    DEFAULT,
    3,
    'Lily',
    '2018-9-11',
    'important info',
    false,
    false
);
INSERT INTO Puppies Values (
    DEFAULT,
    3,
    'Blossom',
    '2018-9-11',
    'important details',
    false,
    false
);
INSERT INTO Puppies Values (
    DEFAULT,
    3,
    'Lilac',
    '2018-9-11',
    'info',
    false,
    false
);
-- insert into images table
INSERT INTO Images Values(
    DEFAULT,
    'images/boy1sm.jpg',
    'image of male dog',
    1,
    1
);
INSERT INTO Images Values (
    Default,
    'images/girl5sm.jpg',
    'image of female',
    7,
    3
);

-- CREATE TABLE Images (
--     imageId         SERIAL UNIQUE  NOT NULL,
--     imgPath         varchar(150)   NOT NULL,
--     imgDescription  varchar(100)   NOT NULL,
--     puppyId         int,    /* nullable because you might want to just add pictures for the gallery */
--     damId           int,    /* nullable for same reason as puppyId */
--     PRIMARY KEY (imageId),
--     FOREIGN KEY (puppyId) REFERENCES Puppies(puppyId),
--     FOREIGN KEY (damId) REFERENCES Dams(damId)
-- );


-- Misty: Alaska, everest, arctic Daisy: Poppy, hogan, charles, oliver frankfurter, sausage, polish Poppy: Tiger, Lily, Blossom, Lilac, Ivy, Cedar

-- there were two images in the table and neither of them were from the mother dogs, so I wanted the damid to be null.
-- I had accidentally put a damid in there.
UPDATE Images
SET damId = null;