CREATE TABLE Resepti (
	ReseptiID	SERIAL PRIMARY KEY,
	Nimi		TEXT,
	RAVTID		SERIAL,
	JuomaID		SERIAL,
	Yleiskuvaus	TEXT,
	Resepti		TEXT,
	Tyyppi		TEXT
);

CREATE TABLE Juoma (
	JuomaID		SERIAL PRIMARY KEY,
	Nimi		TEXT,
	ALC		INTEGER
);

CREATE TABLE RaakaAine (
	Nimi		TEXT,	
	RaakaAineID	SERIAL,
	ReseptiID	SERIAL
);

CREATE TABLE  AteriakokonaisuusValiTaulu (
	ReseptiID	SERIAL,
	AteriaID	SERIAL
);

CREATE TABLE Ateriakokonaisuus (
	AteriaID	SERIAL PRIMARY KEY,
	Nimi		TEXT,
	Kuvaus		TEXT
);

CREATE TABLE Kayttaja (
	K‰ytt‰j‰ID	SERIAL PRIMARY KEY,
	K‰ytt‰j‰tunnus	TEXT
	Salasana	TEXT
);

CREATE TABLE  ReseptiValiTaulu (
	ReseptiID	SERIAL,
	RaakaAineID	SERIAL
);
