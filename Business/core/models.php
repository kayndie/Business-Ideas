<?php  

function insertBarista($pdo, $barista_name, $experience_level, $contact_number) {
    $sql = "INSERT INTO Barista (barista_name, experience_level, contact_number) VALUES(?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$barista_name, $experience_level, $contact_number]);

    if ($executeQuery) {
        return true;
    } else {
        return false;
    }
}

function deleteBarista($pdo, $barista_id) {
    try {
        $deleteBaristaProduct = "DELETE FROM product WHERE barista_id = ?";
        $deleteStmt = $pdo->prepare($deleteBaristaProduct);
        $deleteStmt->execute([$barista_id]);

        $sql = "DELETE FROM Barista WHERE barista_id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$barista_id]);
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function deleteProduct($pdo, $product_id) {
    try {
        $deleteProduct = "DELETE FROM Product WHERE product_id = ?";
        $deleteStmt = $pdo->prepare($deleteProduct);
        $deleteStmt->execute([$product_id]);
        return true;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function updateBarista($pdo, $barista_name, $experience_level, $contact_number, $barista_id) {
    $sql = "UPDATE Barista SET barista_name = ?, experience_level = ?, contact_number = ? WHERE barista_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$barista_name, $experience_level, $contact_number, $barista_id]);

    if ($executeQuery) {
        return true;
    }
}

function updateProduct($pdo, $product_name, $price, $product_id) {
    $sql = "UPDATE Product SET product_name = ?, price = ? WHERE product_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$product_name, $price, $product_id]);

    if ($executeQuery) {
        return true;
    }
    return false;
}

function getAllBaristas($pdo) {
    $sql = "SELECT * FROM Barista";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getBaristaByID($pdo, $barista_id) {
    $sql = "SELECT * FROM Barista WHERE barista_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$barista_id]);

    if ($executeQuery) {
        return $stmt->fetch();
    }
}

function getProductByBarista($pdo, $barista_id) {
    $sql = "SELECT * FROM Product WHERE barista_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$barista_id]);
    return $stmt->fetchAll();
}

function getAllproduct($pdo) {
    $sql = "SELECT * FROM Product";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getProductByID($pdo, $product_id) {
    $sql = "SELECT * FROM Product WHERE product_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$product_id]);

    if ($executeQuery) {
        return $stmt->fetch();
    }
}

function addProduct($pdo, $barista_id, $product_name, $price) {
    $sql = "INSERT INTO Product (barista_id, product_name, price) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$barista_id, $product_name, $price]);
}
?>
