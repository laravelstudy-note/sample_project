/*
編集画面のサンプル
*/
//import React from 'react';
import React, { useState } from 'react';
import Book from "./Book";
import BookView from "./BookView";

function BookEditView2(props) {
	
	//これが編集対象のオブジェクト
	const book = (props.book) ? props.book : new Book("ダミー書籍", "ダミー著者", 1000)
	const [bookState, setBook] = useState(book);

	//タイトルを更新する
	const updateTitle = (value) => {
		const newBook = Object.assign(new Book("","",""), bookState);
		newBook.title = value;
		setBook(newBook);
	};

	//価格を更新する
	const updatePrice = (value) => {
		const newBook = Object.assign(new Book("","",""), bookState);
		newBook.price = value;
		setBook(newBook);
	};
	
    return (
		<div className="col-md-6 row">
			<div className="col-md-6">
				<div className="card">
					<div className="card-header">{ book.title } の編集</div>

					<div className="card-body">
						<label>タイトル</label>
						<input 
							type="text" className="form-control" 
							name="title" value={ bookState.title }
							onChange={ (e) => { updateTitle(e.target.value) } }
						/>
					</div>

					<div className="card-body">
						<label>価格</label>
						<input 
							type="number" className="form-control" 
							name="price" value={ bookState.price }
							onChange={ (e) => { updatePrice(e.target.value) } }
						/>
					</div>
				</div>
			</div>
			<div className="col-md-6">
				<BookView book={ bookState } />
			</div>
		</div>
    );
}

export default BookEditView2;
