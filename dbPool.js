const mysql = require('mysql');

const pool  = mysql.createPool({
    connectionLimit: 10,
    host: "de1tmi3t63foh7fa.cbetxkdyhwsb.us-east-1.rds.amazonaws.com",
    user: "xsyyy8yj4aqwqfnq",
    password: "mg9t9xprcveh989z",
    database: "jxj1gkywh55j9xdi",
});

module.exports = pool;
