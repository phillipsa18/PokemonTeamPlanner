SELECT Weaknesses.W1, Weaknesses.W2, Weaknesses.W3, Weaknesses.W4, Weaknesses.W5 
FROM Weaknesses
JOIN Pokemon ON Pokemon.Type1 = Weaknesses.Typing
WHERE Typing = :Typing AND Name = :Name