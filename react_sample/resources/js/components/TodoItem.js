import React from 'react';

function TodoItem(props) {

	const { id, title, completed, onChange } = props;

	const handleChangeCompleted = (e) => {
		if(onChange){
			onChange(id, title, e.target.checked)
		}
	}

    return (
        <li className="todo-item">
			<input type="checkbox" checked={completed} onChange={handleChangeCompleted} />
			<span>{ title }</span>
		</li>
    );
}

export default TodoItem;