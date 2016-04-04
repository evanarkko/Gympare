-- Lisää INSERT INTO lauseet tähän tiedostoon
-- Käyttäjät (Trainer)
INSERT INTO Trainer (Name, Trainername, Password, Height_in_cm, Weight_in_kg, Gender) VALUES ('Vierailija', 'Vierailija', 'salasana', 200, 100, 'Male');
INSERT INTO Trainer (Name, Trainername, Password, Height_in_cm, Weight_in_kg, Gender) VALUES ('Evan Miller', 'eamiller', 'salasana', 188, 86, 'Male');
INSERT INTO Trainer (Name, Trainername, Password, Height_in_cm, Weight_in_kg, Gender) VALUES ('Axel Wallin', 'brodie', 'salasana', 100, 50, 'Male');

-- 
INSERT INTO Friendship (Trainer1_Id, Trainer2_Id, Status, Action_trainerId) VALUES (1, 2, 1, 1);
INSERT INTO Friendship (Trainer1_Id, Trainer2_Id, Status, Action_trainerId) VALUES (1, 3, 0, 1);