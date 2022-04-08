let taskList = [];
const d = new Date();
d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));

if (document.cookie && document.cookie != '') {
	let splitted = document.cookie.split('=');
	taskList = JSON.parse(splitted[1]);
}

function addItemToList(item) {
	let currentList = document.getElementById('ft_list');
	currentList.getAttribute('id');
	if (item != '') {
		let newNode = document.createTextNode(item);
		const newElement = document.createElement("div");
		newElement.setAttribute('class', 'item-row')
		const checkBox = document.createElement("INPUT");
		checkBox.setAttribute("type", "checkbox");
		checkBox.setAttribute("onchange", "removeItem(this.nextSibling)");
		newElement.appendChild(checkBox);
		const textElem = document.createElement("div");
		textElem.setAttribute("onclick", "removeItem(this)");
		textElem.appendChild(newNode);
		newElement.appendChild(textElem);
		currentList.insertBefore(newElement, currentList.firstChild);
	}
}

function addNew() {
	const newTask = prompt("Please, enter your task:")
	if (newTask) {
		saveToTaskList(newTask);
		addItemToList(newTask);
	}
}

async function removeItem(item) {
	let confirmAction = confirm("Are you sure you want to remove this task?");
	if (!confirmAction) return;
	item.checked = true;
	console.log(item);
	console.log(item.innerHTML);
	const timeout = new Promise(resolve => setTimeout(resolve, 1000));
	await timeout;
	item.parentNode.parentNode.removeChild(item.parentNode);
	taskList = taskList.filter(function(value){
		return value != item.innerHTML;
	});
	let newCookie = "tasks=" + JSON.stringify(taskList) + ";expires=" + d.toUTCString;
	document.cookie = newCookie;
}

function saveToTaskList(newTask) {
	taskList.unshift(newTask);
	let newCookie = "tasks=" + JSON.stringify(taskList) + ";expires=" + d.toUTCString;
	document.cookie = newCookie;
}

function readTaskList() {
	if (document.cookie && document.cookie != '') {
		for (let i = taskList.length - 1; i >= 0; i--) {
			addItemToList(taskList[i]);
		}
	}
}
