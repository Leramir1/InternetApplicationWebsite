Create table TaxByState (
	id INT(6) unsigned auto_increment,
	state VARCHAR(2) not null,
    tax DECIMAL(4,4) not null,
    PRIMARY KEY (id)
);

Insert into TaxByState values(null, "AL", .04);
Insert into TaxByState values(null, "AK", 0);
Insert into TaxByState values(null, "AZ", .056);
Insert into TaxByState values(null, "AR", .065);
Insert into TaxByState values(null, "CA", .075);
Insert into TaxByState values(null, "CO", .029);
Insert into TaxByState values(null, "CT", .0635);
Insert into TaxByState values(null, "DE", 0);
Insert into TaxByState values(null, "DC", .0575);
Insert into TaxByState values(null, "FL", .06);
Insert into TaxByState values(null, "GA", .04);
Insert into TaxByState values(null, "HI", .0416);
Insert into TaxByState values(null, "ID", .06);
Insert into TaxByState values(null, "IL", .0625);
Insert into TaxByState values(null, "IN", .07);
Insert into TaxByState values(null, "IA", .06);
Insert into TaxByState values(null, "KS", .0615);
Insert into TaxByState values(null, "KY", .06);
Insert into TaxByState values(null, "LA", .04);
Insert into TaxByState values(null, "ME", .055);
Insert into TaxByState values(null, "MD", .06);
Insert into TaxByState values(null, "MA", .0625);
Insert into TaxByState values(null, "MI", .06);
Insert into TaxByState values(null, "MN", .0687);
Insert into TaxByState values(null, "MS", .07);
Insert into TaxByState values(null, "MO", .0422);
Insert into TaxByState values(null, "MT", 0);
Insert into TaxByState values(null, "NE", .055);
Insert into TaxByState values(null, "NV", .0685);
Insert into TaxByState values(null, "NH", 0);
Insert into TaxByState values(null, "NJ", .07);
Insert into TaxByState values(null, "NM", .0512);
Insert into TaxByState values(null, "NY", .04);
Insert into TaxByState values(null, "NC", .0475);
Insert into TaxByState values(null, "ND", .05);
Insert into TaxByState values(null, "OH", .0575);
Insert into TaxByState values(null, "OK", .045);
Insert into TaxByState values(null, "OR", 0);
Insert into TaxByState values(null, "PA", .06);
Insert into TaxByState values(null, "RI", .07);
Insert into TaxByState values(null, "SC", .06);
Insert into TaxByState values(null, "SD", .04);
Insert into TaxByState values(null, "TN", .07);
Insert into TaxByState values(null, "TX", .0625);
Insert into TaxByState values(null, "UT", .0595);
Insert into TaxByState values(null, "VT", .06);
Insert into TaxByState values(null, "VA", .053);
Insert into TaxByState values(null, "WA", .065);
Insert into TaxByState values(null, "WV", .06);
Insert into TaxByState values(null, "WI", .05);
Insert into TaxByState values(null, "WY", .04);
Insert into TaxByState values(null, "PR", .105);


Create table State (
	id INT(6) unsigned auto_increment,
	name VARCHAR(100) not null,
	abbreviation VARCHAR(2) not null,
	PRIMARY KEY(id),
	FOREIGN KEY(abbreviation) REFERENCES TaxByState(state)
)

INSERT INTO State (id, name, abbreviation) VALUES (null, "Alabama", "AL");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Alaska", "AK");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Arizona", "AZ");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Arkansas", "AR");
INSERT INTO State (id, name, abbreviation) VALUES (null, "California", "CA");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Colorado", "CO");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Connecticut", "CT");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Delaware", "DE");
INSERT INTO State (id, name, abbreviation) VALUES (null, "District of Columbia", "DC");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Florida", "FL");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Georgia", "GA");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Hawaii", "HI");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Idaho", "ID");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Illinois", "IL");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Indiana", "IN");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Iowa", "IA");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Kansas", "KS");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Kentucky", "KY");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Louisiana", "LA");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Maine", "ME");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Montana", "MT");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Nebraska", "NE");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Nevada", "NV");
INSERT INTO State (id, name, abbreviation) VALUES (null, "New Hampshire", "NH");
INSERT INTO State (id, name, abbreviation) VALUES (null, "New Jersey", "NJ");
INSERT INTO State (id, name, abbreviation) VALUES (null, "New Mexico", "NM");
INSERT INTO State (id, name, abbreviation) VALUES (null, "New York", "NY");
INSERT INTO State (id, name, abbreviation) VALUES (null, "North Carolina", "NC");
INSERT INTO State (id, name, abbreviation) VALUES (null, "North Dakota", "ND");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Ohio", "OH");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Oklahoma", "OK");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Oregon", "OR");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Maryland", "MD");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Massachusetts", "MA");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Michigan", "MI");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Minnesota", "MN");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Mississippi", "MS");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Missouri", "MO");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Pennsylvania", "PA");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Rhode Island", "RI");
INSERT INTO State (id, name, abbreviation) VALUES (null, "South Carolina", "SC");
INSERT INTO State (id, name, abbreviation) VALUES (null, "South Dakota", "SD");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Tennessee", "TN");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Texas", "TX");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Utah", "UT");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Vermont", "VT");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Virginia", "VA");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Washington", "WA");
INSERT INTO State (id, name, abbreviation) VALUES (null, "West Virginia", "WV");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Wisconsin", "WI");
INSERT INTO State (id, name, abbreviation) VALUES (null, "Wyoming", "WY");