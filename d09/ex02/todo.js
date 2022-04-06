function addNew() {
	const newTask = prompt("Please, enter your task:", "Task")
	let currentList = document.getElementById('ft_list');
	currentList.getAttribute('id');
	if (newTask != '') {
		let newNode = document.createTextNode(newTask);
		const newElement = document.createElement("div");
		newElement.appendChild(newNode);
		currentList.appendChild(newElement);
	}
}