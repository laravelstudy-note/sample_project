/*
クラスの作成とそれを描画するためのコンポーネントの作成
*/
//import React from 'react';
import React, { useState } from 'react';
import Book from "./Book";

function BookView2() {

	const book = new Book("ダミー書籍", "ダミー著者", 1000);
	const [bookState, setBook] = useState(book);

	//全く新しいBookを作る形はOK
	const changeBook = () => {
		const newBook = new Book("newBook", "newBook Author", 2000);
		setBook(newBook);
	};

	//一部だけ書き換えるのは動作しない
	const changeBook2 = () => {
		bookState.price = 1500;
		setBook(bookState);
	};

	//一部だけ書き換える時はinstanceの複製が必要
	const changeBook3 = () => {
		//Object.assignを使って値をコピーする
		const newBook = Object.assign(new Book("","",""), bookState);
		newBook.price = 1500;
		setBook(newBook);
	};
	
    return (
		<div className="card">
			<div className="card-header">{ bookState.title }</div>

			<div className="card-body">
				<p>著者: { bookState.author }</p>
				<p>価格: { bookState.price } + { bookState.getTax() }円</p>
				
				<button className="btn btn-primary mr-1" onClick={ () => { changeBook() }}>1</button>
				<button className="btn btn-primary mr-1" onClick={ () => { changeBook2() }}>2</button>
				<button className="btn btn-primary mr-1" onClick={ () => { changeBook3() }}>3</button>
			</div>
		</div>
    );
}

export default BookView2;
