/*
クラスの作成とそれを描画するためのコンポーネントの作成
*/
//import React from 'react';
import React from 'react';
import Book from "./Book";

function BookView(props) {
	
	const book = (props.book) ? props.book : new Book("ダミー書籍", "ダミー著者", 1000)
	
    return (
		<div className="card">
			<div className="card-header">{ book.title }</div>

			<div className="card-body">
				<p>著者: { book.author }</p>
				<p>価格: { book.price } + { book.getTax() }円</p>
			</div>
		</div>
    );
}

export default BookView;
