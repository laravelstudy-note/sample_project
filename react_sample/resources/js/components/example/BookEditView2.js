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
	
	//編集用のクラスの無いオブジェクトを作成する
	const [editItem, setEditItem] = useState(Object.assign({}, book));
	const [bookState, setBook] = useState(book);

	//保存ボタンイベント
	const onSave = (props.onSave) ? props.onSave : () => {}

	//値を更新する
	const updateValue = (name, value) => {
		
		//値を更新する
		
		//const newItem = Object.assign({}, bookState)
		//newItem[name] = value
		// ↑ はこの書き方にすることが出来る 
		const newItem = {...editItem, ...{ [name] : value}};
		setEditItem(newItem)

		//editItemからBookを作成して反映する（これはBookViewで利用するため）
		const newBook = new Book(newItem.title, newItem.author, newItem.price);
		setBook(newBook);
	};
	
    return (
		<div className="col-md-12 row mt-3">
			<div className="col-md-6">
				<div className="card">
					<div className="card-header">{ editItem.title } の編集</div>

					<div className="card-body">
						<label>タイトル</label>
						<input 
							type="text" className="form-control" 
							name="title" value={ editItem.title }
							onChange={ (e) => { updateValue(e.target.name, e.target.value) } }
						/>
					</div>

					<div className="card-body">
						<label>作者</label>
						<input 
							type="text" className="form-control" 
							name="author" value={ editItem.author }
							onChange={ (e) => { updateValue(e.target.name, e.target.value) } }
						/>
					</div>

					<div className="card-body">
						<label>価格</label>
						<input 
							type="number" className="form-control" 
							name="price" value={ editItem.price }
							onChange={ (e) => { updateValue(e.target.name, e.target.value) } }
						/>
					</div>

					<button className="btn btn-primary" onClick={ () => { onSave(bookState) } }>Save</button>
				</div>
			</div>
			<div className="col-md-6">
				<BookView book={ bookState } />
			</div>
		</div>
    );
}

export default BookEditView2;
