SELECT Resistances.R1, Resistances.R2, Resistances.R3, Resistances.R4, Resistances.R5, Resistances.R6, Resistances.R7, Resistances.R8, Resistances.R9, Resistances.R10
FROM Resistances
JOIN Pokemon ON Resistances.Typing = Pokemon.Type1
WHERE Typing = :Typing AND Name = :Name