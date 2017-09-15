<?php
	class SliderModel extends DataBase {
		function getAllSlide() {
			$query = 'SELECT * FROM slider';
			$result = parent::getList($query);
			return $result;
		}

		function deleteSlider($id) {
			$query = "DELETE FROM slider WHERE slide_id = $id";
      parent::exec($query);
		}

		function updateSlide($title, $desc, $link, $id) {
			$query = "UPDATE slider SET slide_title = '$title', slide_description = '$desc', link = '$link' WHERE slide_id = '$id'";
      parent::exec($query);
		}

		function getSlideById($id) {
			$query = "SELECT * FROM slider WHERE slide_id = '$id'";
			$result = parent::getInstance($query);
      return $result;
		}

		function updateSlideImg($img, $id) {
			$query = "UPDATE slider SET slide_image = '$img' WHERE slide_id = '$id'";
      parent::exec($query);
		}

		function addSlider($img, $title, $desc, $linkTo) {
			$query = "INSERT INTO slider VALUES('', '$img', '$title', '$desc', '$linkTo')";
			parent::exec($query);
		}
	}
?>