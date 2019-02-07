CREATE TABLE scriptures (
    scriptureId     SERIAL      NOT NULL,
    book            varchar(50) NOT NULL,
    chapter         int         NOT NULL,
    verse           int         NOT NULL,
    content         text        NOT NULL,
    PRIMARY KEY (scriptureId)
);

INSERT INTO scriptures VALUES (
    default,
    'John',
    1,
    5,
    'And the light shineth in darkness; and the darkness comprehended it not.'
), (
    default,
    'Doctrine and Covenants',
    88,
    49,
    'The alight shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall bcomprehend even God, being quickened in him and by him.'
), (
    default,
    'Doctrine and Covenants',
    93,
    28,
    'He that akeepeth his commandments receiveth btruth and clight, until he is glorified in truth and dknoweth all things.'    
),
(
    default,
    'Mosiah',
    16,
    9,
    'He is the alight and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.'
);