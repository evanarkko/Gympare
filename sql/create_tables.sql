-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Trainer(
	Id SERIAL PRIMARY KEY,
	Name VARCHAR(100) NOT NULL,
	Trainername VARCHAR(50) NOT NULL,
	Password VARCHAR(50) NOT NULL,
	Weight_in_kg INTEGER,
	Height_in_cm INTEGER,
	Gender VARCHAR(10)
);

CREATE TABLE Goal(
	Id SERIAL PRIMARY KEY,
	TrainerId INTEGER REFERENCES Trainer(Id),
	StartDate DATE NOT NULL,
	EndDate DATE,
	Exercise_name VARCHAR(100) NOT NULL,
	Current_quantity INTEGER NOT NULL,
	End_quantity INTEGER NOT NULL
);

CREATE TABLE Friendship(
	Trainer1_Id INTEGER REFERENCES Trainer(Id), 
	Trainer2_Id INTEGER REFERENCES Trainer(Id), 
	Status INTEGER NOT NULL,
	Action_trainerId INTEGER NOT NULL
);

CREATE TABLE Workout(
	Id SERIAL PRIMARY KEY,
	TrainerId INTEGER REFERENCES Trainer(Id),
	WorkoutTime DATE NOT NULL,
	Description Text
);

CREATE TABLE CardioExercise(
	Id SERIAL PRIMARY KEY,
	WorkoutId INTEGER REFERENCES Workout(Id),
	Name VARCHAR(50),
	Duration INTEGER,
	Distance INTEGER
);

CREATE TABLE WeightExercise(
	Id SERIAL PRIMARY KEY,
	WorkoutId INTEGER REFERENCES Workout(Id),
	Name VARCHAR(50) NOT NULL,
	Weight INTEGER NOT NULL
);

CREATE TABLE ExerciseSet(
	ExerciseId INTEGER REFERENCES WeightExercise(Id),
	Reps INTEGER NOT NULL
);
