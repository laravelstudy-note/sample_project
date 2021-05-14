
//export defaultはclassの前に書いても良い
export default class Todo {
	
	constructor(title, status) {
		this.title = title;
		this.status = status * 1;
	}
	
}