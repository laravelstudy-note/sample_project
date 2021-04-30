import React from 'react';

function TodoForm(props) {

	const notifyParent = (props.handleAdd) ? props.handleAdd : (title) => {}

	const handleAdd = (e) => {

		//画面遷移防止
		e.preventDefault();

		//1. submitボタンを押したときの振る舞いを確認
		//alert(0);

		//2. 入力値を確認
		const title = e.target.text.value;
		//alert(title);
		if(!title){
			return;
		}
		
		//3. 入力欄を空にする
		e.target.text.value = "";

		//4. 親にイベントを伝える
		notifyParent(title);

	};

	return (
        <form
			onSubmit={ (e) => { handleAdd(e) } }

			>
			<h2>タスクの追加</h2>

			<div className="form-group">
				<input
					type="text"
					id="new-todo-input"
					className="form-control"
					name="text"
					autoComplete="off"
					/>
			</div>
			
			<button 
				type="submit"
				className="btn btn-primary"
				>追加</button>
		</form>
    );
}

export default TodoForm;