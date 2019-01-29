CREATE TABLE MommyDogs (
    mommyDogId      int             NOT NULL,
    name            nvarchar(50)    NOT NULL,
    PRIMARY KEY (mommyDogId)
);

CREATE TABLE Puppies (
    puppyId         int             NOT NULL,
    mommyDogId      int             NOT NULL,
    name            nvarchar(50)    NOT NULL,
    age             int             NOT NULL,
    price           int             NOT NULL,
    quality         ????            NOT NULL,
    details         nvarchar(max)   NOT NULL,
    /* add available or sold boolean */
    PRIMARY KEY (puppyId)
    FOREIGN KEY (mommyDogId) REFERENCES mommyDogs(mommyDogId)
);

CREATE TABLE Images (
    imageId         int             NOT NULL,
    imgPath         nvarchar(150)   NOT NULL,
    imgDescription  nvarchar(100)   NOT NULL,
    puppyId         int,    /* nullable because you might just want to add pictures for the gallery*/
    mommyDogId      int,    /* nullable for same reason as puppyId */
    /* add boolean fields?
        this would allow you to have a checkbox and you can choose what the image is of,
        this would help with the gallery - you could have a section for dogs, for puppies, and for other, maybe more?  */
    PRIMARY KEY (imageId),
    FOREIGN KEY (puppyId), REFERENCES Puppies(puppyId),
    FOREIGN KEY (mommyDogId), REFERENCES MommyDogs(mommyDogId)
);

CREATE TABLE users (
    userId          int             NOT NULL,
    userName        nvarchar(50)    NOT NULL,
    /* hash password */
    userPassword    nvarchar(100)   NOT NULL,
    PRIMARY KEY (userId)
);