<?php
/**

 * @return PDO

 */

function get_connection()
{
    return new PDO('mysql:host=localhost;dbname=gallery', 'root', '');
}

/**
 * Inserts user data into the database
 *
 * @param array    $data    User data
 *
 * @return bool    Always true
 */

function insert_user_data(array $data)
{
    $query = 'INSERT INTO users (login, password) VALUES (?, ?)';
    $db = get_connection();
    $stmt = $db->prepare($query);
    $stmt->execute($data);    
}

/**
 * Get user info by user login
 *
 * @param string    $login    User login
 *
 * @return array    User data
 */

function get_user_by_login (string $login) 
{
    $query = 'SELECT * FROM users WHERE login = ?';
    $db = get_connection();
    $stmt = $db->prepare($query);
    $stmt->execute([$login]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        return $result;
    }
    return false;
}

/**
 * Get user info by user identifier
 *
 * @param int    $user_id    User identifier
 *
 * @return array    User data
 */

function get_user_by_id (int $user_id) 
{
    $query = 'SELECT * FROM users WHERE users.id = ?';
    $db = get_connection();
    $stmt = $db->prepare($query);
    $stmt->execute([$user_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        return $result;
    }
    return false;
}

/**
 * Inserts user password hash into the database
 *
 * @param int    $user_id    User identifier
 * @param string    $user_hash    User password hash
 *
 * @return bool    Always true
 */

function add_hash (int $user_id, string $user_hash) {
    $query = 'UPDATE users SET hash = ? WHERE id = ?';
    $db = get_connection();
    $stmt = $db -> prepare($query);
    $stmt->execute([$user_hash, $user_id]); 
}

/**
 * Inserts files into the database
 *
 * @param string    $filename    
 * @param int    $user_id    User identifier
 *
 * @return bool    Always true
 */

function insert_image (string $filename, int $user_id) 
{
    $query = 'INSERT INTO images (filename, user_id) VALUES (?, ?)';
    $db = get_connection();
    $stmt = $db->prepare($query);
    return $stmt->execute([$filename, $user_id]);
}

/**
 * Get list of files
 *
 * @return array    List of files
 */

function get_image ()
{
    $query = 'SELECT * FROM images';
    $db = get_connection();
    $stmt = $db->prepare($query);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }
    if ($result) {
        return $result;
    }
    return false;   
}

/**
 * Delete file from the database
 *   
 * @param int    $id    File identifier
 *
 * @return bool  Always true
 */

function delete_image (int $id)
{
    $query = 'DELETE FROM images WHERE images.id = ?';
    $db = get_connection();
    $stmt = $db->prepare($query);
    return $stmt->execute([$id]);
}
