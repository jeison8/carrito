window.onload = function() {

  let department_id = document.getElementById("department").value;

  findCitiesReorder(department_id);

}


this.findCitiesReorder = function (id){

	let cities_id = document.getElementById("city").value;
	document.getElementById("city").innerHTML = "";

	$.ajax({
		url: '/findCities?id='+id,
		success: function(response) {

			for (var value of response) {
				var caracters = value['name'].toLowerCase();
				var firtsCaracters = caracters.charAt(0).toUpperCase();
				var restCaracters = caracters.substring(1, caracters.length)
				document.getElementById("city").innerHTML += `<option value='${value['id']}' ${cities_id == value['id'] ? 'selected' : ''}>${firtsCaracters.concat(restCaracters)}</option>`; 
			}

		},
		error: function() {
	        console.log("No se ha podido obtener la información");
	    }
	});
}