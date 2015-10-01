SELECT type, value, MAX(date) 
	FROM data
	GROUP BY type