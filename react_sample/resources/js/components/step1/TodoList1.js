import React from 'react';

function TodoList() {

	const todo_list = [
		"やること1",
		"やること2",
		"やること3",
	];

    return (
        <div className="task-list mt-3">
			<h2>タスク一覧</h2>

			<ul>
				{
					todo_list.map((todo, index) => {
						return <li key={index}>
							<input type="checkbox" />
							{ todo }
						</li>		
					})
				}
			</ul>
			
		</div>
    );
}

export default TodoList;