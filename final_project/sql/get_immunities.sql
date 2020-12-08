SELECT Immunities.I1, Immunities.I2
FROM Immunities 
JOIN Pokemon ON Pokemon.Type1 = Immmunites.Typing
WHERE Typing = :Typing AND Name = :Name