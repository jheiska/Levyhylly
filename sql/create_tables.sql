CREATE TABLE Record(
    id SERIAL PRIMARY KEY,
    name VARCHAR NOT NULL,
    artist VARCHAR,
    year DATE
);

CREATE TABLE Collector(
    id SERIAL PRIMARY KEY,
    record_id INTEGER REFERENCES Record(id),
    name VARCHAR NOT NULL,
    password VARCHAR NOT NULL
);

CREATE TABLE Track(
    id SERIAL PRIMARY KEY,
    record_id INTEGER REFERENCES Record(id),
    name VARCHAR NOT NULL,
    runningtime VARCHAR
);

CREATE TABLE Person(
    id SERIAL PRIMARY KEY,
    record_id INTEGER REFERENCES Record(id),
    first_name VARCHAR,
    last_name VARCHAR,
    nickname VARCHAR,
    preferred_instrument VARCHAR
);
