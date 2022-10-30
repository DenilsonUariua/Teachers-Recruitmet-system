const express = require('express');
const db = require('./config/db')
const cors = require('cors')
const { Sequelize } = require('sequelize');

const app = express();

const  PORT = 3002;
app.use(cors({
    origin: ["http://localhost:3000"],
    methods: ["GET,HEAD,PUT,PATCH,POST,DELETE"],
    credentials: true
  }));
app.use(express.json())

// Option 3: Passing parameters separately (other dialects)
const sequelize = new Sequelize('test', 'new_user', 'password', {
    host: 'localhost',
    dialect: 'mariadb'
  });

  

app.listen(PORT, async ()=>{
    try {
        await sequelize.authenticate();
        console.log('Connection has been established successfully.');
      } catch (error) {
        console.error('Unable to connect to the database:', error);
      }
    console.log(`Server is running on ${PORT}`)
})