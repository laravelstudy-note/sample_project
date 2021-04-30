import React from 'react';

function TodoList() {

	const todo_list = [
		"やること1",
		"やること2",
		"やること3",
	];

	let todo_items = []
	for(let i in todo_list){
		const todoComponent = <li key={i}>
			<input type="checkbox" />
			{ todo_list[i] }
		</li>

		todo_items.push(todoComponent)
	}

    return (
        <div className="task-list mt-3">
			<h2>タスク一覧 (2)</h2>

			<ul>
				{ todo_items }
			</ul>
			
		</div>
    );
}

export default TodoList;