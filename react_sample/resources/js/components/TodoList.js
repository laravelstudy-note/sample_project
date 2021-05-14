import React from 'react';
import TodoItem from "./TodoItem";

function TodoList(props) {

	//todo_list => Todo
	const todo_list = props.items;
	const onChange = props.onChange

	const handleOnChange = (id, title, nextValue) => {
		console.log(id, title, nextValue);

		//親に通知する
		if(onChange){
			onChange(id, title, nextValue);
		}
	}

    return (
        <div className="todo-list mt-3">
			<h2>タスク一覧</h2>

			<ul>
				{
					todo_list.map((todo, index) => {
						return <TodoItem 
							key={ index }
							id={ index }
							title={ todo.title }
							completed={ todo.status > 0 }
							onChange={ handleOnChange }/>
					})
				}
			</ul>
			
		</div>
    );
}

export default TodoList;