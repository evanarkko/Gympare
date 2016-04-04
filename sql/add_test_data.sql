-- Lisää INSERT INTO lauseet tähän tiedostoon
-- Käyttäjät (Trainers)
INSERT INTO Trainer (Name, Trainername, Password, Height_in_cm, Weight_in_kg, Gender) VALUES ('Vierailija', 'Vierailija', 'salasana', 200, 100, 'Male');
INSERT INTO Trainer (Name, Trainername, Password, Height_in_cm, Weight_in_kg, Gender) VALUES ('Evan Miller', 'eamiller', 'salasana', 188, 86, 'Male');
INSERT INTO Trainer (Name, Trainername, Password, Height_in_cm, Weight_in_kg, Gender) VALUES ('Axel Wallin', 'brodie', 'salasana', 100, 50, 'Male');

-- Friendships
INSERT INTO Friendship (Trainer1_Id, Trainer2_Id, Status, Action_trainerId) VALUES (1, 2, 1, 1);
INSERT INTO Friendship (Trainer1_Id, Trainer2_Id, Status, Action_trainerId) VALUES (1, 3, 0, 1);

-- Workouts
INSERT INTO Workout (TrainerId, WorkoutTime) VALUES (2, "99-Jan-15");

-- Excercises
INSERT INTO WeightExercise (Name, Weight) VALUES ('bench press', 100);
INSERT INTO WeightExercise (Name, Weight) VALUES ('pushup', 0);

	-- Sets
	INSERT INTO ExerciseSet (Reps) VALUES (10);


