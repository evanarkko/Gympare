-- Lisää INSERT INTO lauseet tähän tiedostoon
-- Käyttäjät (Trainers)
INSERT INTO Trainer (Name, Trainername, Password, Height_in_cm, Weight_in_kg, Gender) VALUES ('Vierailija', 'Vierailija', 'salasana', 200, 100, 'Male');
INSERT INTO Trainer (Name, Trainername, Password, Height_in_cm, Weight_in_kg, Gender) VALUES ('Evan Miller', 'eamiller', 'salasana', 188, 86, 'Male');
INSERT INTO Trainer (Name, Trainername, Password, Height_in_cm, Weight_in_kg, Gender) VALUES ('Axel Wallin', 'brodie', 'salasana', 100, 50, 'Male');
INSERT INTO Trainer (Name, Trainername, Password, Height_in_cm, Weight_in_kg, Gender) VALUES ('Abel Haanpuu', 'fyysinen', 'salasana', 100, 50, 'Male');

-- Friendships
INSERT INTO Friendship (Trainer1_Id, Trainer2_Id, Status, Action_trainerId) VALUES (1, 2, 1, 1);
INSERT INTO Friendship (Trainer1_Id, Trainer2_Id, Status, Action_trainerId) VALUES (1, 3, 0, 1);
INSERT INTO Friendship (Trainer1_Id, Trainer2_Id, Status, Action_trainerId) VALUES (2, 3, 0, 1);
INSERT INTO Friendship (Trainer1_Id, Trainer2_Id, Status, Action_trainerId) VALUES (2, 4, 0, 1);

-- Workouts
INSERT INTO Workout (Name, TrainerId, WorkoutTime) VALUES ('Chest and arms',2, '2015-10-21');
INSERT INTO Workout (Name, TrainerId, WorkoutTime) VALUES ('back and abs',1, NOW());

-- Excercises
INSERT INTO WeightExercise (WorkoutId, Name, Weight) VALUES (2, 'bench press', 100);
INSERT INTO WeightExercise (WorkoutId, Name, Weight) VALUES (2, 'pushups', 0);
INSERT INTO WeightExercise (WorkoutId, Name, Weight) VALUES (1, 'pullups', 0);

--Cardios
INSERT INTO CardioExercise (WorkoutId, Name, Distance) VALUES (1, 'run', 5000);
INSERT INTO CardioExercise (WorkoutId, Name, Duration) VALUES (1, 'run', 45);

	-- Sets
	INSERT INTO ExerciseSet (ExerciseId, Reps) VALUES (1, 10);
	INSERT INTO ExerciseSet (ExerciseId, Reps) VALUES (1, 10);
	INSERT INTO ExerciseSet (ExerciseId, Reps) VALUES (1, 10);
	INSERT INTO ExerciseSet (ExerciseId, Reps) VALUES (1, 10);

--Goals
INSERT INTO Goal (TrainerId, StartDate, Exercise_name, Current_quantity, End_quantity) VALUES (1, NOW(), 'Pushups', 0, 1000);

