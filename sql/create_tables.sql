CREATE TABLE Track(
    id SERIAL PRIMARY KEY,
    name VARCHAR NOT NULL,
    artist VARCHAR,
    runningtime VARCHAR
);

CREATE TABLE Record(
    id SERIAL PRIMARY KEY,
    name VARCHAR NOT NULL,
    artist VARCHAR,
    year INTEGER,
    track_id INTEGER REFERENCES Track(id)
);

CREATE TABLE Collector(
    id SERIAL PRIMARY KEY,
    name VARCHAR NOT NULL,
    password VARCHAR NOT NULL,
    record_id INTEGER REFERENCES Record(id)
);


CREATE TABLE Person(
    id SERIAL PRIMARY KEY,
    first_name VARCHAR,
    last_name VARCHAR,
    nickname VARCHAR,
    preferred_instrument VARCHAR,
    record_id INTEGER REFERENCES Record(id)
);
