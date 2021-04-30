
//export defaultはclassの前に書いても良い
export default class Book {
	
	constructor(title, author, price) {
		this.title = title;
		this.author = author;
		this.price = price
	}
	
	getTax(){
		return Math.ceil(this.price * 0.1)
	}
}