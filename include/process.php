<?php
	if (isset($_POST['tag'])) {
		try {
			$conn = require_once 'connect.php';

			$sql = "SELECT * FROM datos";
			$result = $conn->prepare($sql) or die ($sql);

			if (!$result->execute()) return false;

			if ($result->rowCount() > 0) {
				$json = array();
				while ($row = $result->fetch()) {
					$json[] = array(
						'Id' => $row['Id'],
						'Nombre' =>$row['Nombre'],
						'Descripcion' => $row['Descripcion']
					);
				}

				$json['success'] = true;
				echo json_encode($json);
			}
		} catch (PDOException $e) {
			echo 'Error: '. $e->getMessage();
		}
	}

?>