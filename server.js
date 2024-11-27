const express = require('express');
const bodyParser = require('body-parser');
const app = express();

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static('static'));

// Homepage
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/frontend/index.html');
});

// Handle form submission
app.post('/contact', (req, res) => {
    console.log(req.body);
    res.send('Thank you for contacting us!');
});

app.listen(3000, () => console.log('Server running on http://localhost:3000'));
