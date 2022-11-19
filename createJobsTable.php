<?php
// include dbConfig
include_once './dbConfig.php';

$sqlJobs = "CREATE TABLE IF NOT EXISTS jobs (
    id INT(11) NOT NULL AUTO_INCREMENT,
    job_title VARCHAR(255) NOT NULL,
    type_of_job VARCHAR(255) NOT NULL,
    startDate DATE NOT NULL,
    endDate DATE NOT NULL,
    region VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    grade VARCHAR(255) NOT NULL,
    requirements VARCHAR(255) NOT NULL,
    description_of_job VARCHAR(255) NOT NULL,
    company_name VARCHAR(255) NOT NULL,
    website VARCHAR(255) NOT NULL,
    town VARCHAR(255) NOT NULL,
    fileUpload VARCHAR(255) NOT NULL,
    date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
)";
//execute the query
$db->query($sqlJobs);
