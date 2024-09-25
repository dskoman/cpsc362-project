const jwt = require('jsonwebtoken');
const bcrypt = require('bcrypt');
const express = require('express');
const mysql = require('mysql2');
const cors = require('cors'); // Optional: For cross-origin requests

const app = express();
const port = process.env.PORT || 3001; 

// Middleware
app.use(express.json()); // For parsing application/json
app.use(cors()); // Allow cross-origin requests (optional)

// MySQL connection
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'Gabby@usa123', 
    database: 'poemsy' 
});

db.connect((err) => {
    if (err) {
        console.error('Database connection failed: ' + err.stack);
        return;
    }
    console.log('Connected to database.');
});

//  fetch users
app.get('/api/users', (req, res) => {
    db.query('SELECT * FROM Users', (err, results) => {
        if (err) {
            return res.status(500).send(err);
        }
        res.json(results);
    });
});

//register
app.post('/api/users', async (req, res) => {
    const { username, email, user_password } = req.body;

    // Hash the password
    const hashedPassword = await bcrypt.hash(user_password, 10);

    // Insert user into the database
    db.query('INSERT INTO Users (username, email, user_password) VALUES (?, ?, ?)', 
    [username, email, hashedPassword], (err, results) => {
        if (err) {
            return res.status(500).send(err);
        }
        res.status(201).json({ id: results.insertId, username, email });
    });
});


app.post('/api/login', async (req, res) => {
    const { username, user_password } = req.body;

    // Fetch the user by email
    db.query('SELECT * FROM Users WHERE username = ?', [username], async (err, results) => {
        if (err) {
            return res.status(500).send(err);
        }

        // Check if user exists
        if (results.length === 0) {
            return res.status(401).json({ error: 'User not found' });
        }

        const user = results[0];// assuming only a unique user rightnow 

        
        const password_check = await bcrypt.compare(user_password, user.user_password);

        if (!password_check) {
            return res.status(401).json({ error: 'Incorrect password' });
        }

        // Generate a token: this token enable user to be login for 2hrs before they have to login again
        const token = jwt.sign({ id: user.id }, 'your_jwt_secret_key', { expiresIn: '2h' });


        
        res.json({ message: 'Login successful', token });
    });
});


// Start the server
app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});
