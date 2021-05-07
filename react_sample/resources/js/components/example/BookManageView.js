/*
クラスの作成とそれを描画するためのコンポーネントの作成
*/
import React, { useState } from 'react';
import Book from "./Book";

import BookView from "./BookView";
import BookEditView2 from "./BookEditView2";

function BookManageView(props) {
	
	const book = new Book("表示編集切り替えUI", "表示編集切り替えUI作者", 1000);
	
	//book編集用のstate
	const [bookState, setBookState] = useState(book);

	//表示状態切替用のstate
	const [editState, setEditState] = useState(false);

	const renderComponent = (isEdit) => {
		console.log("renderComponent=" + isEdit)
		if(isEdit){
			return <BookEditView2 
				book={bookState} 
				onSave={ (book) => { setBookState(book); setEditState(!editState); } }
				/>	
		}else{
			return <BookView book={bookState} />	
		}
	}
	
    return (
		<div className="col-md-12">
			<button className="btn btn-outline-secondary" onClick={ () => { setEditState(!editState) } }>切り替え</button>

			{ renderComponent(editState) }

		</div>
    );
}

export default BookManageView;
