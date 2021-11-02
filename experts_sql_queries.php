<?php
$get_interest_types_sql = <<<EOSQL
SELECT
    id, interest
FROM
    interest_types
ORDER by id asc
EOSQL;


$get_experts_sql = <<<EOSQL
SELECT
    id, givname, famname, title, org, email, phone, photo_filename 
FROM
    experts
ORDER BY id ASC
EOSQL;


$get_interests_sql = <<<EOSQL
SELECT
    interest_id, interest_text 
FROM
    interests
WHERE
    expert_id = ?
ORDER BY interest_id ASC
EOSQL;


$insert_expert_sql = <<<EOSQL
INSERT INTO 
    experts (givname, famname, title, org, email, phone, photo_filename) 
VALUES 
    (?, ?, ?, ?, ?, ?, ?)
EOSQL;


$insert_interests_sql = <<<EOSQL
INSERT INTO
    interests (expert_id, interest_id, interest_text, bio_text)
VALUES
    (?, ?, ?, ?)
EOSQL;

$insert_links_sql = <<<EOSQL
INSERT INTO
    links (url1, url2, url3, expert_id, url1_text, url2_text, url3_text)
VALUES
    (?, ?, ?, ?, ?, ?, ?)
EOSQL;
