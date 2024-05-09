// server.js

const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');

const app = express();
const PORT = process.env.PORT || 8000;

// MongoDB connection
mongoose.connect('mongodb://localhost:27017/uma_ghee', {
    useNewUrlParser: true,
    useUnifiedTopology: true
})
.then(() => console.log('MongoDB connected'))
.catch(err => console.error(err));

// Mongoose schema
const OrderSchema = new mongoose.Schema({
    name: String,
    email: String,
    address: String,
    phone: String,
    paymentMethod: String
});

const Order = mongoose.model('Order', OrderSchema);

// Middleware
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

// Route to handle form submission
app.post('/submit-order', (req, res) => {
    const { name, email, address, phone, paymentMethod } = req.body;

    // Create a new order document
    const newOrder = new Order({
        name,
        email,
        address,
        phone,
        paymentMethod
    });

    // Save the order document to the database
    newOrder.save()
        .then(() => res.send('Order placed successfully'))
        .catch(err => res.status(500).send(err));
});

// Start the server
app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
