
Create table Product (
	id INT(6) unsigned auto_increment,
	name VARCHAR(50) not null,
	item_id INT(20) not null,
	price VARCHAR(25) not null,
	color VARCHAR (50) not null,
	description VARCHAR(200) not null,
	shape VARCHAR (50) not null,
	circumference VARCHAR (25) not null,
	weight VARCHAR(25) not null,
	material VARCHAR(50) not null,
	photo VARCHAR(70) not null,
	PRIMARY KEY(id)
)

Create table Transaction (
	id INT(6) unsigned auto_increment,
	first_name VARCHAR(50) not null,
	last_name VARCHAR(50) not null,
	phone VARCHAR(10) not null,
	email VARCHAR(50) not null,
	quantity VARCHAR(20) not null,
	item_id VARCHAR(20) not null,
	name VARCHAR(50) not null,
	cc_num VARCHAR(30) not null,
	exp_month int(2) not null,
	exp_year int(2) not null,
	address VARCHAR(50) not null,
	city VARCHAR(50) not null,
	state VARCHAR(2) not null,
	shipping VARCHAR(50) not null
	PRIMARY KEY(id),
	FOREIGN KEY(item_id) REFERENCES Product(item_id)
)

Insert into Product values(null, "Basketball", 1, "$19.99", "Orange with black ribs", "Basketball is a popular sport played by two teams of five players on a basketball court. A team can score a field goal by shooting the ball through the basket. Basketball is fun to play and requires only simple equipment. All you need to play basketball are a ball and hoop. Buy a basketball today to play with your friends.", "Spherical", "28.5-30 in (72-76 cm)", "18-22 oz (510-624 g)", "Synethic rubber", "basketball.png");
Insert into Product values(null, "Football", 2, "$19.99", "Brown", "Football is a well-loved sport that dates back to the nineteeth century. It's game that takes place on a rectangular football field with goal lines on both ends. The game begins with two teams of equal number, but varying player size, were divided b a center line.", "Oval, uneven shape", "20.75-21.25 in (52.7-54 cm)", "11-11.25 in (397-425.25 g)", "Inflated rubber enclosed in a pebble-grained leather cover or cowhide", "football.png");
Insert into Product values(null, "Soccer ball", 3, "$19.99", "Black and white pattern", "Soccer is a game that's involved with kicking and throwing a ball on the marked field. Two teams of eleven players play on a rectangular field with a goal at each end. Score by getting the ball into the opposing goal.", "Spherical", "27-28 in (68.6-71.12 cm)", "14-16 oz (0.392-0.448 kg)", "Synethic leather, usually polyurethane or polyvinyl chloride, stithed around an inflated rubber or rubber-like bladder", "soccerball.png");
Insert into Product values(null, "Baseball", 4, "$19.99", "White and red", "Baseball is a sport played between two teams of nine players each who take turns batting and fielding. Players on the batting team scores runs by hitting a ball that's thrown by the pitcher with a bat swung by the batter, then running counter-clockwise around a series of four bases: first, second, third, and home plate. A run is scored when a player advances around the bases and returns to home plate.", "Spherical", "9.00-9.25 in (228.6 - 234.9 mm)", "5-5.25 oz (141.75 - 148.83 g)", "A rubber or cork center tightly stitched together with red yard; white horsehide or cowhide", "baseball.png");
Insert into Product values(null, "Golf ball", 5, "$19.99", "White", "Golf is a club and ball sport in which players use clubs to hit balls into a series of holes on a course in as few strokes as possible. The game is played on a course with an arranged progression of either 9 or 18 holes. Each hole is unique in its specific layout and arrangement.", "Spherical", "1.680 in (42.67 mm)", "1.620 oz (45.93 g)", "Plastic and rubber", "golfball.png");
Insert into Product values(null, "Tennis ball", 6, "$19.99", "Fluorescent yellow", "Tennis is racket and ball sport that can be played individually against a single opponent (singles) or between two teams of two playesr each (doubles). Each player uses a tennis racket to strike a hollow rubber tennis ball over a net and into the opponent's court.", "Spherical", "2.57-2.7 in (6.54-6.86 cm", "1.98-2.10 oz (56 - 59.4 g)", "Felt-covered rubber compound",  "tennisball.png");
Insert into Product values(null, "Ping Pong ball", 7, "$19.99", "White", "Table tennis, also known as ping pong, is a sport in which two or four players hit a lightweight ball back and forth across a table using a small paddle. The game takes place on a hard table divided by a net. Ping pong is a game that demands quick reactions and skills. Buy some ping pong balls today and challenge your friends!", "Spherical", "4.72 in (12 cm)", "0.095 oz (2.7)", "Celluloid plastic", "pingpongball.png");
Insert into Product values(null, "Softball", 8, "$19.99", "Fluorescent yellow", "Softball is a variant of baseball played with a larger ball on a smaller field. For slow-pitch softball, a team of 10 players take turn hitting and catching. For fast-pitch softball, the pitch is faster and there are nine players on the file d at one time.", "Spherical", "11-12 in", "6.25-7 oz (178-198.4 g)", "Cork and rubber", "softball.png");
Insert into Product values(null, "Volleyball", 9, "$19.99", "White, blue and yellow", "Volleyball is a team sport in which two teams of six players are separated by a net. Each team scores points by grounding a ball on the other team's court. The team that scores first with 25 points wins the game. Volleyball is definitely a great game that can improve your heart health, energy and stamina. So don't miss out and buy a volleyball today!", "Spherical", "25.59-26.38 in (65-67 cm)", "9.2-9.9 oz (260-280 g)", "Leather and rubber", "volleyball.png");
Insert into Product values(null, "Bowling ball", 10, "$19.99", "Red", "Bowling is a sport in which a player rolls or throws a bowling ball towards pins at the end of a lane. When all pins are knocked down on the first roll, this is a strike. In pin bowling, players usually play on a flat wooden or other synthetic surface. In target bowling, the surface may be grass, gravel or a synthetic surface. Buy your own personal bowling ball today to knock down some pins to win!", "Spherical", "27 cm (10.62 in)", "6 kg (13.32 lbs)", "Resin coverings and polyurethane", "bowlingball.png");
Insert into Product values(null, "Water Polo ball", 11, "$19.99", "Yellow", "Water polo is team water sport that consists of 4 quarters in which the two teams attempt to score goals by throwing the ball into their opponent's goal, with the team with the most goals at the end of the game winning the match. A team consists of  field players and one goalkeeper in the water at any one time. Summer is just around the corner so buy your water polo ball today and play some water polo with your friends.", "Spherical", "68-71 cm (size 5)", "14-16 oz (400-450 g)", "Inflatable bladder and rubber fabric cover", "waterpoloball.png");
Insert into Product values(null, "Medicine ball", 12, "$19.99", "Blue and black", "Medicine ball, also known as an exercise ball or a fitness ball, is a weighted ball often used for rehabilitation and strength training.", "Spherical", "27 cm (10.62 in)", "5 kg (11.02 lbs)", "Leather or vinyl covered nylon cloth, and filled with heavy material to give them weight", "medicineball.png");
