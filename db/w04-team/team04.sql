-- create all the tables
CREATE TABLE Users (
    userId        int           NOT NULL,
    username      varchar(50)  NOT NULL,
    userPassword  varchar(50)  NOT NULL,
    userFirstName varchar(50)  NOT NULL,
    userLastName  varchar(50)  NOT NULL,
    PRIMARY KEY (userId)
);

CREATE TABLE Speakers (
    speakerId           int           NOT NULL,
    speakerFirstName    varchar(50)  NOT NULL,
    speakerMiddleName     varchar(50),
    speakerLastName     varchar(50)  NOT NULL,
    PRIMARY KEY (speakerId)
);

CREATE TABLE Conference (
    confId        int             NOT NULL,
    confMonth     varchar(15)    NOT NULL,
    confYear      int             NOT NULL,
    PRIMARY KEY (confId)
);

CREATE TABLE Sessions (
    sessionId       int             NOT NULL,
    sessionName     varchar(100)   NOT NULL,
    confId          int             NOT NULL,
    PRIMARY KEY (sessionId),
    FOREIGN KEY (confId) REFERENCES Conference(confId)
);

CREATE TABLE Type (
    typeId          int     NOT NULL,
    speakerId       int     NOT NULL,
    sessionId       int     NOT NULL,
    PRIMARY KEY (typeId),
    FOREIGN KEY (speakerId) REFERENCES Speakers(speakerId),
    FOREIGN KEY (sessionid) REFERENCES Sessions(sessionId)
);

CREATE TABLE Notes (
    noteId      int           NOT NULL,
    typeId    int           NOT NULL,
    userId      int           NOT NULL,
    comments    text          NOT NULL,
    PRIMARY KEY (noteId),
    FOREIGN KEY (typeId) REFERENCES Type(typeId),
    FOREIGN KEY (userId) REFERENCES Users(userId)
);


-- insert conference time
INSERT INTO Conference Values(
    1,
    'October',
    2018
);


-- insert first speaker
INSERT INTO Speakers VALUES (
    1,
    'Russell',
    'M',
    'Nelson'
);


-- drop confId column because the Sessions Table just has a list of sessions and doesn't have a confId
ALTER TABLE Sessions DROP confId;


-- add Saturday Morning Session that we use later
INSERT INTO Sessions VALUES (
    1,
    'Saturday Morning'
);


-- add confId to the Type table
ALTER TABLE Type ADD confId int;
-- add foreign key to the confId column
ALTER TABLE Type
ADD FOREIGN KEY (confId) REFERENCES Conference(confId);


-- create the Talks table
CREATE TABLE Talks (
    talkId      int         NOT NULL,
    speakerId   int         NOT NULL,
    confId      int         NOT NULL,
    sessionId   int         NOT NULL,
    talkName    varchar(50) NOT NULL,
    PRIMARY KEY (talkId),
    FOREIGN KEY (speakerId) REFERENCES Speakers(speakerId),
    FOREIGN KEY (confId) REFERENCES Conference(confId),
    FOREIGN KEY (sessionId) REFERENCES Sessions(sessionId)
);


-- insert first talk
INSERT INTO Talks VALUES (
    1,
    1,
    1,
    1,
    'Opening Remarks'
);


-- insert second speaker
INSERT INTO Speakers VALUES (
    2,
    'Ronald',
    'A',
    'Rasband'
);


-- insert second talk
INSERT INTO Talks VALUES (
    2,
    2,
    1,
    1,
    'Be Not Troubled'
);

-- insert third speaker
INSERT INTO Speakers VALUES (
    3,
    'Dallin',
    'H',
    'Oaks'
);


-- insert third talk
INSERT INTO Talks VALUES (
    3,
    3,
    1,
    1,
    'Truth and the Plan'
);


-- insert user
INSERT INTO Users VALUES (
    1,
    'sospirit',
    'muchspirit',
    'Alma',
    'Oaks'
);


-- insert first note
INSERT INTO Notes VALUES (
    1,
    1,
    'this is a great talk!',
    1
);


-- insert second note
INSERT INTO Notes VALUES (
    2,
    1,
    'this is as amazing talk!',
    2
);